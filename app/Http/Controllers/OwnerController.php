<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{
    public function index(){
        $totalStockBarangMasuk = BarangMasuk::sum('Stock_Barang');
    $totalStockBarangKeluar = BarangKeluar::sum('jumlah');

    $barangMasukHabis = BarangMasuk::where('Stock_Barang', '<=', 10)->get();
        return view('owner.index', compact('totalStockBarangMasuk', 'totalStockBarangKeluar', 'barangMasukHabis'));
    }

    public function tabelBarangMasuk(){
        $barangmasuk = BarangMasuk::all();
        return view('owner.laporan_barang_masuk')->with('barangmasuk', $barangmasuk);;
    }

    public function tabelBarangKeluar(){
        $barangkeluar = BarangKeluar::all();

        return view('owner.laporan_barang_keluar')->with('barangkeluar', $barangkeluar);;
    }

    public function cetakbm(){
        $barangmasuk = BarangMasuk::all();
        return view('owner.cetaklaporanbm')->with('barangmasuk', $barangmasuk);;
    }

    public function cetakbk(){
        $barangkeluar = BarangKeluar::all();
        return view('owner.cetaklaporanbk')->with('barangkeluar', $barangkeluar);;
    }

    //logout
    public function logoutowner()
    {
        
        return view('login');
    }


        //untuk menampilkan detail profile
        public function showprofile(){
            $user = Auth::id();
            $profil = Karyawan::where('id_users', $user)->get()->first();
            return view('owner.detailowner', ['profil' => $profil]);
        }
    
        //edit profil owner
        public function editowner($id){
            $profil = Karyawan::find($id);
            return view('owner.editowner', ['owner' => $profil]);
        }
    
        public function updateowner(Request $request, $id){
            $request->validate([
                'Nama'=>'required',
                'NIK'=>'required',
                'Tempat_Lahir'=>'required',
                'Tanggal_Lahir'=>'required',
                'Agama'=>'required',
                'Jenis_Kelamin'=>'required',
                'Alamat'=>'required',
                'No_HP'=>'required',
                'role'=>'required',
                //'Foto'=>'required',
                
            ]);
    
            if($request->Foto)
            {
                $request->validate([
                    'Foto'=>'mimes::jpeg,jpg,png,gif',
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
    
            if($request->Foto)
            {
             Storage::delete('public/storage/Foto/' . $profil->Foto);
     
             $newFoto = $request->Foto;
             $newFotoExtension = $newFoto->extension();
             $originalNewFoto = Str::random(10). '-'.time().'.'. $newFotoExtension;
             $newFoto->storeAs('public/Foto', $originalNewFoto);
     
             $profil->Foto = $originalNewFoto;
            }
    
            $profil->save();
            $profil = Karyawan::find($id);
            
            Alert::success('Success', 'My Profile Diedit');
            return redirect()->route('owner.dashboard');
        }
}
