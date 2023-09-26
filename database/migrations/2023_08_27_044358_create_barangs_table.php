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
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 100);
            $table->string('satuan', 10);
            $table->double('harga_jual');
            $table->string('stok', 5);
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
