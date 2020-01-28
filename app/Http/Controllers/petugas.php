<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class petugas extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:255',
            'alamat' => 'required|string|max:55',
            'telp' => 'required|string|max:11',
            'username' => 'required|string|max:55|unique:petugas',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'nama_petugas' => $request->get('nama_petugas'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'alamat' => $request->get('alamat'),
            'telp' => $request->get('telp'),
            'level' => $request->get('level'),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_petugas'=>'required',
            'username'=>'required',
            'password'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'level'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=User::where('id',$id)->update([
            'nama_petugas'=>$req->nama_petugas,
            'username'=>$req->username,
            'password'=>$req->password,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp,
            'level'=>$req->level,
        ]);
        if($ubah){
            $data['message'] = 'Petugas Berhasil diubah';
            return Response()->json($data);
        } else {
            $data['message'] = 'Petugas gagal diubah';
            return Response()->json($data);
        }
    }
    public function destroy($id)
    {
        $hapus=User::where('id',$id)->delete();
        if($hapus){
            $pesan['message'] = 'Petugas berhasil dihapus';
            return Response()->json($pesan);
        }else{
            $pesan['message'] = 'Petugas gagal dihapus';
            return Response()->json($pesan);
        }
    }
    public function tampil_petugas()
    {
        $data_petugas=User::get();
        return Response()->json($data_petugas);
    }
}