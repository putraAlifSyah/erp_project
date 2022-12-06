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
<form method="post" action="/bahan">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">

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
            <label for="nama_bahan">Nama Bahan</label>
            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" value="{{ old('nama_bahan') }}">
        </div>

        <div class="form-group">
            <label for="value">value</label>
            <textarea type="text" class="form-control" id="value" name="value" value="{{ old('value') }}"></textarea>
        </div>

        <div class="form-group">
            <label for="satuan">satuan</label>
            <textarea type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan') }}"></textarea>
        </div>

        <div class="form-group">
            <label for="vendor">vendor</label>
            <textarea type="text" class="form-control" id="vendor" name="vendor" value="{{ old('vendor') }}"></textarea>
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