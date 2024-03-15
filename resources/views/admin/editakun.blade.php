@extends('admin.layouts.base')
@section('title', 'EditStaf')
@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="page_title">
          <h2>Edit Akun Karyawan</h2>
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
                                    <h3>Data Karyawan</h3>
                                </div>
                                <!--crud data-->
                                <form method="POST" action="{{ route('admin.updateakun', $user->id) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="user" value="{{ $user->username }}">
                                            @error('username')
                                            <div class="alert alert-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <label for="NIP">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" value="{{ $user->password }}">
                                            @error('password')
                                            <div class="alert alert-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="field margin_0">
                                        <label class="label_field hidden">hidden label</label>
                                        <button type="submit" class="main_bt" data-bs-toggle="modal" data-bs-target="#modalKonfirmasi">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- profile contant section -->
                    <!-- end user profile section -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<!-- <div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="modalKonfirmasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKonfirmasiLabel">Konfirmasi Simpan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyimpan perubahan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="formEditAkun">Simpan</button>
            </div>
        </div>
    </div> -->
</div>

@endsection
