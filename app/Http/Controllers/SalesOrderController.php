<?php

namespace App\Http\Controllers;

use App\Models\invoicing;
use App\Models\quotationOrder;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesorder=SalesOrder::all();
        return view ('/halamanSalesOrder/index', [
            'data'=>$salesorder,
        ]);
    }


    public function confirm(Request $request){
        $dataOrder = SalesOrder::where('id', $request->sales_order)->first();

        $jmlData = SalesOrder::where([
            'id_customer' => $dataOrder->id_customer,
            'kode_order' => $dataOrder->kode_order,
        ])->get();

        // dd($jmlData[0]['id_customer']);
        for ($i=0; $i < count($jmlData); $i++) { 
            invoicing::create([
                'kode_order' => $jmlData[$i]['kode_order'],
                'id_customer' => $jmlData[$i]['id_customer'],
                'expired' => $jmlData[$i]['expired'],
                'batas_pembayaran' => $jmlData[$i]['batas_pembayaran'],
                'qty' => $jmlData[$i]['qty'],
                'id_produk' => $jmlData[$i]['id_produk'],
                'sub_total' => $jmlData[$i]['sub_total'],
                'status' => 'Draft',
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
