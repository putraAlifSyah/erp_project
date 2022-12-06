<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;

class vendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=vendor::all();
        return view ('/halamanVendor/index', [
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halamanVendor/tambahVendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'kode_lembaga' => 'required|max:25',
            'nama_vendor' => 'required',
            'jenis_vendor' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ]);

        vendor::create($request->all());
        return redirect('/vendor')->with ('status', 'Data telah berhasil ditambahkan');
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
    public function edit(vendor $vendor)
    {
        return view ('halamanVendor/editVendor', ['vendor'=>$vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        vendor::where('id_vendor', $vendor->id_vendor)
                    ->update([
                        // 'kode_lembaga'=>$request->kode_lembaga,
                        'nama_vendor'=>$request->nama_vendor,
                        'jenis_vendor'=>$request->jenis_vendor,
                        'alamat'=>$request->alamat,
                        'kontak'=>$request->kontak,
                    ]);
        return redirect('/vendor')->with('status', 'Data telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        vendor::destroy($vendor->id_vendor);
        return redirect('/vendor')->with('status', 'Data telah berhasil dihapus');
    }
}
