<?php

namespace App\Http\Controllers;
use App\Paketan;
use App\Produk_paketan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key)
    {   
        $data = Paketan::with('kategori')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data',
            'data' => $data
        ], 200);
    }
    
    public function ProdukPaket($key)
    {   
        $data = Paketan::with('produk')->with('kategori')->get();
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
        
        $validator = Validator::make($request->all(), [
            'nama_paket'           => 'required',
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

            $paket = New Paketan;
            $paket->nama_paket = $request->input('nama_paket');
            $paket->deskripsi = $request->input('deskripsi');
            $paket->kategori_id = $request->input('kategori');
            $paket->d_jam = $request->input('jam');
            $paket->d_menit = $request->input('menit');
            $paket->d_detik = $request->input('detik');
            $paket->harga_paket = $request->input('harga');
            $paket->foto_paket = $new_src;
            $paket->porsi = $request->input('porsi');
            $paket->save();

            for ($i=0; $i <count($request->input('produk')) ; $i++) {
                $produk = New Produk_paketan;
                $produk->produk_id = $request->input('produk')[$i];
                $produk->qty_pp = $request->input('kuantitas')[$i];
                $produk->takaran = $request->input('takaran')[$i];
                $paket->produkPaketan()->save($produk);
            }

            $i=0;
            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'Paket Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Paket Gagal Disimpan!',
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
    public function update($key,Request $request, $id)
    {   
        
        $validator = Validator::make($request->all(), [
            'nama_paket'           => 'required',
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

                $src = $request->file('foto_paket');
                $new_src = '/images/'.rand() . '.' . $src->getClientOriginalExtension();
                $src->move(public_path('images'), $new_src);
            if ($new_src!=null) {
                $produk = Paketan::whereId($id)->update([
                    'nama_paket'           => $request->input('nama_paket'),
                    'deskripsi'             => $request->input('deskripsi'),
                    'kategori_id'           => $request->input('kategori'),
                    'd_jam'                 => $request->input('jam'),
                    'd_menit'               => $request->input('menit'),
                    'd_detik'               => $request->input('detik'),
                    'harga_paket'          => $request->input('harga'),
                    'foto_paket'           => $new_src,
                    'stepbystep'            => $request->input('step'),
                    'porsi'                 => $request->input('porsi'),
                ]);
            }
            else {
            $produk = Paketan::whereId($id)->update([
                'nama_paket'           => $request->input('nama_paket'),
                'deskripsi'             => $request->input('deskripsi'),
                'kategori_id'           => $request->input('kategori'),
                'd_jam'                 => $request->input('jam'),
                'd_menit'               => $request->input('menit'),
                'd_detik'               => $request->input('detik'),
                'harga_paket'          => $request->input('harga'),
                'stepbystep'            => $request->input('step'),
                'porsi'                 => $request->input('porsi'),
            ]);
            }
            $bahan = Produk_paketan::where('produk_id',$id);
            $bahan->delete();
            
            for ($i=0; $i <count($request->input('produk')) ; $i++) {
                $bahan = New Produk_paketan;
                $bahan->bahan_id = $request->input('produk')[$i];
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
        
    }
    public function destroy($id)
    {   
        $paket = Paketan::findOrFail($id);
        $produk = Produk_paketan::where('paketan_id',$id);
        $paket->delete();
        $produk->delete();
        if ($produk) {
            return response()->json([
                'success' => true,
                'message' => 'Paket Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Paket Gagal Dihapus!',
            ], 500);
        }        
    }
}
