@extends('admin.layouts.base')
   @section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="page_title">
            <h2>Daftar Barang Masuk</h2>
         </div>
      </div>
      
      <div class="container-fluid">
          <div class="white_shd full">
              @if($errors->any())
                 @foreach($errors as $error)
                    <h1>{{$error}}</h1>
                 @endforeach
              @endif
              <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                  <a href="{{route('owner.cetaklaporanbm')}}">
                  <button class="btn btn-success" style="margin-bottom: 10px;">Print <i class="fa fa-print"></i></button>
                  </a>           
                     <table class="table" id="dataTable">
                          <thead class="thead-dark">
                              <tr>
                              <th scope="col">Id Barang</th>
                             <th scope="col">Nama Barang</th>
                             <th scope="col">Kode Barang</th>
                             <th scope="col">Merk</th>
                             <th scope="col">Satuan</th>
                             <th scope="col">Jumlah</th>
                             <th scope="col">Tanggal Masuk</th>
                             <th scope="col">Stock Barang</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($barangmasuk as $barangmasuk)
                              <tr>
                              <td>{{$barangmasuk->id}}</td>
                              <td>{{ $barangmasuk->Nama_Barang }}</td>
                              <td>{{ $barangmasuk->Kode_Barang }}</td>
                              <td>{{ $barangmasuk->Merk }}</td>
                              <td>{{ $barangmasuk->Satuan }}</td>
                              <td>{{ $barangmasuk->Jumlah }}</td>
                              <td>{{ $barangmasuk->Tanggal_Masuk }}</td>
                              <td>{{ $barangmasuk->Stock_Barang }}</td>   
                              </tr>
                              @endforeach
                           </tbody>
                     </table>
                  </div>
              </div>
          </div>

      </div>
      
  </div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $('#dataTable').DataTable();
</script>
@endsection