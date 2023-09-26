<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'kode_pelanggan' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required | numeric',
            'email' => 'required',
        ];
    }

    public function message()
    {
        return [
            'kode_pelanggan.required' => 'Data Belum Lengkap',
            'nama.required' => 'Data Belum Lengkap',
            'alamat.required' => 'Data Belum Lengkap',
            'no_telp.required' => 'Data Belum Lengkap',
            'email.required' => 'Data Belum Lengkap',
        ];
    }
}
