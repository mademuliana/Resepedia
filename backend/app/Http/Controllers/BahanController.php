<?php

namespace App\Http\Controllers;
use App\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $data = Bahan::with('kategori')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Aksesoris',
            'data' => $data
        ], 200);   
    }
    public function androBahan()
    {   

        $data = Bahan::with('kategori')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Aksesoris',
            'data' => $data
        ], 200);           
    }

    public function androExportBahan($key,$waktu_mulai,$waktu_akhir)
    {   
        if($key==208222956){
            $data = DB::table('bahans')
            ->select(DB::raw('
                bahans.*,  
                bahans.id as bahan_id, 
                kategoris.*,
                bahan_produk.qty_bp,
                paketan_produk.qty_pp,
                paketan_pesanan.qty_pap, 
                SUM(bahan_produk.qty_bp * paketan_produk.qty_pp * paketan_pesanan.qty_pap / produks.porsi ) qtyTot
            '))
            ->leftjoin('kategoris','bahans.kategori_id','=','kategoris.id')
            ->leftjoin('bahan_produk','bahans.kategori_id','=','kategoris.id')
            ->leftjoin('produks','produks.id','=','bahan_produk.produk_id')
            ->leftjoin('paketan_produk','paketan_produk.produk_id','=','bahan_produk.produk_id')
            ->leftjoin('paketan_pesanan','paketan_pesanan.paketan_id','=','paketan_produk.paketan_id')
            ->leftjoin('pesanans','pesanans.id','=','paketan_pesanan.pesanan_id')
            ->whereBetween('pesanans.waktu_diantar', [$waktu_mulai, $waktu_akhir])
            ->groupBy('bahans.id')
            ->get();       
            return response([
                'success' => true,
                'message' => 'List Semua Aksesoris',
                'data' => $data
            ], 200);   
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        }
    }
    public function ExportBahan($waktu_mulai,$waktu_akhir)
    {   

        $data = DB::table('bahans')
        ->select(DB::raw('
            bahans.*,  
            bahans.id as bahan_id, 
            kategoris.*,
            bahan_produk.qty_bp,
            paketan_produk.qty_pp,
            paketan_pesanan.qty_pap, 
            SUM(bahan_produk.qty_bp * paketan_produk.qty_pp * paketan_pesanan.qty_pap / produks.porsi ) qtyTot
        '))
        ->leftjoin('kategoris','bahans.kategori_id','=','kategoris.id')
        ->leftjoin('bahan_produk','bahans.id','=','bahan_produk.bahan_id')
        ->leftjoin('produks','produks.id','=','bahan_produk.produk_id')
        ->leftjoin('paketan_produk','paketan_produk.produk_id','=','bahan_produk.produk_id')
        ->leftjoin('paketan_pesanan','paketan_pesanan.paketan_id','=','paketan_produk.paketan_id')
        ->leftjoin('pesanans','pesanans.id','=','paketan_pesanan.pesanan_id')
        ->whereBetween('pesanans.waktu_diantar', [$waktu_mulai, $waktu_akhir])
        ->groupBy('bahans.id')
        ->get();       
        return response([
            'success' => true,
            'message' => 'List Semua Aksesoris',
            'data' => $data
        ], 200);   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $bahan = New Bahan;
        $bahan->nama_bahan = $request->input('nama_bahan');
        $bahan->takaran = $request->input('takaran');
        $bahan->kategori_id = $request->input('kategori_id');
        $bahan->save();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $produk = Produk::whereId($id)->update([
            'nama_produk'           => $request->input('nama_bahan'),
            'takaran'               => $request->input('takaran'),
            'kategori_id'           => $request->input('kategori_id'),
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $data = Bahan::findOrFail($id);
        $data->delete();
       
    }
}
