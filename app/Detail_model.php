<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_model extends Model
{
    protected $table="detail_peminjaman";
    protected $primarykey="id";
    public $timestamps=false;
    protected $fillable = [
        'qty', 'id_pinjam', 'id_buku'
    ];
}
