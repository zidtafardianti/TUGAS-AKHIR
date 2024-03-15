@extends('pegawai.layouts.base')
@section('title', 'EditDataBarangMasuk')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Edit Data Barang Masuk</h2>
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
                                        <h3>Data Barang Masuk</h3>
                                    </div>
                                    <!--crud data-->
                                    <form method="POST"
                                        action="{{ route('pegawai.updateBarangKeluar', $barangkeluar->id) }}">
                                        @method('PUT')
                                        @csrf
                                        {{-- <div class="form-row">
                                                <div class="col-md-8">
                                                    <label for="barang_masuk_id">Id Barang</label>
                                                    <select name="barang_masuk_id" id="barang_masuk_id">
                                                        <option selected></option>
                                                        @foreach ($barangmasuk as $barangmasuk)
                                                        <option value="{{$barangmasuk -> id}}">{{$barangmasuk->Nama_Barang . " - " . $barangmasuk->Kode_Barang}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('barang_masuk_id')
                                                    <div class="alert alert-warning">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Jumlah">Jumlah</label>
                                                <input type="text" class="form-control" name="Jumlah" id="Jumlah"
                                                    value="{{ $barangkeluar->Jumlah }}"></input>
                                                @error('Jumlah')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Satuan" class="form-label">Satuan</label>
                                                <select name="Satuan" id="Satuan" class="form-Control"
                                                    value="{{ $barangkeluar->Satuan }}">
                                                    <option value="Kg"
                                                        {{ $barangkeluar->Satuan == 'Kg' ? 'selected' : '' }}>Kg</option>
                                                    <option value="Pack"
                                                        {{ $barangkeluar->Satuan == 'Pack' ? 'selected' : '' }}>Pack
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Tanggal_Keluar">Tanggal Keluar</label>
                                                <input type="date" class="form-control datetimepicker-input"
                                                    name="Tanggal_Keluar" id="Tanggal_Keluar"
                                                    value="{{ $barangkeluar->Tanggal_Masuk }}">
                                                @error('Tanggal_Keluar')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="field margin_0">
                                            <label class="label_field hidden">hidden label</label>
                                            <button type="submit" class="main_bt">Simpan</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- profile contant section -->
                        <!-- end user profile section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
