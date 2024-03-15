@extends('pegawai.layouts.base')
@section('title', 'TambahDataBarangKeluar')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Tambah Data Barang Keluar</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{ $error }}</h1>
        @endforeach
    @endif

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
                                        <h3>Data Barang Keluar</h3>
                                    </div>
                                    <!--crud data-->
                                    <form method="POST" action="{{ route('pegawai.storeBarangKeluar') }}">
                                        @csrf
                                        <!-- <div class="form-row">
                                                                                                                    <div class="col-md-8">
                                                                                                                        <label for="id">Id Keluar</label>
                                                                                                                        <input type="text" class="form-control" name="id" id="id" value="{{ old('id') }}">
                                                                                                                        @error('id')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
                                                                                                                    </div>
                                                                                                                </div> -->
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="barang_masuk_id">Id Barang</label>
                                                <select name="barang_masuk_id" id="barang_masuk_id" class="form-control">
                                                    <option selected disabled></option>
                                                    @foreach ($barangmasuk as $barangmasuk)
                                                        <option value="{{ $barangmasuk->id }}">
                                                            {{ $barangmasuk->Nama_Barang . ' - ' . $barangmasuk->Kode_Barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('barang_masuk_id')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Jumlah">Jumlah</label>
                                                <input type="text" class="form-control" name="Jumlah" id="Jumlah"
                                                    value="{{ old('Jumlah') }}"></input>
                                                @error('Jumlah')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Satuan_Display" class="form-label">Satuan</label>
                                                <select id="Satuan_Display" class="form-control" value="{{ old('Satuan') }}"
                                                    disabled>
                                                    <option value="Kg" {{ old('Satuan') == 'Kg' ? 'selected' : '' }}>Kg
                                                    </option>
                                                    <option value="Pack" {{ old('Satuan') == 'Pack' ? 'selected' : '' }}>
                                                        Pack</option>
                                                </select>
                                                <input type="hidden" name="Satuan" id="Satuan"
                                                    value="{{ old('Satuan') }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Tanggal_Keluar">Tanggal Keluar</label>
                                                <input type="date" class="form-control datetimepicker-input"
                                                    name="Tanggal_Keluar" id="Tanggal_Keluar"
                                                    value="{{ old('Tanggal_Keluar') }}">
                                                @error('Tanggal_Keluar')
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

@section('js')
    <script>
        document.getElementById('barang_masuk_id').addEventListener('change', function() {
            let barang_masuk_id = this.value;

            let xhr = new XMLHttpRequest();
            xhr.open('GET', '/pegawai/autocomplete/' + barang_masuk_id, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    let res = JSON.parse(xhr.responseText);
                    let selectElement = document.getElementById('Satuan_Display');

                    document.getElementById('Satuan').value = res.Satuan;

                    for (let i = 0; i < selectElement.options.length; i++) {
                        if (selectElement.options[i].value === res.Satuan) {
                            selectElement.options[i].selected = true;
                        } else {
                            selectElement.options[i].selected = false;
                        }
                    }
                }
            };

            xhr.send();
        });
    </script>
@endsection
