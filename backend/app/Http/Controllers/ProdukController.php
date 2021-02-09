<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Bahan_produk;
use App\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key)
    {   
        $data = Produk::with('kategori')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data',
            'data' => $data
        ], 200); 
    }
    public function androProduk($key)
    {   
        if($key==208222956){
            $data = Produk::with('bahan')->with('kategori')->get();
            return response([
                'success' => true,
                'message' => 'List Semua data',
                'data' => $data
            ], 200);   
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        }
    }
    
    public function BahanProduk()
    {   
        $data = Produk::with('bahan')->with('kategori')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Aksesoris',
            'data' => $data
        ], 200); 
    }

    public function ExportProduk($waktu_mulai,$waktu_akhir)
    {   
        
        $data = DB::table('produks')
        ->select(DB::raw('
            produks.*,  
            produks.id as produk_id,  
            pesanans.*,  
            kategoris.*,
            paketan_produk.qty_pp,
            paketan_pesanan.qty_pap, 
            SUM(paketan_produk.qty_pp * paketan_pesanan.qty_pap ) qtyTotal
        '))
        ->leftjoin('kategoris','produks.kategori_id','=','kategoris.id')
        ->leftjoin('paketan_produk','produks.id','=','paketan_produk.produk_id')
        ->leftjoin('paketan_pesanan','paketan_produk.paketan_id','=','paketan_pesanan.paketan_id')
        ->leftjoin('pesanans','paketan_pesanan.pesanan_id','=','pesanans.id')
        ->whereBetween('pesanans.waktu_diantar', [$waktu_mulai, $waktu_akhir])
        ->groupBy('produks.id')
        ->get();       
        return response([
            'success' => true,
            'message' => 'List Semua Aksesoris',
            'data' => $data
        ], 200);
    }
    
    public function androExportProduk($key,$waktu_mulai,$waktu_akhir)
    {    
        
        if($key==208222956){
            $data = DB::table('produks')
            ->select(DB::raw('
                produks.*,  
                produks.id as produk_id,  
                pesanans.*,  
                kategoris.*,
                paketan_produk.qty_pp,
                paketan_pesanan.qty_pap, 
                SUM(paketan_produk.qty_pp * paketan_pesanan.qty_pap ) qtyTotal
            '))
            ->leftjoin('kategoris','produks.kategori_id','=','kategoris.id')
            ->leftjoin('paketan_produk','produks.id','=','paketan_produk.produk_id')
            ->leftjoin('paketan_pesanan','paketan_produk.paketan_id','=','paketan_pesanan.paketan_id')
            ->leftjoin('pesanans','paketan_pesanan.pesanan_id','=','pesanans.id')
            ->whereBetween('pesanans.waktu_diantar', [$waktu_mulai, $waktu_akhir])
            ->groupBy('produks.id')
            ->get();       
            return response([
                'success' => true,
                'message' => 'List Semua data',
                'data' => $data
            ], 200);
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($key,Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'nama_produk'           => 'required',
        ],
            [
                'name.required'         => 'Masukkan nama aksesoris !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {
            $src = $request->file('src');
            $new_src = '/images/'.rand() . '.' . $src->getClientOriginalExtension();
            $src->move(public_path('images'), $new_src);

            $produk = New Produk;
            $produk->nama_produk = $request->input('nama_produk');
            $produk->deskripsi = $request->input('deskripsi');
            $produk->kategori_id = $request->input('kategori');
            $produk->d_jam = $request->input('jam');
            $produk->d_menit = $request->input('menit');
            $produk->d_detik = $request->input('detik');
            $produk->harga_produk = $request->input('harga');
            $produk->foto_produk = $new_src;
            $produk->stepbystep = $request->input('step');
            $produk->porsi = $request->input('porsi');
            $produk->save();

            for ($i=0; $i <count($request->input('bahan')) ; $i++) {
                $bahan = New Bahan_produk;
                $bahan->bahan_id = $request->input('bahan')[$i];
                $bahan->qty_bp = $request->input('kuantitas')[$i];
                $produk->BahanProduk()->save($bahan);
            }

            $i=0;
            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'produk Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'produk Gagal Disimpan!',
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if($key==993552588239840924){
            $data = Produk::with('bahan')->with('kategori')->where('id',$id)->get();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($key,$id)
    {   
        if($key==993552588239840924){
            $data = Produk::with('bahan')->with('kategori')->whereId($id)->get();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($key,Request $request, $id)
    {   
        if($key==993552588239840924){
            $validator = Validator::make($request->all(), [
                'nama_produk'           => 'required',
            ],
                [
                    'name.required'         => 'Masukkan nama aksesoris !',
                ]
            );
    
            if($validator->fails()) {
    
                return response()->json([
                    'success' => false,
                    'message' => 'Silahkan Isi Bidang Yang Kosong',
                    'data'    => $validator->errors()
                ],400);
    
            } else {
                if ($request->input('step')!=null) {
                    if ($request->file('src')!=null) {
                        $src = $request->file('src');
                        $new_src = '/images/'.rand() . '.' . $src->getClientOriginalExtension();
                        $src->move(public_path('images'), $new_src);
                    
                        $produk = Produk::whereId($id)->update([
                            'nama_produk'           => $request->input('nama_produk'),
                            'deskripsi'             => $request->input('deskripsi'),
                            'kategori_id'           => $request->input('kategori'),
                            'd_jam'                 => $request->input('jam'),
                            'd_menit'               => $request->input('menit'),
                            'd_detik'               => $request->input('detik'),
                            'harga_produk'          => $request->input('harga'),
                            'foto_produk'           => $new_src,
                            'stepbystep'            => $request->input('step'),
                            'porsi'                 => $request->input('porsi'),
            
            
                        ]);
                    }
                    else{    
                        $produk = Produk::whereId($id)->update([
                            'nama_produk'           => $request->input('nama_produk'),
                            'deskripsi'             => $request->input('deskripsi'),
                            'kategori_id'           => $request->input('kategori'),
                            'd_jam'                 => $request->input('jam'),
                            'd_menit'               => $request->input('menit'),
                            'd_detik'               => $request->input('detik'),
                            'harga_produk'          => $request->input('harga'),
                            'stepbystep'            => $request->input('step'),
                            'porsi'                 => $request->input('porsi'),
                        ]);
                    }
                }else{
                    if ($request->file('src')!=null) {
                        $src = $request->file('src');
                        $new_src = '/images/'.rand() . '.' . $src->getClientOriginalExtension();
                        $src->move(public_path('images'), $new_src);
                    
                        $produk = Produk::whereId($id)->update([
                            'nama_produk'           => $request->input('nama_produk'),
                            'deskripsi'             => $request->input('deskripsi'),
                            'kategori_id'           => $request->input('kategori'),
                            'd_jam'                 => $request->input('jam'),
                            'd_menit'               => $request->input('menit'),
                            'd_detik'               => $request->input('detik'),
                            'harga_produk'          => $request->input('harga'),
                            'foto_produk'           => $new_src,
                            'porsi'                 => $request->input('porsi'),
            
            
                        ]);
                    }
                    else{    
                        $produk = Produk::whereId($id)->update([
                            'nama_produk'           => $request->input('nama_produk'),
                            'deskripsi'             => $request->input('deskripsi'),
                            'kategori_id'           => $request->input('kategori'),
                            'd_jam'                 => $request->input('jam'),
                            'd_menit'               => $request->input('menit'),
                            'd_detik'               => $request->input('detik'),
                            'harga_produk'          => $request->input('harga'),
                            'porsi'                 => $request->input('porsi'),
                        ]);
                    }
                }                   
                $bahan = Bahan_Produk::where('produk_id',$id);
                $bahan->delete();
                
                for ($i=0; $i <count($request->input('bahan')) ; $i++) {
                    $bahan = New Bahan_produk;
                    $bahan->bahan_id = $request->input('bahan')[$i];
                    $bahan->qty_bp = $request->input('kuantitas')[$i];
                    $produk->BahanProduk()->save($bahan);
                }
    
                if ($produk) {
                    return response()->json([
                        'success' => true,
                        'message' => 'produk Berhasil Disimpan!',
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'produk Gagal Disimpan!',
                    ], 400);
                }
            }
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($key,$id)
    {   
        if($key==993552588239840924){
            $produk = Produk::findOrFail($id);
            $bahan = Bahan_Produk::where('produk_id',$id);
            $produk->delete();
            $bahan->delete();
    
            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'Aksesoris Berhasil Dihapus!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Aksesoris Gagal Dihapus!',
                ], 500);
            }
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        } 
       
    }
}
