<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku_model::insert([
            [
            'judul'=>'Bro&Sis',
            'penerbit'=>'erlangga',
            'pengarang'=>'popo',
            'foto'=>'-',
        ],
        [
            'judul'=>'Simakalama',
            'penerbit'=>'upost',
            'pengarang'=>'kilua',
            'foto'=>'-'
        ],
        [
            'judul'=>'Jojo Sipetarung',
            'penerbit'=>'Postreet',
            'pengarang'=>'lakao',
            'foto'=>'-'
        ],
        [
            'judul'=>'Bambu Racing',
            'penerbit'=>'erlangga',
            'pengarang'=>'gaga',
            'foto'=>'-'
        ],
        [
            'judul'=>'Kamus',
            'penerbit'=>'cocoa',
            'pengarang'=>'dida',
            'foto'=>'-'
        ]
        ]);
    }
}
