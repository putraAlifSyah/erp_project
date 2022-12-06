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
<div class="container">
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <strong>Data Produksi</strong>
    </div>
    <div class="pull-right">
        <a href="/produk/tambah" class="btn-sm btn-success rounded mb-5">Cek Ketersediaan</a>
    </div>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Material</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama_material}}</td>
            <td>{{$data->jumlah}}</td>
            <td>{{$data->satuan}}</td>
            <td>{{$data->keterangan}}</td>
            <td>RP. {{$data->total_harga}}</td>
            <td>{{$data->status}}</td>
            <td>
                <div class="card-body">
                    <a href="Pesan/{{$data->id_material}}" class="btn-sm btn-primary rounded tombol">Pesan</a>
                    <a href="tambahBahanInventory/{{$data->id_material}}" class="btn-sm btn-primary rounded tombol">Konfirmasi Penerimaan</a>
                    {{-- <form action="/produk/{{$data->id_produk}}" method="post" class="ini">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-xs btn-danger rounded" onclick="return confirm('Are you sure?')" style="font-size:13.5px">Hapus</buton>          
                    </form>  --}}
                    <div class="clear"></div>
                </div>
            </td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    <div class="pull-right">
        <a href="/produk/tambah" class="btn-sm btn-success rounded mb-5">Proses Order</a>
    </div>
    </div>
    </div>
    </div>
<!-- </div> -->
@if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
@endsection