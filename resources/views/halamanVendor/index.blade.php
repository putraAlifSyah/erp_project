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
                         <i>Halaman Vendor</i>
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
        <strong>Data Vendor</strong>
    </div>
    <div class="pull-right">
        <a href="/vendor/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Vendor</th>
            <th>Jenis Vendor</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama_vendor}}</td>
            <td>{{$data->jenis_vendor}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->kontak}}</td>
            <td>
                <div class="card-body">
                    <a href="vendor/{{$data->id_vendor}}/edit" class="btn-sm btn-primary rounded tombol">Ubah</a>
                    <form action="/vendor/{{$data->id_vendor}}" method="post" class="ini">
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
    </div>
    </div>
    </div>
<!-- </div> -->
@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
@endsection