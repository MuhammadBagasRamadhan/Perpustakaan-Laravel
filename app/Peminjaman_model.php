<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman_model extends Model
{
    protected $table="peminjaman";
    protected $primarykey="id_peminjam";
    public $timestamps=false;
    protected $fillable = [
        'tgl', 'tgl_kembali', 'id_anggota','id_petugas', 'deadline', 'denda'
    ];
}
