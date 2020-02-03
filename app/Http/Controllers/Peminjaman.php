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

class Peminjaman extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'deadline'=>'required',
            'denda'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=Peminjaman_model::create([
            'tgl'=>date('Y-m-d H:i:s'),
            'tgl_kembali'=>$req->tgl_kembali,
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'deadline'=>$req->deadline,
            'denda'=>$req->denda

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
            'tgl'=>'required',
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'deadline'=>'required',
            'denda'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Peminjaman_model::where('id_peminjaman',$id)->update([
            'tgl'=>date('Y-m-d H:i:s'),
            'tgl_kembali'=>$req->tgl_kembali,
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'deadline'=>$req->deadline,
            'denda'=>$req->denda
        ]);
        if($ubah){
            $data['message'] = 'Peminjaman Berhasil diubah';
            return Response()->json($data);
        } else {
            $data['message'] = 'Peminjaman gagal diubah';
            return Response()->json($data);
        }
    }
    public function destroy($id)
    {
        $hapus=Peminjaman_model::where('id_peminjaman',$id)->delete();
        if($hapus){
            $pesan['message'] = 'Peminjaman berhasil dihapus';
            return Response()->json($pesan);
        }else{
            $pesan['message'] = 'Peminjaman gagal dihapus';
            return Response()->json($pesan);
        }
    }
    public function detail($id){
        $tampil = Peminjaman_model::join('anggota', 'anggota.id', 'peminjaman.id_anggota')->
        where('id_peminjaman', $id)->first();

        $buku = Detail_model::where('id_pinjam', $id)->get();

        $dt['data']['id_anggota']=$tampil->id_anggota;
        $dt['data']['nama_anggota']=$tampil->nama_anggota;
        $dt['data']['id_petugas']=$tampil->id_petugas;
        $dt['data']['tgl']=$tampil->tgl;
        $dt['data']['tgl_kembali']=$tampil->tgl_kembali;
        $dt['data']['denda']=$tampil->denda;
        $dt['data']['deadline']=$tampil->deadline;
        $dt['data']['data_buku']=$buku;
        return Response()->json([$dt]);

    }
}
