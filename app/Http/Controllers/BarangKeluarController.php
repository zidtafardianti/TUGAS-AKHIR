<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function barang_keluar()
    {
        $barangkeluar = BarangKeluar::all();
        return view('admin.barang_keluar')->with('barangkeluar', $barangkeluar);
    }

    public function tambah_barangkeluar()
    {
        return view('admin.tambah_barangkeluar');
    }

    public function storebarangkeluar(Request $request){
        $validateData = $request->validate([
            'barang_id'=>'required',
            'Satuan'=>'required',
            'Jumlah'=>'required',
            'Tanggal_Keluar'=>'required',
        ]);
        BarangKeluar::create($validateData);
        return redirect()->route('admin.barang_keluar');
    }
}
