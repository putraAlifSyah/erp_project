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
<form method="post" action="/bayar">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">

    <div class="form-group">
        <label for="Total_Pembayaran">Total Pembayaran</label>
        <input type="text" class="form-control" id="Total_Pembayaran" name="Total_Pembayaran" value="{{ $total }}">
    </div>

    <div class="form-group">
        <label for="cara_pembayaran">Pilih Pembayaran</label>
        <select name="cara_pembayaran" class="form-control" id="cara_pembayaran">
            <option value="">-- pilih --</option>
                <option value="Cash">Cash</option>
                <option value="Bank">Bank</option>
        </select>
    </div>

        <div class="form-group">
            <label for="bayar">Bayar</label>
            <input type="text" class="form-control" id="bayar" name="bayar" value="{{ old('bayar') }}">
        </div>

        <input type="hidden" value="{{ $kode_order }}" name='kode_order'>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
</form>
    </tbody>
    </table>
    @if (session('duplikat'))
    <div class="alert alert-danger">
        {{ session('duplikat') }}
    </div>
@endif  
<!-- </div> -->
@endsection     