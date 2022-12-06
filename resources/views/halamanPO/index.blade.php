@extends('../layout/main')

@section('title','Home')

@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1 style="font-size:18px;">Data</h1>
            </div>
            </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                         <i>Data Periode</i>
                        </ol>
                    </div>
                </div>
            </div>
             
</div>
@endsection

@section('konten')
@php
    $totalHarga=array();
@endphp
<div class="container">
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <strong>Data Produk</strong>
    </div>
    <div class="pull-right">
        <form action="/po/filter" style="display: flex" method="get"> 
            {{-- @csrf --}}
            <select name="filter" class="form-control mb-1 mr-2" id="filter" style="display: inline">
                <option value="">Pilih Vendor</option>
                    @foreach ($dataVendor as $item)
                        <option value="{{ $item->nama_vendor }}">{{ $item->nama_vendor }}</option>
                    @endforeach
            </select>
            <button class="btn-sm btn-outline-secondary rounded mt-0.5" type="submit" id="button-addon2" style="height: 35px">Submit</button>
            </form>
    </div>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Vendor</th>
            <th>Tanggal Order</th>
            <th>Nama Bahan</th>
            <th>Quantity</th>
            <th>Harga Satuan</th>
            <th>Harga Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($datas as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama_vendor}}</td>
            <td>{{$data->tanggal_order}}</td>
            <td>{{$data->nama_bahan}}</td>
            <td>{{$data->qty}}</td>
            <td>{{$data->harga_satuan}}</td>
            <td>{{$data->harga_total}}</td>
            {{-- @php
                $harga = $data->harga_total;
                // dd($harga);
                $totalHarga[$data->nama_vendor] = $harga;
                dd($totalHarga);
            @endphp --}}
            <td>{{$data->status}}</td>
            <td>
                <div class="card-body">
                    {{-- <a href="produk/{{$data->id_produk}}/edit" class="btn-sm btn-primary rounded tombol">Ubah</a> --}}
                    <form action="/produk/{{$data->id_produk}}" method="post" class="ini">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-xs btn-danger rounded" onclick="return confirm('Are you sure?')" style="font-size:13.5px">Hapus</buton>          
                    </form> 
                    <div class="clear"></div>
                </div>
            </td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    {{-- <form action="/po/proses" style="display: flex" method="get"> 
        <p style="margin-right: 50px">Total: </p><input type="text" class="">
        <button class="btn-sm btn-outline-secondary rounded mt-0.5" type="submit" id="button-addon2" style="height: 35px">proses</button>
        </form> --}}
    </div>
    </div>
    </div>
    <script>
        
    </script>
<!-- </div> -->
@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
@endsection