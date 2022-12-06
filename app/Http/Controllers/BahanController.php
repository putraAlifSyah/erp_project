<?php

namespace App\Http\Controllers;

use App\Models\bahan;
use App\Models\inventory;
use App\Models\produk;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=bahan::all();
        // dd($data);
        return view ('/halamanBahan/index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk=produk::all();
        return view('halamanBahan/tambahBahan', [
                    'produk'=>$produk
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
        // mendapatkan nama bahan untuk diinputkan ke inventory
        $nama_barang = produk::where('id_produk',$request->id_produk)->select('nama_produk')->first();
        // dd($nama_barang);
        $kode_barang = 'B'.date('h-i-s-') . mt_rand(100, 999);
        $inventory = inventory::create([
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_bahan,
            'on_hand' => 0,
            'kebutuhan' =>$nama_barang->nama_produk,
        ]);

        $validated = $request->validate([
            'id_produk' => 'required',
            'nama_bahan' => 'required',
            'value' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'vendor' => 'required',
        ]);
        bahan::create($request->all());
        return redirect('/bahan')->with ('status', 'Data telah berhasil ditambahkan');
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
    public function edit(bahan $bahan)
    {
        $produk=produk::all();
        return view('halamanBahan/editBahan', [
                    'bahan'=>$bahan,
                    'produk'=>$produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bahan $bahan)
    {
        // $this->validate($request, [
        //     'id_produk' => 'required',
        //     'nama_bahan' => 'required',
        //     'value' => 'required',
        //     'satuan' => 'required',
        //     'vendor' => 'required',
        // ]);

        $nama_produkInv = produk::where('id_produk',$request->id_produk)->select('nama_produk')->first();
        inventory::where('nama_barang', $request->bahan_lama)->update([
                        'nama_barang'=>$request->nama_bahan,
                        'kebutuhan'=>$nama_produkInv->nama_produk,
        ]);

        bahan::where('id', $request->id)
                    ->update([
                        'id_produk'=>$request->id_produk,
                        'nama_bahan'=>$request->nama_bahan,
                        'value'=>$request->value,
                        'satuan'=>$request->satuan,
                        'vendor'=>$request->vendor,
                    ]);
        return redirect('/bahan')->with('status', 'Data telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(bahan $bahan)
    {
        // $nama_bahan = produk::where('id_produk', $bahan->id_produk)->select('nama_produk')->first();
        // dd($nama_bahan-);
        $deleteInventory = inventory::where('nama_barang', $bahan->nama_bahan)->delete();
        bahan::destroy($bahan->id);
        return redirect('/bahan')->with('status', 'Data telah berhasil dihapus');
    }
}
