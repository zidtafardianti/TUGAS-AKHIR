@extends('admin.layouts.base')
   @section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="page_title">
            <h2>Daftar Barang Keluar</h2>
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
                  <a href="{{route('admin.cetaklaporanbk')}}">
                    <button class="btn btn-success" style="margin-bottom: 10px;">Print <i class="fa fa-print"></i></button>
                  </a>           
                     <table class="table" id="dataTable">
                          <thead class="thead-dark">
                              <tr>
                                <th>Id Keluar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <tH>Satuan</th>
                                <th>Tanggal Keluar</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($barangkeluar as $barangkeluar)
                            <tr>
                               <td>{{ $barangkeluar->id }}</td>
                               <td>{{ $barangkeluar->barangmasuk->Nama_Barang }}</td>
                               <td>{{ $barangkeluar->Jumlah }}</td>
                               <td>{{ $barangkeluar->Satuan }}</td>
                               <td>{{ $barangkeluar->Tanggal_Keluar }}</td>
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