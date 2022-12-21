<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\produksi;
use Illuminate\Http\Request;

class ManufakturingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = produk::all();
        return view('HalamanManufakturingOrder/tambahManufakturing',[
            'produk' => $produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan_produk = produk::where('id_produk', $request->id_produk)->first();
        produksi::create([
            'kode_order' => $request->kode_order,
            'nama_pemesan' => $request->nama_customer,
            'pesan_produk' => $pesan_produk->nama_produk,
            'value' => $request->value,
            'status' => 'Dalam Antrian',
            'id_produk' => $request->id_produk,
        ]);

        return redirect('/produksi')->with ('status', 'Data telah berhasil ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
