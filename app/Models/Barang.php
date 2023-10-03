<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = 
    [
    'kode_barang', 
    'nama_barang', 
    'satuan', 
    'harga_jual', 
    'stok', 
    'produk_id',
    'user_id',
    
];
    
    public function produk()
    {
        return $this->belongsTo(Produk::class); //untuk menghubungkan tabel barang dengan tabel produk, karena sat
    }

}


