<?php

namespace App\Http\Controllers;
use App\Pesanan;
use App\Paketan_pesanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
            $data = Pesanan::get();
            return response([
                'success' => true,
                'message' => 'List Semua data',
                'data' => $data
            ], 200); 
    }
    
    public function PaketPesanan()
    {   
        
        $data = Pesanan::with('paket')->get();
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
            'nama_pelanggan'           => 'required',
        ],
            [
                'nama_pelanggan.required'         => 'Masukkan nama aksesoris !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {
            $pesanan = New Pesanan;
            $pesanan->nama_pelanggan = $request->input('nama_pelanggan');
            $pesanan->lokasi_pengiriman = $request->input('lokasi');
            $pesanan->waktu_diantar = $request->input('waktu');
            $pesanan->nama_kurir = $request->input('kurir');
            $pesanan->status_pemesanan = $request->input('status_pemesanan');
            $pesanan->status_pembayaran = $request->input('status_pembayaran');
            $pesanan->save();

            for ($i=0; $i <count($request->input('paket')) ; $i++) {
                $paket = New Paketan_pesanan;
                $paket->paketan_id = $request->input('paket')[$i];
                $paket->qty_pap = $request->input('kuantitas')[$i];
                $pesanan->Paketpesanan()->save($paket);
            }

            $i=0;
            if ($pesanan) {
                return response()->json([
                    'success' => true,
                    'message' => 'pesanan Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'pesanan Gagal Disimpan!',
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
    public function update(Request $request, $id)
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

            $pesanan = Pesanan::whereId($id)->update([
                'nama_pelanggan'                => $request->input('nama_pesanan'),
                'lokasi_pengiriman'             => $request->input('deskripsi'),
                'waktu_diantar'                 => $request->input('waktu'),
                'nama_kurir'                    => $request->input('kurir'),
                'status_pembayaran'             => $request->input('status_pemesanan'),
                'status_pemesanan'              => $request->input('pembayaran'),
            ]);
            
            $paket = Paketan_pesanan::where('produk_id',$id);
            $paket->delete();
            
            for ($i=0; $i <count($request->input('paket')) ; $i++) {
                $paket = New Paketan_pesanan;
                $paket->bahan_id = $request->input('paket')[$i];
                $paket->qty_bp = $request->input('kuantitas')[$i];
                $pesanan->PaketPesanan()->save($bahan);
            }
            if ($paket) {
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
       $pesanan = Pesanan::findOrFail($id);
       $paket = Paketan_pesanan::where('pesanan_id',$id);
       $pesanan->delete();
       $paket->delete();
       if ($pesanan) {
           return response()->json([
               'success' => true,
               'message' => 'Pesanan Berhasil Dihapus!',
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Pesanan Gagal Dihapus!',
           ], 500);
       }
    
    }
}
