<?php

namespace App\Http\Controllers;

use App\Models\bom;
use App\Models\inventory;
use Illuminate\Http\Request;

class BoMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ubahStatusPesan(Request $request, bom $bom)
    {
        bom::where('id_material', $request->id_material)
        ->update([
            'status'=>'Dalam Pemesanan',
        ]);
        return redirect('/bom');
    }

    public function tambahkeInventory(Request $request, bom $bom)
    {
        $nama_barang = bom::where('id_material', $request->id_material)->select('nama_material')->get();
        $nama_barang2 = bom::where('id_material', $request->id_material)->get();
        // $bahanInventory = inventory::where('nama_barang', $nama_barang->nama_material)->get();
        // dd($nama_barang[0]['nama_material']);
        inventory::where('nama_barang', $nama_barang[0]['nama_material'])
                    ->update([
                        // 'kode_lembaga'=>$request->kode_lembaga,
                        'on_hand'=>$nama_barang2[0]['jumlah'],
                    ]);
        bom::where('id_material', $request->id_material)
        ->update([
            'status'=>'Telah Diterima',
        ]);
        return redirect('/bom')->with('status', 'Data telah berhasil diubah');

    }

    public function index()
    {
        $data=bom::all();
        // dd($data);
        return view ('/halamanBoM/index', ['data'=>$data]);
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
