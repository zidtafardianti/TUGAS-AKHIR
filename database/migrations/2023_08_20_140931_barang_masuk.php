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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();

            $table->string('Nama_Barang');
            $table->string('Kode_Barang');
            $table->string('Merk');
            $table->enum('Satuan', ['Kg', 'Pack']);
            $table->string('Jumlah');
            $table->date('Tanggal_Masuk');
            $table->string('Stock_Barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
