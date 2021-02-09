<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [ 
        'nama_produk',
        'deskripsi',
        'kategori_produk',
        'd_jam',
        'd_menit',
        'd_detik',
        'harga_produk',
        'foto_produk',
        'stepbystep',
        'porsi',
    ];
    public function bahan(){ 

        return $this->belongsToMany(Bahan::class)
                        ->withPivot([
                            'qty_bp',
                        ]);
       
    }
    public function paket(){ 

        return $this->belongsToMany(Paketan::class)
                        ->withPivot([
                            'qty_bp',
                        ]);
       
    }
    public function kategori(){ 

        return $this->belongsTo(Kategori::class);
       
    }
    public function bahanProduk()
    {
        return $this->hasMany('App\Bahan_produk','produk_id');
    }
}
