<?php

namespace App\Http\Controllers;

use App\Models\costumerInvoicing;
use App\Models\customer;
use App\Models\inventory;
use App\Models\invoicing;
use App\Models\produk;
use App\Models\quotationOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class invoicingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=invoicing::all();
        return view ('/halamanInvoice/index', [
            'data'=>$data,
        ]);
    }

    public function post(Request $request){
        invoicing::where('kode_order', $request->invoice)
        ->update([
            'status' => 'Posted'
        ]);
        return redirect('/invoice')->with('status', 'Invoice telah dibuat');
    }

    public function paid(Request $request){
        $data=invoicing::where('kode_order', $request->invoice)->get();
        $kode_order = $request->invoice;
        $total = 0;
        foreach ($data as $data) {
            $total+=$data->sub_total;
        }
        return view ('/halamanInvoice/payment', [
            'data'=>$data,
            'total' => $total,
            'kode_order' => $kode_order,
        ]);
    }

    public function bayar(Request $request){
        $data_order = invoicing::where('kode_order', $request->kode_order)->get();
        $nama_customer = customer::where('id_customer', $data_order[0]['id_customer'])->first();
        
        if ($request->bayar < $request->Total_Pembayaran) {
            return back()->with('duplikat', 'Pembayaran Kurang');
        }
        
        for ($i=0; $i < count($data_order); $i++) {
            $nama_produk = produk::where('id_produk', $data_order[$i]['id_produk'])->first();
            // $nama_customer2 = $nama_customer[0]['nama_customer']
            costumerInvoicing::create([
                'kode_order' => $data_order[$i]['kode_order'],
                'nama' => $nama_customer->nama_customer,
                'produk' => $nama_produk->nama_produk,
                'value' =>$data_order[$i]['qty'],
                'harga' =>$data_order[$i]['sub_total'],
                'tanggal' =>date('Y-m-d'),
                'status' =>'Paid',
            ]);
        }
        
        invoicing::where('kode_order', $request->kode_order)
        ->update([
            'status' => 'Paid',
        ]);
        // $data = invoicing::where('kode_order', $request->kode_order)->get();
        // for ($i=0; $i < count($data) ; $i++) { 
        //     $namaProduk = produk::where('id_produk', $data[$i]['id_produk'])->first();
        //     $onhand = inventory::where('nama_barang', $namaProduk->nama_produk)->first();
        //     inventory::where('nama_barang', $namaProduk->nama_produk)
        //     ->update([
        //         'on_hand' => $onhand->on_hand - $data[$i]['qty'],
        //     ]);
        // }

        return redirect('/invoice')->with('status', 'Pesanan Telah Dibayar');
    }

    public function validasi(Request $request){
        $data = invoicing::where('kode_order', $request->invoice)->get();
        for ($i=0; $i < count($data) ; $i++) { 
            $namaProduk = produk::where('id_produk', $data[$i]['id_produk'])->first();
            $onhand = inventory::where('nama_barang', $namaProduk->nama_produk)->first();
            inventory::where('nama_barang', $namaProduk->nama_produk)
            ->update([
                'on_hand' => $onhand->on_hand - $data[$i]['qty'],
            ]);
        }

        

        return redirect('/invoice')->with('status', 'Barang telah diterima');
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
