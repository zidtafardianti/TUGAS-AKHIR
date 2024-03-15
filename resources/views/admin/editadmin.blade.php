@extends('admin.layouts.base')
@section('title', 'EditAdmin')
@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="page_title">
          <h2>Edit Data Admin</h2>
       </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <!-- user profile section --> 
                        <!-- profile image -->
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                                <div class="profile_contant">
                                        <div class="judul">
                                            <h3>Data Admin</h3>
                                        </div>
                                        <!--crud data-->
                                        <form method="POST" action="{{route('admin.updateadmin', $admin->id)}}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="Nama">Nama</label>
                                                    <input type="text" class="form-control" name="Nama" id="Nama" value="{{$admin->Nama}}">
                                                    @error('Nama')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="NIP">NIK</label>
                                                    <input type="text" class="form-control" name="NIK" id="NIK" value="{{$admin->NIK}}">
                                                    @error('NIK')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="Tempat_Lahir">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="Tempat_Lahir" id="=Tempat_Lahir" value="{{$admin->Tempat_Lahir}}">
                                                    @error('Tempat_Lahir')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="Tanggal_Lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control datetimepicker-input" name="Tanggal_Lahir" id="Tanggal_Lahir" value="{{$admin->Tanggal_Lahir}}">
                                                    @error('Tanggal_Lahir')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="Agama" class="form-label">Agama</label>
                                                    <select name="Agama" id="Agama" class="form-select" value="{{$admin->Agama}}">
                                                        <option value="Islam" {{$admin->Agama == 'Islam' ? 'selected':'' }}>Islam</option>
                                                        <option value="Protestan" {{$admin->Agama == 'Protestan' ? 'selected':'' }}>Kristen</option>
                                                        <option value="Katolik" {{$admin->Agama == 'Katolik' ? 'selected':'' }}>Katolik</option>
                                                        <option value="Hindu" {{$admin->Agama == 'Hindu' ? 'selected':'' }}>Hindu</option>
                                                        <option value="Budha" {{$admin->Agama == 'Budha' ? 'selected':'' }}>Buddha</option>
                                                        <option value="Konghucu" {{$admin->Agama == 'Konghucu' ? 'selected':'' }}>Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                <label for="Jenis_Kelamin">Jenis Kelamin</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="Jenis_Kelamin" id="laki_laki" class="" value="Laki-Laki" {{ $admin->Jenis_Kelamin == 'Laki-Laki' ? 'checked' : ''}}>
                                                    <label for="laki_laki" class="mt-1">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="Jenis_Kelamin" id="perempuan" class="" value="Perempuan" {{ $admin->Jenis_Kelamin == 'Perempuan' ? 'checked' : ''}}>
                                                    <label for="perempuan" class="mt-1">Perempuan</label>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="Alamat">Alamat</label>
                                                    <input type="text" class="form-control" name="Alamat" id="Alamat" value="{{$admin->Alamat}}"></input>
                                                    @error('Alamat')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="No_HP">No HP</label>
                                                    <input type="text" class="form-control" name="No_HP" id="No_HP" value="{{$admin->No_HP}}">
                                                    @error('No_HP')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                           
                                            
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="username">Foto Profil</label>
                                                    <input type="file" class="form-control" name="Foto" id="Foto" value="{{$admin->Foto}}">
                                                    @if($admin->Foto)
                                                    <img src="{{ asset('storage/Foto/' . $admin->Foto) }}" alt="Foto Profil" width="100">
                                                    @endif
                                                    @error('Foto')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="role" class="form-label">role</label>
                                                    <select name="role" id="role" class="form-select" value="{{$admin->role}}">
                                                        <option value="admin" {{$admin->role == 'admin' ? 'selected':'' }}>Admin</option>
                                                        <option value="owner" {{$admin->role == 'owner' ? 'selected':'' }}>Owner</option>
                                                        <option value="pegawai" {{$admin->role  == 'pegawai' ? 'selected':'' }}>Pegawai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field margin_0">
                                                <label class="label_field hidden">hidden label</label>
                                                <button type="submit" class="main_bt" href="{{ route('admin.dashboard')}}">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
</div>
    


@endsection