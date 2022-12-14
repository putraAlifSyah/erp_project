<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\produk;
use App\Models\quotationOrder;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class quotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=quotationOrder::all();
        return view ('/halamanQuotation/index', [
            'data'=>$data,
        ]);
    }

    public function confirm(Request $request){
        $dataOrder = quotationOrder::where('id', $request->quotation)->first();
        quotationOrder::where([
            'id_customer' => $dataOrder->id_customer,
            'kode_order' => $dataOrder->kode_order,
        ])
        ->update([
            'status' => 'Sales Order'
        ]);

        $jmlData = quotationOrder::where([
            'id_customer' => $dataOrder->id_customer,
            'kode_order' => $dataOrder->kode_order,
        ])->get();
        // dd($jmlData[0]['id_customer']);
        for ($i=0; $i < count($jmlData); $i++) { 
            SalesOrder::create([
                'kode_order' => $jmlData[$i]['kode_order'],
                'id_customer' => $jmlData[$i]['id_customer'],
                'expired' => $jmlData[$i]['expired'],
                'batas_pembayaran' => $jmlData[$i]['batas_pembayaran'],
                'qty' => $jmlData[$i]['qty'],
                'id_produk' => $jmlData[$i]['id_produk'],
                'sub_total' => $jmlData[$i]['sub_total'],
                'status' => 'Quotation',
            ]);
        }

        return redirect('/quotation')->with('status', 'Pesanan sudah di konfirmasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk=produk::all();
        $customer=customer::all();
        return view('halamanQuotation/tambahQuotation', [
                    'produk'=>$produk,
                    'customer'=>$customer,
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
        $produk = produk::where('id_produk', $request->id_produk)->first();
        // $idproduk = $produk->id_produk;
        // $harga_total = $produk->harga*$request->quantity;
        // dd($bahan->harga);
        if (!$request->id1) {
            $idProduk1 = produk::where('id_produk', $request->id_produk)->first();
            quotationOrder::create([
                'kode_order' => $request->kode_order,
                'id_customer' => $request->id_customer,
                'expired' => $request->expired,
                'batas_pembayaran' => $request->batas_pembayaran,
                'qty' => $request->qty,
                'id_produk' => $request->id_produk,
                'sub_total' => $idProduk1->harga*$request->qty,
                'status' => 'Quotation',
            ]);
            // rfq::create($request->all());
            return redirect('/rfq')->with ('status', 'Data telah berhasil ditambahkan');
        }
        else{
            $idProduk1 = produk::where('id_produk', $request->id_produk)->first();
            quotationOrder::create([
                'kode_order' => $request->kode_order,
                'id_customer' => $request->id_customer,
                'expired' => $request->expired,
                'batas_pembayaran' => $request->batas_pembayaran,
                'qty' => $request->qty,
                'id_produk' => $request->id_produk,
                'sub_total' => $idProduk1->harga*$request->qty,
                'status' => 'Quotation',
            ]);

            $index = 0;
            for ($i=1; $i <= $request->jumlahTambah2; $i++) { 
                // ambil id produk
                $idAtt='id'.$i;
                $id_produk2 = produk::where('id_produk', $request->$idAtt)->first();

                $nameAtt='quantity'.$i;
                // $index++;
                // $id2 = "id".($index);
                // $bahan = bahan::where('id', $request->$id2)->first();
                // $idbahan = $bahan->id;
                // $harga = $bahan->harga*$request->quantity;
                quotationOrder::create([
                    'kode_order' => $request->kode_order,
                    'id_customer' => $request->id_customer,
                    'expired' => $request->expired,
                    'batas_pembayaran' => $request->batas_pembayaran,
                    'qty' => $request->$nameAtt,
                    'id_produk' => $request->$idAtt,
                    'sub_total' => $id_produk2->harga*$request->$nameAtt,
                    'status' => 'Quotation',
                ]);
            }
        }
        return redirect('/quotation')->with ('status', 'Data telah berhasil ditambahkan');
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
