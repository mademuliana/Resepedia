<?php

namespace App\Http\Controllers;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Kategori::all();
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
        $kategori = New Kategori;
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->keterangan_kategori = $request->input('keterangan_kategori');
        $kategori->kode = $request->input('kode');
        $kategori->save();
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
        $kategori = Kategori::whereId($id)->update([
            'nama_kategori'             => $request->input('nama_kategori'),
            'kode'                      => $request->input('kode'),
            'keterangan_kategori'       => $request->input('keterangan_kategori'),
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
    
        $data = Kategori::findOrFail($id);
        $data->delete();   
    }
}
