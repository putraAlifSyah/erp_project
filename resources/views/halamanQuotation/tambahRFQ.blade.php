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
<form method="post" action="/rfq">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4" id="tempatNambah">    
        <div class="form-group">
            <label for="id_vendor">Pilih Vendor</label>
            <select name="id_vendor" class="form-control" id="id_vendor">
                <option value="">-- pilih --</option>
                @foreach($vendor as $data)
                    <option value="{{ $data->id_vendor }}">{{ $data->nama_vendor }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="value">Tanggal Order</label>
            <input type="date" class="form-control" id="value" name="tanggal_order" value="{{ old('value') }}">
        </div>

        <div class="form-group">
            <label for="satuan">Nama Bahan</label>
            <select name="id" class="form-control" id="bahanbahan">
                <option value="">-- pilih --</option>
                @foreach($bahan as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_bahan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
        </div>
        <div class="tempatNassmbah">

        </div>
        
        <input type="hidden" class="form-control" id="vendor" name="harga_total" value="{{ old('vendor') }}">
        <input type="hidden" class="form-control" id="vendor" name="id_bahan" value="{{ old('vendor') }}">
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
            ++i;
            $('#bahanbahan').clone().attr('name', `id${i}`).appendTo('.tempatNassmbah'); // append to where you want
            $(".tempatNassmbah")
            .append('<input type="text" name="addmore['+i+'][quantity]" placeholder="Enter your Name" class="form-control mb-4 mt-4"/>');
            disp.setAttribute("value", i);
        });

        $(document).on('click', '.remove-tr', function(){  
             $(this).parents('tempatNassmbah').remove();
        });  
       
    </script>
<!-- </div> -->
@endsection     