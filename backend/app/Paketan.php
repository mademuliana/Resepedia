<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paketan extends Model
{
    protected $fillable = [ 
        'paket_id',
        'nama_paket',
        'deskripsi',
        'kategori_id',
        'd_jam',
        'd_menit',
        'd_detik',
        'harga_paket',
        'foto_paket',
        'porsi',
    ];
    protected $hidden = [
        'paket_id',
    ];
    
    public function produk()
    {
        return $this->belongsToMany(Produk::class)
        ->withPivot([
            'qty_pp',
            'takaran',
        ]);
    }
    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class)
        ->withPivot([
            'qty_pap',
        ]);
    }
    public function kategori(){ 

        return $this->belongsTo(Kategori::class);
       
    }
    public function produkPaketan()
    {
        return $this->hasMany('App\Produk_paketan','paketan_id');
    }
}
