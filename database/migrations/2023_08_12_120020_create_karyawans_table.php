<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users');
            $table->timestamps();
            $table->string('Nama');
            $table->string('NIK')->unique();
            $table->string('Tempat_Lahir');
            $table->date('Tanggal_Lahir');
            $table->enum('Agama', ['Islam', 'Katolik', 'Hindu', 'Budha', 'Protestan', 'Konghucu']);
            $table->enum('Jenis_Kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('Alamat');
            $table->string('No_HP');
            $table->string('Foto')->nullable();
            $table->enum('role', ['admin','owner','pegawai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
