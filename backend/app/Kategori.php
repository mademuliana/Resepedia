<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [ 
        'nama_kategori',
        'keterangan_kategori',
        'kode',
        'updated_at',
        'deleted_at',
    ];
}
