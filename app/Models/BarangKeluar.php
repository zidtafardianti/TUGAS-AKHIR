<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = [
            'barang_masuk_id',
            'Satuan',
            'Jumlah',
            'Tanggal_Keluar',
    ];
    protected $guarded = [];

    public function BarangMasuk(){
        return $this->belongsTo(BarangMasuk::class, 'barang_masuk_id');
    }
}
