<?php

namespace App\Http\Controllers;

use App\Models\bahan;
use App\Models\purchaseOrder;
use App\Models\rfq;
use App\Models\vendor;
use Illuminate\Http\Request;

class RFQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function confirm(Request $request){
        rfq::where('id_vendor', $request->rfq)
        ->update([
                    'status'=>'PO',
                ]);
        $getPanjang = rfq::where('id_vendor', $request->rfq)->get();
        // dd($getPanjang[1]->Panggil_nama_bahan['harga']);
        // dd($getPanjang[0]->id_vendor);
        for ($i=0; $i < count($getPanjang); $i++) { 
            purchaseOrder::create([
                'nama_vendor' => $getPanjang[$i]->Panggilvendor['nama_vendor'],
                'tanggal_order' => $getPanjang[$i]->tanggal_order,
                'nama_bahan' => $getPanjang[$i]->Panggil_nama_bahan['nama_bahan'],
                'qty' => $getPanjang[$i]->quantity,
                'harga_satuan' => $getPanjang[$i]->harga_total,
                'harga_total' => $getPanjang[$i]->harga_total,
                'total' => $getPanjang[$i]->harga_total,
                'status' => 'Nothing To Bill',
            ]);
        }
        return redirect('/rfq');
            
    }

    public function filter(Request $request){
        $data=rfq::where('id_vendor', $request->filter)->whereNotIn('status', ['PO'])->get();
        $datafilter=vendor::where('id_vendor', $request->filter)->first();
        $dataVendor=vendor::all();
        return view ('/halamanRFQ/filter', [
            'data'=>$data,
            'dataVendor' => $dataVendor,
            'datafilter' => $datafilter,
        ]);
    }

     public function index()
    {
        $data=rfq::whereNotIn('status', ['PO']);
        $dataVendor=vendor::all();
        return view ('/halamanRFQ/index', [
            'data'=>$data,
            'dataVendor' => $dataVendor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rfq=rfq::all();
        $vendor=vendor::all();
        $bahan=bahan::all();
        return view('halamanRFQ/tambahRFQ', [
                    'rfq'=>$rfq,
                    'vendor'=>$vendor,
                    'bahan'=>$bahan,
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
        // $request->validate([
        //     'addmore.*.quantity' => 'required',
        // ]);

        // foreach ($request->addmore as $key => $value) {
        //     dd($value);
        //     // ProductStock::create($value);
        // }

        $bahan = bahan::where('id', $request->id)->first();
        $idbahan = $bahan->id;
        $harga = $bahan->harga*$request->quantity;
        // dd($bahan->harga);
        if ($request->bahantambahan < 1) {
            rfq::create([
                'id_vendor' => $request->id_vendor,
                'tanggal_order' => $request->tanggal_order,
                'id' => $idbahan,
                'quantity' => $request->quantity,
                'id_bahan' => $idbahan,
                'harga_total' => $harga*1000,
                'status' => 'rfq',
            ]);
            // rfq::create($request->all());
            return redirect('/rfq')->with ('status', 'Data telah berhasil ditambahkan');
        }
        // dd($id2);
        // dd($request->$id2);
        $index = 0;
        $bahan = bahan::where('id', $request->id)->first();
        $idbahan = $bahan->id;
        $harga = $bahan->harga*$request->quantity;
        rfq::create([
            'id_vendor' => $request->id_vendor,
            'tanggal_order' => $request->tanggal_order,
            'id' => $idbahan,
            'quantity' => $request->quantity,
            'id_bahan' => $idbahan,
            'harga_total' => $harga*1000,
            'status' => 'rfq',
        ]);
        foreach ($request->addmore as $key => $value) {
            $index++;
            $id2 = "id".($index);
            $bahan = bahan::where('id', $request->$id2)->first();
            $idbahan = $bahan->id;
            $harga = $bahan->harga*$request->quantity;
            rfq::create([
                'id_vendor' => $request->id_vendor,
                'tanggal_order' => $request->tanggal_order,
                'id' => $request->$id2,
                'quantity' => $value['quantity'],
                'id_bahan' => $idbahan,
                'harga_total' => $harga*1000,
                'status' => 'rfq',
            ]);
        }
        return redirect('/rfq')->with ('status', 'Data telah berhasil ditambahkan');
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
