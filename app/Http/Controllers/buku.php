<?php


namespace App\Http\Controllers;
use Auth;
use App\Buku_model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class buku extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required',
            'foto'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=Buku_model::create([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto

        ]);
        if($simpan){
            $pesan['message'] = 'berhasil tambah buku broh';
            return Response()->json($pesan);
        } else {
            $pesan['message'] = 'gagal tambah buku broh';
            return Response()->json($pesan);
        }
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'foto'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Buku_model::where('id',$id)->update([
            'judul'=>$req->judul,
            'pengarang'=>$req->pengarang,
            'penerbit'=>$req->penerbit,
            'foto'=>$req->foto
        ]);
        if($ubah){
            $data['message'] = 'Buku Berhasil diubah';
            return Response()->json($data);
        } else {
            $data['message'] = 'Buku gagal diubah';
            return Response()->json($data);
        }
    }
    public function destroy($id)
    {
        $hapus=Buku_model::where('id',$id)->delete();
        if($hapus){
            $pesan['message'] = 'Buku berhasil dihapus';
            return Response()->json($pesan);
        }else{
            $pesan['message'] = 'Buku gagal dihapus';
            return Response()->json($pesan);
        }
    }
    public function index()
    {
        if(Auth::User()->level=="admin"){
            $dt_buku=Buku_model::get();
            return Response()->json($dt_buku);
        } else {
            $pesan['message'] = 'kamu buka admin bro maap';
            return Response()->json($pesan);
        }
    }
}
