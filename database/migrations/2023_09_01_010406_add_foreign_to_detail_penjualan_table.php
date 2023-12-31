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
        Schema::table('detail_penjualan', function (Blueprint $table) {
            $table
            ->foreign('penjualan_id')
            ->references('id')
            ->on('penjualan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        
            $table
            ->foreign('barang_id')
            ->references('id')
            ->on('barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            //
        });
    }
};
