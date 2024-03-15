@extends('pegawai.layouts.base')
   @section('content')
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     @if($errors->any())
                        @foreach($errors as $error)
                           <h1>{{$error}}</h1>
                        @endforeach
                     @endif
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Daftar Barang Keluar</h2>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>

               <a href="{{route('pegawai.tambahBarangKeluar')}}">
                  <button class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Barang Keluar</button>
                  </a>
               <table class="table" id="dataTable">
                  <thead class="thead-dark">
                     <tr>
                        <th>Id Keluar</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <tH>Satuan</th>
                        <th>Tanggal Keluar</th>
                        <th>Edit</th>
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
                        <td>
                           <a href="{{route('pegawai.editBarangkeluar', $barangkeluar->id)}}" class="btn btn-primary btn-sm">Edit</a>
                       </td> 
                     </tr>
                     @endforeach
                  </tbody>
               </table>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $('#dataTable').DataTable();
</script>
@endsection