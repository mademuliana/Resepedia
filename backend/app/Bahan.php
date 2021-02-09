<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $fillable = [ 
        'nama_bahan',
        'kategori_bahan',
        'takaran',
        'updated_at',
        'deleted_at',
    ];

    public function produk()
    {   
        return $this->belongsToMany('App\Produk');
    }
    public function kategori(){ 

        return $this->belongsTo(Kategori::class);
       
    }
    
}
