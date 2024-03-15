<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    public function barang_masuk()
    {
        $barangmasuk = BarangMasuk::all();
        return view('admin.barang_masuk')->with('barangmasuk', $barangmasuk);;
    }

    
}
