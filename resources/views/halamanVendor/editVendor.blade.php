
@extends('../layout/main')

@section('title','Home')

@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Ubah Data</h1>
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
<form method="post" action="/vendor/{{$vendor->id_vendor}}">
   @method('PATCH')
    @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">
    <div class="form-group">
        <label for="nama_vendor" class="col-xs-2 col-form-label">Nama Vendor</label>
        <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="{{ $vendor->nama_vendor }}">
    </div>

    <div class="form-group">
        <label for="jenis_vendor">Jenis Vendor</label>
        <select name="jenis_vendor" class="form-control" id="jenis_vendor">
            <option value="{{ $vendor->jenis_vendor }}">{{ $vendor->jenis_vendor }}</option>
                <option value="individual">individual</option>
                <option value="perusahaan">Perusahaan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $vendor->alamat }}">
    </div>

    <div class="form-group">
        <label for="kontak">Kontak</label>
        <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $vendor->kontak }}">
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