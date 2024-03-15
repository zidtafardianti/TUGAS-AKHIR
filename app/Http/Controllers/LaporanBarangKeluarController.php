<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBarangKeluarController extends Controller
{
    public function laporan_barangkeluar(){
        return view('admin.laporan_barangkeluar');
    }
}
