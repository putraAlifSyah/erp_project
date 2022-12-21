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
<form method="post" action="/produk">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">
        <div class="form-group">
            <label for="kode_produk" class="col-xs-2 col-form-label">Kode Produk</label>
            <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ old('kode_produk') }}">
        </div>

        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}">
        </div>

        <div class="form-group">
            <label for="harga">Harga 1 pcs</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
        </div>

        <div class="form-group">
            <label for="keterangan_produk">Keterangan Produk</label>
            <textarea type="text" class="form-control" id="keterangan_produk" name="keterangan_produk" value="{{ old('keterangan_produk') }}"></textarea>
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
</form>
    </tbody>
    </table>
<!-- </div> -->
@endsection     