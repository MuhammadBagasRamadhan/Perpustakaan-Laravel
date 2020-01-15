<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas_model::insert([
            [
            'nama_petugas'=>'pako',
            'alamat'=>'jl setia selalu',
            'telp'=>'08133256',
            'username'=>'pakaokao',
            'password'=>'pako123',
           

        ],
        [
            'nama_petugas'=>'lala',
            'alamat'=>'jl lupa',
            'telp'=>'08976555',
            'username'=>'ahsudahlah',
            'password'=>'lala123',
        ],
        [
            'nama_petugas'=>'Tegar',
            'alamat'=>'jl sukamaju',
            'telp'=>'081262112',
            'username'=>'halu',
            'password'=>'halu123',
        ],
        [
            'nama_petugas'=>'malfy',
            'alamat'=>'jl agung',
            'telp'=>'081121121',
            'username'=>'malff',
            'password'=>'malfynas123',
        ],
        [
            'nama_petugas'=>'eko',
            'alamat'=>'jl cibinong',
            'telp'=>'081122133',
            'username'=>'biawak',
            'password'=>'biawak123',
        ],
        
        ]);
    }
}
