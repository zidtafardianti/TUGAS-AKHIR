@extends('pegawai.layouts.base')
@section('title', 'TambahDataBarangMasuk')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Tambah Data Barang Masuk</h2>
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
                                    <form method="POST" action="{{ route('pegawai.storeBarangMasuk') }}">
                                        @csrf
                                        <!-- <div class="form-row">
                                                                                                                                                                                                                                                                                        <div class="col-md-8">
                                                                                                                                                                                                                                                                                            <label for="Id_Barang">Id Barang</label>
                                                                                                                                                                                                                                                                                            <input type="text" class="form-control" name="Id_Barang" id="Id_Barang" value="{{ old('Id_Barang') }}">
                                                                                                                                                                                                                                                                                            @error('Id_Barang')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div> -->
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Nama_Barang">Nama Barang</label>
                                                <input type="text" class="form-control" name="Nama_Barang"
                                                    id="Nama_Barang" value="{{ old('Nama_Barang') }}">
                                                @error('Nama_Barang')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Kode_Barang">Kode Barang</label>
                                                <input type="text" class="form-control" name="Kode_Barang"
                                                    id="Kode_Barang" value="{{ old('Kode_Barang') }}">
                                                @error('Kode_Barang')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Merk">Merk</label>
                                                <input type="text" class="form-control" name="Merk" id="Merk"
                                                    value="{{ old('Merk') }}">
                                                @error('Merk')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Satuan" class="form-label">Satuan</label>
                                                <select name="Satuan" id="Satuan" class="form-control"
                                                    value="{{ old('Satuan') }}">
                                                    <option value="Kg" {{ old('Satuan') == 'Kg' ? 'selected' : '' }}>Kg
                                                    </option>
                                                    <option value="Pack" {{ old('Satuan') == 'Pack' ? 'selected' : '' }}>
                                                        Pack</option>
                                                </select>
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
                                                <label for="Tanggal_Masuk">Tanggal Masuk</label>
                                                <input type="date" class="form-control datetimepicker-input"
                                                    name="Tanggal_Masuk" id="Tanggal_Masuk"
                                                    value="{{ old('Tanggal_Masuk') }}">
                                                @error('Tanggal_Masuk')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="Stock_Barang_Display">Stock Barang</label>
                                                <input type="text" class="form-control" id="Stock_Barang_Display"
                                                    value="{{ old('Stock_Barang') }}" disabled>
                                                <input type="hidden" id="stock_barang_awal_hidden">
                                                <input type="hidden" name="Stock_Barang" id="Stock_Barang"
                                                    value="{{ old('Stock_Barang') }}">
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

@section('js')
    <script>
        document.getElementById('Kode_Barang').addEventListener('change', function() {
            let kodeBarang = this.value;
            let kodeBarangValue = 0;
            if (kodeBarang != '') {
                kodeBarangValue = this.value;
            }
            let Stock_Barang_Display = document.getElementById('Stock_Barang_Display');
            let Stock_Barang = document.getElementById('Stock_Barang');
            let stock_barang_awal_hidden = document.getElementById('stock_barang_awal_hidden');
            let jumlah = document.getElementById('Jumlah');

            let xhr = new XMLHttpRequest();
            xhr.open('GET', '/pegawai/cekstock/' + kodeBarangValue, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    let res = JSON.parse(xhr.responseText);
                    document.getElementById('Nama_Barang').value = res.Nama_Barang;
                    document.getElementById('Kode_Barang').value = res.Kode_Barang;
                    document.getElementById('Merk').value = res.Merk;
                    let selectElement = document.getElementById('Satuan');

                    for (let i = 0; i < selectElement.options.length; i++) {
                        if (selectElement.options[i].value === res.Satuan) {
                            selectElement.options[i].selected = true;
                        } else {
                            selectElement.options[i].selected = false;
                        }
                    }

                    if (jumlah.value != '') {
                        Stock_Barang.value = parseInt(res.Stock_Barang) + parseInt(jumlah.value);
                        Stock_Barang_Display.value = parseInt(res.Stock_Barang) + parseInt(jumlah
                            .value);
                        stock_barang_awal_hidden.value = parseInt(res.Stock_Barang);
                    } else {
                        Stock_Barang.value = parseInt(res.Stock_Barang);
                        Stock_Barang_Display.value = parseInt(res.Stock_Barang);
                        stock_barang_awal_hidden.value = parseInt(res.Stock_Barang);
                    }
                }
            };

            xhr.send();
        });

        document.getElementById('Jumlah').addEventListener('input', function() {
            let JumlahValue = this.value;
            let StockBarangValue = document.getElementById('stock_barang_awal_hidden').value;
            let stockBarang = 0;
            let jumlah = 0;

            if (StockBarangValue != '') {
                stockBarang = StockBarangValue;
            }
            if (JumlahValue != '') {
                jumlah = JumlahValue;
            }

            document.getElementById('Stock_Barang_Display').value = parseInt(stockBarang) + parseInt(jumlah);
            document.getElementById('Stock_Barang').value = parseInt(stockBarang) + parseInt(jumlah);
        });
    </script>
@endsection
