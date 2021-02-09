<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [ 
        'id',
        'nama_pelanggan',
        'lokasi_pengiriman',
        'waktu_dipesan',
        'tanggal_diantar',
        'waktu_diantar',
        'nama_kurir',
        'status_pemesanan',
        'status_pembayaran',
    ];
    public function paket()
    {
        return $this->belongsToMany(Paketan::class)
        ->withPivot([
            'qty_pap',
            
        ]);
    }
    public function Paketpesanan()
    {
        return $this->hasMany('App\Paketan_pesanan','pesanan_id');
    }
}
