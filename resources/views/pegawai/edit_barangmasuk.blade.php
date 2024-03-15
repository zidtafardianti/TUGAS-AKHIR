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
                                        action="{{ route('pegawai.updateBarangMasuk', $barangmasuk->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Nama_Barang">Nama Barang</label>
                                                <input type="text" class="form-control" name="Nama_Barang"
                                                    id="Nama_Barang" value="{{ $barangmasuk->Nama_Barang }}">
                                                @error('Nama_Barang')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Kode_Barang">Kode Barang</label>
                                                <input type="text" class="form-control" name="Kode_Barang"
                                                    id="Kode_Barang" value="{{ $barangmasuk->Kode_Barang }}">
                                                @error('Kode_Barang')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Merk">Merk</label>
                                                <input type="text" class="form-control" name="Merk" id="=Merk"
                                                    value="{{ $barangmasuk->Merk }}">
                                                @error('Merk')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Satuan" class="form-label">Satuan</label>
                                                <select name="Satuan" id="Satuan" class="form-control"
                                                    value="{{ $barangmasuk->Satuan }}">
                                                    <option value="Kg"
                                                        {{ $barangmasuk->Satuan == 'Kg' ? 'selected' : '' }}>Kg</option>
                                                    <option value="Pack"
                                                        {{ $barangmasuk->Satuan == 'Pack' ? 'selected' : '' }}>Pack</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Jumlah">Jumlah</label>
                                                <input type="text" class="form-control" name="Jumlah" id="Jumlah"
                                                    value="{{ $barangmasuk->Jumlah }}"></input>
                                                @error('Jumlah')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Tanggal_Masuk">Tanggal Masuk</label>
                                                <input type="date" class="form-control datetimepicker-input"
                                                    name="Tanggal_Masuk" id="Tanggal_Masuk"
                                                    value="{{ $barangmasuk->Tanggal_Masuk }}">
                                                @error('Tanggal_Masuk')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Stock_Barang">Stock Barang</label>
                                                <input type="text" class="form-control" name="Stock_Barang"
                                                    id="Stock_Barang" value="{{ $barangmasuk->Stock_Barang }}">
                                                @error('Stock_Barang')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="field margin_0">
                                            <label class="label_field hidden">hidden label</label>
                                            <button type="submit" class="main_bt mt-2">Simpan</button>
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
