<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $totalStockBarangMasuk = BarangMasuk::sum('Stock_Barang');
        $totalStockBarangKeluar = BarangKeluar::sum('jumlah');
        $barangMasukHabis = BarangMasuk::where('Stock_Barang', '<=', 10)->get();

    return view('admin.index', compact('totalStockBarangMasuk', 'totalStockBarangKeluar', 'barangMasukHabis'));
    }

    public function tambahowner()
    {
        return view('admin.tambah_akun');
    }

    public function tabelowner(){
        $owners = Karyawan::with('user')->get();
        return view('admin.tabelowner', compact('owners'));
    }

    

    public function storeowner(Request $request){
        $validateData = $request->validate([
            'username'=>'required',
            'password'=>'required',
            'Nama'=>'required',
            'NIK'=>'required',
            'Tempat_Lahir'=>'required',
            'Tanggal_Lahir'=>'required',
            'Agama'=>'required',
            'Jenis_Kelamin'=>'required',
            'Alamat'=>'required',
            'No_HP'=>'required',
            'role'=>'required',
            'Foto'=>'required|mimes::jpeg,jpg,png,gif',
        ]);


        $Foto = $request->Foto;

        $originalFoto = Str::random(10). $Foto->getClientOriginalName();

        $Foto->storeAs('public/Foto', $originalFoto);

        $user = $request->only(['username', 'password']);
        $iduser=User::create($user);
        $karyawan = $request->except(['username', 'password']);
        $karyawan['Foto'] = $originalFoto;
        $karyawan['id_users']=$iduser->id;
        Karyawan::create($karyawan);
        Alert::success('Success', 'Data Karyawan Berhasil Ditambahkan');

        return redirect()->route('admin.tabelowner');
    }
    //

    public function editowner($id){
        $owners = Karyawan::find($id);
        return view('admin.edit_akun', ['owners' => $owners]);
    }

    public function update(Request $request, $id){
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

        $owners = Karyawan::find($id);
        $owners->Nama = $request->Nama;
        $owners->NIK = $request->NIK;
        $owners->Tempat_Lahir = $request->Tempat_Lahir;
        $owners->Tanggal_Lahir = $request->Tanggal_Lahir;
        $owners->Agama = $request->Agama;
        $owners->Jenis_Kelamin = $request->Jenis_Kelamin;
        $owners->Alamat = $request->Alamat;
        $owners->No_HP = $request->No_HP;
        $owners->role = $request->role;

        if($request->Foto)
        {
         Storage::delete('public/storage/Foto/' . $owners->Foto);
 
         $newFoto = $request->Foto;
         $newFotoExtension = $newFoto->extension();
         $originalNewFoto = Str::random(10). '-'.time().'.'. $newFotoExtension;
         $newFoto->storeAs('public/Foto', $originalNewFoto);
 
         $owners->Foto = $originalNewFoto;
        }

        $owners->save();
        $owners = Karyawan::find($id);
        
        Alert::success('Success', 'Data Berhasil Diedit');
        return redirect()->route('admin.tabelowner');
    }

    public function hapus_data($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            // Handle jika data Karyawan tidak ditemukan
            return redirect()->route('admin.tabelowner')->with('error', 'Data Karyawan tidak ditemukan');
        }

        $user = User::find($karyawan->id_users);

        if (!$user) {
            // Handle jika data User tidak ditemukan
            return redirect()->route('admin.tabelowner')->with('error', 'Data User tidak ditemukan');
        }

        if (auth()->user()->id == $user->id) {
            Alert::error('Gagal', 'Tidak dapat menghapus akun yang digunakan');
            return redirect()->route('admin.tabelowner');
        }

        Storage::delete('public/storage/Foto/' . $karyawan->Foto);

        $karyawan->delete();
        $user->delete();

        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('admin.tabelowner');

    }

    public function cetakbm(){
        $barangmasuk = BarangMasuk::all();
        return view('admin.cetaklaporanbm')->with('barangmasuk', $barangmasuk);;
    }

    public function cetakbk(){
        $barangkeluar = BarangKeluar::all();
        return view('admin.cetaklaporanbk')->with('barangkeluar', $barangkeluar);;
    }


     //tabel barang masuk
     public function tabelBarangMasuk(){
        $barangmasuk = BarangMasuk::all();

        return view('admin.barang_masuk')->with('barangmasuk', $barangmasuk);;
    }

    //tabel barang keluar
    public function tabelBarangKeluar(){
        $barangkeluar = BarangKeluar::all();

        return view('admin.barang_keluar')->with('barangkeluar', $barangkeluar);;
    }

    //logout
    public function logoutadmin()
    {
        
        return view('login');
    }

    public function editakun($id){
        $user= User::find($id);
        //dd('$id');
        return view('admin.editakun', ['user' => $user]);
    }

    public function updateakun(Request $request, $id){
        $validateData = $request->validate([
            'username'=>'required',
            'password'=>'required',
            

        ]);
        $user = User::find($id);
    
        
        $user->update($validateData);
        Alert::success('Success', 'Akun Berhasil Diedit');
        //$request->session()->flash('pesan',"Penambahan data {$validateData['nama']} berhasil");
        //Alert::success('Success', 'Password Berhasil Diubah');
        return redirect()->route('admin.tabelowner');
    }


     //untuk menampilkan detail profile
     public function showprofile(){
        $user = Auth::id();
        $profil = Karyawan::where('id_users', $user)->get()->first();
        return view('admin.detailadmin', ['profil' => $profil]);
    }

    //edit profil admin
    public function editadmin($id){
        $profil = Karyawan::find($id);
        return view('admin.editadmin', ['admin' => $profil]);
    }

    public function updateadmin(Request $request, $id){
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
        return redirect()->route('admin.tabelowner');
    }




    
}
