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
<form method="post" action="/bahan/{{$bahan->id}}">
    @method('PATCH')
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">

       <div class="form-group">
           <input type="hidden" class="form-control" id="id" name="id" value="{{ $bahan->id }}">
       </div>
        <div class="form-group">
            <label for="id_produk">Pilih Produk</label>
            <select name="id_produk" class="form-control" id="id_produk">
                <option value="{{$bahan->produks['id_produk']}}">{{$bahan->produks['nama_produk']}}</option>
                    @foreach($produk as $data)
                        <option value="{{$data->id_produk}}">{{ $data->nama_produk }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama_bahan">Nama Bahan</label>
            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" value="{{ $bahan->nama_bahan }}">
        </div>

        <div class="form-group">
            <label for="value">value</label>
            <input type="text" class="form-control" id="value" name="value" value="{{ $bahan->value }}">
        </div>

        <div class="form-group">
            <label for="satuan">satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $bahan->satuan }}">
        </div>

        <div class="form-group">
            <label for="vendor">vendor</label>
            <input type="text" class="form-control" id="vendor" name="vendor" value="{{ $bahan->vendor }}">
        </div>
        <input type="hidden" class="form-control" id="bahan_lama" name="bahan_lama" value="{{ $bahan->nama_bahan }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
</form>
    </tbody>
    </table>
<!-- </div> -->
@endsection     