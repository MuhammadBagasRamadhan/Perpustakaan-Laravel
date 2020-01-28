<?php


namespace App\Http\Controllers;
use Auth;
use App\Buku_model;
use App\User;
use App\Anggota_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class anggota extends Controller
{
    public function simpan(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=Anggota_model::create([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp

        ]);
        if($simpan){
            $pesan['message'] = 'berhasil tambah anggota broh';
            return Response()->json($pesan);
        } else {
            $pesan['message'] = 'gagal tambah anggota broh';
            return Response()->json($pesan);
        }
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Anggota_model::where('id',$id)->update([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
        ]);
        if($ubah){
            $data['message'] = 'Anggota Berhasil diubah';
            return Response()->json($data);
        } else {
            $data['message'] = 'Anggota gagal diubah';
            return Response()->json($data);
        }
    }
    public function destroy($id)
    {
        $hapus=Anggota_model::where('id',$id)->delete();
        if($hapus){
            $pesan['message'] = 'Anggota berhasil dihapus';
            return Response()->json($pesan);
        }else{
            $pesan['message'] = 'Anggota gagal dihapus';
            return Response()->json($pesan);
        }
    }
    
}
