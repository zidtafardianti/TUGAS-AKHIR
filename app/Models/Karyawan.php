<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'Nama',
        'NIK',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Agama',
        'Jenis_Kelamin',
        'Alamat',
        'No_HP',
        'role',
        'Foto',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_users');
    }

    public function getFotoProfilAttribute()
    {
        return ($this->Foto) ? url('/') . "/storage/Foto/{$this->Foto}" : null;
    }
}