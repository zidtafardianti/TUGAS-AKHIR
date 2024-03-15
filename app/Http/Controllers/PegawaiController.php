<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use PhpParser\Node\Expr\FuncCall;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use PDF;


class PegawaiController extends Controller
{
    public function index()
    {
        $totalStockBarangMasuk = BarangMasuk::sum('Stock_Barang');
        $totalStockBarangKeluar = BarangKeluar::sum('jumlah');

        $barangMasukHabis = BarangMasuk::where('Stock_Barang', '<=', 10)->get();

        return view('pegawai.index', compact('totalStockBarangMasuk', 'totalStockBarangKeluar', 'barangMasukHabis'));
    }


    //tabel barang masuk
    public function tabelBarangMasuk()
    {
        $barangmasuk = BarangMasuk::all();

        return view('pegawai.barang_masuk')->with('barangmasuk', $barangmasuk);;
    }

    //tabel barang keluar
    public function tabelBarangKeluar()
    {
        $barangkeluar = BarangKeluar::all();

        return view('pegawai.barang_keluar')->with('barangkeluar', $barangkeluar);;
    }


    //tambah barang masuk
    public function tambahBarangMasuk()
    {
        return view('pegawai.tambah_barangmasuk');
    }

    public function storeBarangMasuk(Request $request)
    {
        $validateData = $request->validate([
            'Nama_Barang' => 'required',
            'Kode_Barang' => 'required',
            'Merk' => 'required',
            'Satuan' => 'required',
            'Jumlah' => 'required',
            'Tanggal_Masuk' => 'required',
            'Stock_Barang' => 'required',
        ]);

        $barangmasuk = BarangMasuk::where('kode_barang', $request->Kode_Barang)->first();
        if ($barangmasuk) {
            $barangmasuk->update([
                'Jumlah' => $request->Jumlah,
                'Stock_Barang' => $request->Stock_Barang,
                'Tanggal_Masuk' => $request->Tanggal_Masuk,
            ]);
        } else {
            BarangMasuk::create($validateData);
        }

        Alert::success('Success', 'Data Barang Masuk Berhasil Ditambahkan');
        return redirect()->route('pegawai.tabelBarangMasuk');
    }

    //tambah barang keluar
    public function tambahBarangKeluar()
    {
        $barangmasuk = BarangMasuk::all();
        return view('pegawai.tambah_barangkeluar', ['barangmasuk' => $barangmasuk]);
    }

    // public function storeBarangKeluar(Request $request){
    //     $validateData = $request->validate([
    //         'barang_masuk_id'=>'required',
    //         'Satuan'=>'required',
    //         'Jumlah'=>'required',
    //         'Tanggal_Keluar'=>'required',
    //     ]);
    //     BarangKeluar::create($validateData);
    //     return redirect()->route('pegawai.tabelBarangKeluar');
    // }

    public function storeBarangKeluar(Request $request)
    {
        $validateData = $request->validate([
            'barang_masuk_id' => 'required',
            'Satuan' => 'required',
            'Jumlah' => 'required',
            'Tanggal_Keluar' => 'required',
        ]);

        // cek stock
        $barangmasuk = BarangMasuk::find($request->barang_masuk_id);
        $stokSekarang = $barangmasuk->Stock_Barang;
        $jumlahKeluar = $request->Jumlah;
        if ($stokSekarang < $jumlahKeluar) {
            Alert::error('Error', 'Stock Tidak mencukupi');

            return redirect()->back();
        }

        // Membuat data barang keluar
        BarangKeluar::create($validateData);

        // Mengurangkan stok barang masuk
        $barangmasuk->update(['Stock_Barang' => $stokSekarang - $jumlahKeluar]);

        Alert::success('Success', 'Data Barang Keluar Berhasil Ditambahkan');

        return redirect()->route('pegawai.tabelBarangKeluar');
    }


    //edit barang masuk
    public function editBarangMasuk($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        return view('pegawai.edit_barangmasuk', ['barangmasuk' => $barangmasuk]);
    }

    public function updateBarangMasuk(Request $request, $id)
    {
        $validateData = $request->validate([
            // 'barang_masuk_id'=>'required',
            'Nama_Barang' => 'required',
            'Kode_Barang' => 'required',
            'Merk' => 'required',
            'Satuan' => 'required',
            'Jumlah' => 'required',
            'Tanggal_Masuk' => 'required',
            'Stock_Barang' => 'required',
        ]);

        $barangmasuk = BarangMasuk::find($id);


        $barangmasuk->update($validateData);
        Alert::success('Success', 'Data Barang Masuk Berhasil Diedit');
        return redirect()->route('pegawai.tabelBarangMasuk');
    }

    //edit barang keluar
    public function editBarangKeluar($id)
    {
        $barangkeluar = BarangKeluar::find($id);
        return view('pegawai.edit_barangkeluar', ['barangkeluar' => $barangkeluar]);
    }

    public function updateBarangKeluar(Request $request, $id)
    {
        $validateData = $request->validate([
            // 'barang_masuk_id'=>'required',
            'Satuan' => 'required',
            'Jumlah' => 'required',
            'Tanggal_Keluar' => 'required',
        ]);

        $barangkeluar = BarangKeluar::find($id);

        $barangkeluar->update($validateData);

        Alert::success('Success', 'Data Barang Keluar Berhasil Diedit');
        return redirect()->route('pegawai.tabelBarangKeluar');
    }

    //logout
    public function logoutpegawai()
    {

        return view('login');
    }


    //untuk menampilkan detail profile
    public function showprofile()
    {
        $user = Auth::id();
        $profil = Karyawan::where('id_users', $user)->get()->first();
        return view('pegawai.detailpegawai', ['profil' => $profil]);
    }

    //edit profil pegawai
    public function editpegawai($id)
    {
        $profil = Karyawan::find($id);
        return view('pegawai.editpegawai', ['pegawai' => $profil]);
    }

    public function updatepegawai(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'NIK' => 'required',
            'Tempat_Lahir' => 'required',
            'Tanggal_Lahir' => 'required',
            'Agama' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required',
            'No_HP' => 'required',
            'role' => 'required',
            //'Foto'=>'required',

        ]);

        if ($request->Foto) {
            $request->validate([
                'Foto' => 'mimes::jpeg,jpg,png,gif',
            ]);
        }

        $profil = Karyawan::find($id);
        $profil->Nama = $request->Nama;
        $profil->NIK = $request->NIK;
        $profil->Tempat_Lahir = $request->Tempat_Lahir;
        $profil->Tanggal_Lahir = $request->Tanggal_Lahir;
        $profil->Agama = $request->Agama;
        $profil->Jenis_Kelamin = $request->Jenis_Kelamin;
        $profil->Alamat = $request->Alamat;
        $profil->No_HP = $request->No_HP;
        $profil->role = $request->role;

        if ($request->Foto) {
            Storage::delete('public/storage/Foto/' . $profil->Foto);

            $newFoto = $request->Foto;
            $newFotoExtension = $newFoto->extension();
            $originalNewFoto = Str::random(10) . '-' . time() . '.' . $newFotoExtension;
            $newFoto->storeAs('public/Foto', $originalNewFoto);

            $profil->Foto = $originalNewFoto;
        }

        $profil->save();
        $profil = Karyawan::find($id);

        Alert::success('Success', 'My Profile Diedit');
        return redirect()->route('pegawai.dashboard');
    }


    public function hapus_dataMasuk($id)
    {
        // Temukan data barang masuk berdasarkan ID
        $barangmasuk = BarangMasuk::find($id);

        // // Periksa apakah data barang masuk ditemukan
        // if (!$barangMasuk) {
        //     return redirect()->route('nama_rute_yang_anda_inginkan')->with('error', 'Data barang masuk tidak ditemukan.');
        // }

        // Hapus data barang masuk
        $barangmasuk->delete();

        // Redirect dengan pesan sukses
        Alert::success('Success', 'Data Barang Masuk Berhasil Dihapus');
        return redirect()->route('pegawai.tabelBarangMasuk');
    }

    public function cekStock($kode_barang)
    {
        $barangmasuk = BarangMasuk::where('kode_barang', $kode_barang)->first();
        if ($barangmasuk) {
            return response()->json([
                'Nama_Barang' => $barangmasuk->Nama_Barang,
                'Kode_Barang' => $barangmasuk->Kode_Barang,
                'Merk' => $barangmasuk->Merk,
                'Satuan' => $barangmasuk->Satuan,
                'Stock_Barang' => $barangmasuk->Stock_Barang,
            ]);
        } else {
            return response()->json(
                [
                    'Nama_Barang' => '',
                    'Kode_Barang' => $kode_barang,
                    'Merk' => '',
                    'Satuan' => '',
                    'Stock_Barang' => 0,
                ]
            );
        }
    }

    public function autocomplete($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        return response()->json([
            'Satuan' => $barangmasuk->Satuan,
        ]);
    }
}
