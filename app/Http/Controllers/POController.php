<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\produksi;
use App\Models\purchaseOrder;
use App\Models\rfq;
use App\Models\vendor;
use App\Models\vendorBill;
use Illuminate\Http\Request;

class POController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filter(Request $request){
        $data=purchaseOrder::where('nama_vendor', $request->filter)->get();
        $nama_vendor=purchaseOrder::where('nama_vendor', $request->filter)->first();
        $totalHargaSemua = 0;
        $status = '';
        $namaButton = '';
        foreach ($data as $datas) {
            $totalHargaSemua+=$datas->harga_total;
            $status = $datas->status;
        }
        if ($status === 'Nothing To Bill') {
           $namaButton = 'Confirm';
        }
        else if ($status === 'In Order') {
           $namaButton = 'Receive';
        }
        else if ($status === 'Waiting To Bill') {
           $namaButton = 'Pay';
        }
        $datafilter=vendor::where('nama_vendor', $request->filter)->first();
        $dataVendor=vendor::all();
        return view ('/halamanPO/filter', [
            'datas'=>$data,
            'dataVendor' => $dataVendor,
            'datafilter' => $datafilter,
            'totalHargaSemua' => $totalHargaSemua,
            'nama_vendor' => $nama_vendor,
            'namaButton' => $namaButton,
        ]);
    }

    public function proses(Request $request){
        $data = purchaseOrder::where('nama_vendor', $request->namavendor)->first();
        if ($data->status === "Nothing To Bill") {
            purchaseOrder::where('nama_vendor', $request->namavendor)
            ->update([
                // 'kode_lembaga'=>$request->kode_lembaga,
                'status' =>'In Order'
            ]);
            return redirect('/po'); 
        }
        else if ($data->status === "In Order") {

            // menambah data di inventory
            $bahanTerima = purchaseOrder::where('nama_vendor', $request->namavendor)->get();
            // dd($bahanTerima[0]->nama_bahan);
            foreach ($bahanTerima as $bahan) {
                inventory::where('nama_barang', $bahan->nama_bahan)
                ->update([
                    'on_hand'=>$bahan->qty,
                ]);
            }
            // Akhir

            purchaseOrder::where('nama_vendor', $request->namavendor)
            ->update([
                // 'kode_lembaga'=>$request->kode_lembaga,
                'status' =>'Waiting To Bill'
            ]);
            
            return redirect('/po'); 
        }
        if ($data->status === "Waiting To Bill") {

            // awal
            $data_order = purchaseOrder::where('nama_vendor', $request->namavendor)->get();
                    
            for ($i=0; $i < count($data_order); $i++) {
                vendorBill::create([
                    'nama_vendor' => $data_order[$i]['nama_vendor'],
                    'nama_bahan' => $data_order[$i]['nama_bahan'],
                    'value' => $data_order[$i]['qty'],
                    'harga' =>$data_order[$i]['harga_total'],
                    'tanggal' =>date('Y-m-d'),
                    'status' =>'Full Billed',
                ]);
            }
        // akhir

            purchaseOrder::where('nama_vendor', $request->namavendor)
            ->update([
                // 'kode_lembaga'=>$request->kode_lembaga,
                'status' =>'Full Billed'
            ]);
            return redirect('/po'); 
        }
    }

    public function index()
    {
        $data=purchaseOrder::all();
        $dataVendor=vendor::all();
        return view ('/halamanPO/index', [
            'datas'=>$data,
            'dataVendor'=> $dataVendor,
        ]);
        
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
