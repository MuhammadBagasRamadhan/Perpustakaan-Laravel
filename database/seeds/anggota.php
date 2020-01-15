<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota_model::insert([
            [
            'nama_anggota'=>'jo',
            'alamat'=>'jalan buntu',
            'telp'=>'0989876521',
           
        ],
        [
            'nama_anggota'=>'bagas',
            'alamat'=>'jalan kenangan',
            'telp'=>'089212671'
        ],
        [
            'nama_anggota'=>'fachry',
            'alamat'=>'jalan jalan',
            'telp'=>'0892341222'
        ],
        [
            'nama_anggota'=>'sigaga',
            'alamat'=>'jalan taruna bangsa',
            'telp'=>'08923311'
        ],
        [
            'nama_anggota'=>'nuril',
            'alamat'=>'jalan sawojajar',
            'telp'=>'08912223'
        ],

        ]);
    }
}
