@extends('../layout/main')

@section('title','Tambah Data')

@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Data</h1>
            </div>
        </div>
        </div>
         <div class="col-sm-8">
             <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                       <!-- <li><i>Tambah Data</i></li> -->
                    </ol>
                </div>
            </div>
        </div>
</div>
@endsection

@section('konten')
<!-- <div class="container"> -->
<form method="post" action="/sales">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">
{{-- 
        <div class="form-group">
            <label for="id_produk">Pilih Produk</label>
            <select name="id_produk" class="form-control" id="id_produk">
                <option value="">-- pilih --</option>
                @foreach($produk as $data)
                <option value="{{ $data->id_produk }}">{{ $data->nama_produk }}</option>
                @endforeach
            </select>
        </div> --}}

        <input type="hidden" class="form-control" id="kode_order" name="kode_order" value="{{ $kode_order = date('h-i-s-') . mt_rand(100, 999); }}">
        
        <div class="form-group">
            <label for="nama_customer">Nama Customer</label>
            <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ old('nama_customer') }}">
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak') }}">
        </div>

        <div class="form-group">
            <label for="id_produk">Pilih Produk</label>
            <select name="id_produk" class="form-control" id="id_produk">
                <option value="">-- pilih --</option>
                @foreach($produk as $data)
                    <option value="{{ $data->id_produk }}">{{ $data->nama_produk }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="value">PCS</label>
            <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}">
        </div>

        <div class="form-group">
            <label for="tanggal_order">Tanggal Order</label>
            <input type="date" class="form-control" id="tanggal_order" name="tanggal_order" value="{{ old('tanggal_order') }}">
        </div>

        <input type="hidden" class="form-control" id="total_harga" name="total_harga" value="{{ 0 }}">
        
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
</form>
    </tbody>
    </table>
<!-- </div> -->
@endsection     