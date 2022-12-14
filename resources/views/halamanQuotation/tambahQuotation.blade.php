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
<form method="post" action="/quotation">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4" id="tempatNambah">    

        <div class="form-group">
            <label for="kode_order">Kode Order</label>
            <input type="text" class="form-control" id="kode_order" name="kode_order" value="{{ old('kode_order') }}">
        </div>

        <div class="form-group">
            <label for="id_customer">Pilih Customer</label>
            <select name="id_customer" class="form-control" id="id_customer">
                <option value="">-- pilih --</option>
                @foreach($customer as $data)
                    <option value="{{ $data->id_customer }}">{{ $data->nama_customer }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="expired">Expired</label>
            <input type="date" class="form-control" id="expired" name="expired" value="{{ old('expired') }}">
        </div>
        
        <div class="form-group">
            <label for="batas_pembayaran">Waktu Pembayaran</label>
            <input type="date" class="form-control" id="batas_pembayaran" name="batas_pembayaran" value="{{ old('batas_pembayaran') }}">
        </div>

        <div class="form-group">
            <label for="id_produk">Nama Produk</label>
            <select name="id_produk" class="form-control" id="id_produk">
                <option value="">-- pilih --</option>
                @foreach($produk as $data)
                    <option value="{{ $data->id_produk }}">{{ $data->nama_produk }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="text" class="form-control" id="qty" name="qty" value="{{ old('qty') }}">
        </div>
        <div class="tempatNassmbah">

        </div>
        
        <input type="hidden" class="form-control" id="vendor" name="harga_total" value="{{ old('vendor') }}">
        <input type="hidden" class="form-control" id="vendor" name="id_bahan" value="{{ old('vendor') }}">
        <input type="hidden" class="form-control" id="jumlahTambah" name="jumlahTambah2" value="">
        <td><a type="button" name="add" id="add" class="btn btn-success">Add More</a></td>  
  
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
    <script type="text/javascript">
        var i = 0;
        var btn = document.getElementById("add");
        var disp = document.getElementById("bahantambahan");
        
        $("#add").click(function(){
            i++;
            $('#jumlahTambah').attr('value', i);
            $('#id_produk').clone().attr('name', `id${i}`).appendTo('.tempatNassmbah'); // append to where you want
            $(".tempatNassmbah").append('<input type="text" name="quantity'+i+'" class="form-control mb-4 mt-4"/>');
        });

        $(document).on('click', '.remove-tr', function(){  
             $(this).parents('tempatNassmbah').remove();
        });  
       
    </script>
<!-- </div> -->
@endsection     