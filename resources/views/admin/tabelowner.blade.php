@extends('admin.layouts.base')
@section('title', 'TabelOwner')
@section('content')
<!--untuk kata dashboard-->
<div class="row">
    <div class="col-md-12">
       <div class="page_title">
          <h2>Data User</h2>
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
                <a type="submit" href="{{route('admin.tambahowner')}}" class="btn-tambah"> Tambah Data User </a>
                   <table class="table" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($owners as $owner)
                            <tr>
                                <td>{{ $owner->id }}</td>
                                <td>{{ $owner->user->username }}</td>
                                <td>{{ $owner->Nama }}</td>
                                <td>{{ $owner->NIK }}</td>
                                <td>{{ $owner->Alamat }}</td>
                                <td>
                                    <a href="{{route('admin.editowner', $owner->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.hapus_data', $owner->id)}}" class="delete-form">
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