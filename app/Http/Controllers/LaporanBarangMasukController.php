<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBarangMasukController extends Controller
{
    public function laporan_barangmasuk(){
        return view('admin.laporan_barangmasuk');
    }
}
