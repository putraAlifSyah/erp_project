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
        <a href="/rfq/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div>
    <table class="table table-striped" id="myTable">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Vendor</th>
            <th>Tanggal Order</th>
            <th>Nama Bahan</th>
            <th>Quantity</th>
            <th>Harga Satuan</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $data)
        <tr class="text=center" rowspan="3">
            <td>{{$loop->iteration}}</td>
            <td class="vendor">{{$data->Panggilvendor['nama_vendor'] }}</td>
            <td>{{$data->tanggal_order}}</td>
            <td>{{$data->Panggil_nama_bahan['nama_bahan']}}</td>
            <td>{{$data->quantity}}</td>
            <td>Rp. {{$data->Panggil_harga_satuan['harga']}}/{{ $data->Panggil_harga_satuan['value']}} {{ $data->Panggil_harga_satuan['satuan'] }}</td>
            @php
                $totalKeseluruhan += $data->harga_total
            @endphp
            <input type="hidden" value="{{ $totalKeseluruhan }}">
            <td>Rp. {{$data->harga_total}}</td>
            <td>{{$data->status}}</td>
            <td>
                <div class="card-body">
                    <a href="bahan/{{$data->id}}/edit" class="btn-sm btn-primary rounded tombol">Ubah</a>
                    {{-- <a href="rfq/confirm/{{$data->id_rfq}}" class="btn-sm btn-warning rounded tombol">Confirm</a> --}}
                    <form action="/bahan/{{$data->id}}" method="post" class="ini">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-xs btn-danger rounded" onclick="return confirm('Are you sure?')" style="font-size:13.5px">Hapus</buton>          
                        </form> 
                        <div class="clear"></div>
                </div>
            </td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    <div class="input-group mb-3">
        <form action="/rfq/filter" style="display: flex" method="get"> 
        {{-- @csrf --}}
        <select name="filter" class="form-control mb-1 mr-2" id="filter" style="display: inline">
            <option value="">Pilih Vendor</option>
                @foreach ($dataVendor as $item)
                    <option value="{{ $item->id_vendor }}">{{ $item->nama_vendor }}</option>
                @endforeach
        </select>
        <button class="btn-sm btn-outline-secondary rounded mt-0.5" type="submit" id="button-addon2" style="height: 35px">Submit</button>
        </form>
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