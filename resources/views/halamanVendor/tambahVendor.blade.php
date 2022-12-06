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
<form method="post" action="/vendor">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">
        <div class="form-group">
            <label for="nama_vendor" class="col-xs-2 col-form-label">Nama Vendor</label>
            <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="{{ old('nama_vendor') }}">
        </div>

        <div class="form-group">
            <label for="jenis_vendor">Jenis Vendor</label>
            <select name="jenis_vendor" class="form-control" id="jenis_vendor">
                <option value="">-- pilih --</option>
                    <option value="individual">individual</option>
                    <option value="perusahaan">Perusahaan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <textarea type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak') }}"></textarea>
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