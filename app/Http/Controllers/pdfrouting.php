<?php

namespace App\Http\Controllers;

use App\Models\invoicing;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF;
use PDF;

class pdfrouting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('/pdf/index');
    }

    public function cetak_pdf(Request $request)
    {
        $dataInvoice = invoicing::where('kode_order', $request->invoice)->get();
        $tanggal = invoicing::where('kode_order', $request->invoice)->first();
        $datahargatotal = invoicing::where('kode_order', $request->invoice)->get();
        $total = 0;
        foreach($datahargatotal as $data){
            $total += $data->sub_total;
        }
        
         $pdf = PDF::setOptions([
                'isHtml5ParserEnabled' => true, 
                'isRemoteEnabled' => true
            ])
         ->loadview('halamanInvoice/cetakpdf', [
            'datas' => $dataInvoice,
            'tanggal' => $tanggal,
            'total' => $total,
        ]);


    	// $pdf = PDF::loadview('halamanInvoice/cetakpdf', [
        //     'data' => $dataInvoice,
        //     'tanggal' => $tanggal,
        // ]);

    	return $pdf->download('laporan-pegawai-pdf.pdf');
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
