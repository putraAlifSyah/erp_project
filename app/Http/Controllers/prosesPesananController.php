<?php

namespace App\Http\Controllers;

use App\Models\bahan;
use App\Models\inventory;
use App\Models\produksi;
use Illuminate\Http\Request;

class prosesPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proses(request $request)
    {
        // ambil jumlah produk yang sudah jadi untuk di cek berapa pcs yang harus dibuat
        $namaProdukJadi = produksi::where('id_produksi', $request->id_produksi)->get();
        $namaProdukJadi2= "produk ".$namaProdukJadi[0]['pesan_produk'] ;
        $cekProdukJadiInv = inventory::where('kebutuhan', $namaProdukJadi2)->select('on_hand')->first();
        $BarangInventory = inventory::where('kebutuhan', $namaProdukJadi2)->get();
        $kebutuhanProduk = $namaProdukJadi[0]['value']-$cekProdukJadiInv->on_hand;

        // mengambil data dari inventory
        $dataInventory = inventory::where('kebutuhan', $namaProdukJadi[0]['pesan_produk'])->get();


        $jumlahSebelumnya = inventory::where('kebutuhan', $namaProdukJadi[0]['pesan_produk'])->get();

        // memproses bahan untuk membuat produk yang kurang
        $bahan = bahan::where('id_produk', $namaProdukJadi[0]['id_produk'])->get();
        $kebutuhanMaterial = [];

        for ($i=0; $i < count($bahan); $i++) { 
            inventory::where('nama_barang', $jumlahSebelumnya[$i]['nama_barang'])
                    ->update([
                        'on_hand'=>$jumlahSebelumnya[$i]['on_hand']-($bahan[$i]['value']*$kebutuhanProduk),
                    ]);
        }

        produksi::where('id_produksi', $request->id_produksi)
                    ->update([
                        'status'=>'dalam proses pengerjaan',
                    ]);
        

        $jumlahProduk = inventory::where('nama_barang', $namaProdukJadi[0]['pesan_produk'])->first();
        inventory::where('nama_barang', $jumlahProduk->nama_barang)
        ->update([
                    'on_hand'=>$jumlahProduk->on_hand+$kebutuhanProduk,
                ]);
        return redirect('/produksi')->with('status', 'Data telah berhasil diubah');
    }

    public function selesai(request $request)
    {
        $dataProduksi = produksi::where('id_produksi', $request->id_produksi)->get();
        $dataInventory = inventory::where('nama_barang', $dataProduksi[0]['pesan_produk'])->first();
        // dd($dataInventory->on_hand);
        inventory::where('nama_barang', $dataProduksi[0]['pesan_produk'])
        ->update([
                    'on_hand'=>$dataInventory->on_hand-$dataProduksi[0]['value'],
                ]);

        produksi::where('id_produksi', $request->id_produksi)
        ->update([
                    'status'=>"Selesai",
                ]);
                
        return redirect('/produksi')->with('status', 'Data telah berhasil diubah');

    }

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
        //
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
