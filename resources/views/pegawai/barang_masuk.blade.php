@extends('pegawai.layouts.base')
@section('title', 'TabelBarangMasuk')
@section('content')
<!--untuk kata dashboard-->
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
                <a href="{{route('pegawai.tambahBarangMasuk')}}">
                <button class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Barang Masuk</button>
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
                           <th scope="col">Edit</th>
                           <th scope="col">Hapus</th>
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
                            <td>
                                <a href="{{route('pegawai.editBarangMasuk', $barangmasuk->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('pegawai.hapus_dataMasuk', $barangmasuk->id)}}" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class=" btn-danger btn-sm" role="button">Hapus</button>
                                    </form>
                                </td>    
                            </tr>
                            @endforeach
                         </tbody>
                   </table>
                </div>
            </div>
        </div>
        
    
    </div>
    
</div>
 <!--untuk kata dashboard-->

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $('#dataTable').DataTable();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const deleteForm = this;

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            });
        });
    });
</script>
@endsection