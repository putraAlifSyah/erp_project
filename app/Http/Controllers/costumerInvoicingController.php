<?php

namespace App\Http\Controllers;

use App\Models\costumerInvoicing;
use Illuminate\Http\Request;

class costumerInvoicingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=costumerInvoicing::all();
        return view ('/halamanCostumerInvoicing/index', [
            'data'=>$data,
            'filter' => false,
        ]);
    }

    public function filter(Request $request){
        $data=costumerInvoicing::where('tanggal', '>=', $request->dari)
        ->where('created_at', '<=', $request->sampai)
        ->get();
        $tanggalAwal = $request->dari;
        $tanggalAkhir = $request->sampai;
        return view ('/halamanCostumerInvoicing/index', [
            'data'=>$data,
            'tanggalAwal'=>$tanggalAwal,
            'tanggalAkhir'=>$tanggalAkhir,
            'filter' => true,
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
