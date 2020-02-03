<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Detail_model;
use App\Buku_model;
use App\User;
use App\Peminjaman_model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class detail extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_buku'=>'required',
            'id_pinjam'=>'required',
            'qty'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=Detail_model::create([
            'id_buku'=>$req->id_buku,
            'id_pinjam'=>$req->id_pinjam,
            'qty'=>$req->qty

        ]);
        if($simpan){
            $pesan['message'] = 'berhasil tambah broh';
            return Response()->json($pesan);
        } else {
            $pesan['message'] = 'gagal tambah broh';
            return Response()->json($pesan);
        }
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_buku'=>'required',
            'id_pinjam'=>'required',
            'qty'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Detail_model::where('id',$id)->update([
            'id_buku'=>$req->id_buku,
            'id_pinjam'=>$req->id_pinjam,
            'qty'=>$req->qty
        ]);
        if($ubah){
            $data['message'] = 'Detail Berhasil diubah';
            return Response()->json($data);
        } else {
            $data['message'] = 'Detail gagal diubah';
            return Response()->json($data);
        }
    }
    public function destroy($id)
    {
        $hapus=Detail_model::where('id',$id)->delete();
        if($hapus){
            $pesan['message'] = 'Detail berhasil dihapus';
            return Response()->json($pesan);
        }else{
            $pesan['message'] = 'detail gagal dihapus';
            return Response()->json($pesan);
        }
    }
}
