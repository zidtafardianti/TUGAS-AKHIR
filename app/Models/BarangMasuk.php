<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = [
            'Id_Barang',
            'Nama_Barang',
            'Kode_Barang',
            'Merk',
            'Satuan',
            'Jumlah',
            'Tanggal_Masuk',
            'Stock_Barang',
    ];
    protected $guarded = [];

    public function BarangKeluar(){
        return $this->hasOne(BarangKeluar::class);
    }
}
