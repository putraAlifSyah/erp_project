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
                         <i>Data bahan</i>
                        </ol>
                    </div>
                </div>
            </div>
             
</div>
@endsection

@section('konten')
{{-- <div class="container"> --}}
    @php
        $totalKeseluruhan=0;
    @endphp
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <strong>Data bahan</strong>
    </div>
    <div class="pull-right">
        <a href="/quotation/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div>
    <table class="table table-striped" id="myTable">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Produk</th>
            <th>Expired</th>
            <th>Batas Pembayaran</th>
            <th>QTY</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $data)
        <tr class="text=center" rowspan="3">
            <td>{{$loop->iteration}}</td>
            <td class="vendor">{{$data->PanggilCustomer['nama_customer'] }}</td>
            <td>{{$data->PanggilProduk['nama_produk']}}</td>
            <td>{{$data->expired}}</td>
            <td>{{$data->batas_pembayaran}}</td>
            <td>{{$data->qty}}</td>
            <td>{{$data->sub_total}}</td>
            <td>{{$data->status}}</td>
            <td>
                <div class="card-body">
                    @if ($data->status == 'Draft')
                        <a href="invoice/{{$data->kode_order}}/post" class="btn-sm btn-primary rounded tombol">Post</a>
                    @endif

                    @if ($data->status == 'Posted')
                        <a href="invoice/{{$data->kode_order}}/paid" class="btn-sm btn-success rounded tombol">Register Payment</a>
                    @endif
                    
                    @if ($data->status == 'Paid')
                        <a href="invoice/{{$data->kode_order}}/validate" class="btn-sm btn-warning rounded tombol">Validate</a>
                    @endif
                    {{-- <a href="rfq/confirm/{{$data->id_rfq}}" class="btn-sm btn-warning rounded tombol">Confirm</a> --}}
                </div>
            </td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    <div class="input-group mb-3">

    </div>
    </div>
    </div>
<!-- </div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
       var span = 1;
       var prevTD = "";
       var prevTDVal = "";
       $("#myTable tbody tr td:first-child").each(function() { //for each first td in every tr
          var $this = $(this);
          if ($this.text() == prevTDVal) { // check value of previous td text
             span++;
             if (prevTD != "") {
                prevTD.attr("rowspan", span); // add attribute to previous td
                $this.remove(); // remove current td
             }
          } else {
             prevTD     = $this; // store current td 
             prevTDVal  = $this.text();
             span       = 1;
          }
       });
    });
</script>

@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
@endsection