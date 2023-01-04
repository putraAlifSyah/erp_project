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
                         <i>Data Periode</i>
                        </ol>
                    </div>
                </div>
            </div>
             
</div>
@endsection

@section('konten')
<div class="container">
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <form action="customerinvoice/filter">
            @if ($filter == false)
                <label for="dari" style="margin-right: 15px"><b>From</b></label><input type="date" name="dari" id="dari">
                <label for="sampai" style="margin-right: 15px; margin-left: 15px"><b>To</b></label><input type="date" name="sampai" id="sampai">
                <button class="btn btn-primary">Submit</button>
            @else
                <label for="dari" style="margin-right: 15px"><b>From</b></label><input type="date" name="dari" id="dari" value="{{ $tanggalAwal }}">
                <label for="sampai" style="margin-right: 15px; margin-left: 15px"><b>To</b></label><input type="date" name="sampai" id="sampai" value="{{ $tanggalAkhir }}">
                {{-- <button class="btn btn-primary">Submit</button>     --}}
                <a href='/customerinvoice' class="btn btn-warning">Back</a>
            @endif
        </form>
    </div>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Order</th>
            <th>Nama</th>
            <th>Produk`</th>
            <th>QTY</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->kode_order}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->produk}}</td>
            <td>{{$data->value}}</td>
            <td>{{$data->harga}}</td>
            <td>{{$data->tanggal}}</td>
            <td>{{$data->status}}</td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    </div>
    </div>
    </div>
<!-- </div> -->
@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
@endsection