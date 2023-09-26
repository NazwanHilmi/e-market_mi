<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required | numeric',
            'stok' => 'required',
        ];
    }

    public function message()
    {
        return [
            'kode_barang.required' => 'Data Belum Lengkap',
            'nama_barang.required' => 'Data Belum Lengkap',
            'satuan.required' => 'Data Belum Lengkap',
            'harga_jual.required' => 'Data Belum Lengkap',
            'stok.required' => 'Data Belum Lengkap',
        ];
    }
}
