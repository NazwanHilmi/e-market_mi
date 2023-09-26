<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemasokRequest extends FormRequest
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
            'nama_pemasok' => 'required',
            // 'harga' => 'required | numeric'
        ];
    }

    public function messages(){
        return [
            'nama_pemasok.required' => 'Data nama pemasok belum diisi!',
            // 'harga.required' => 'Data harga belum diisi!',
        ];
    }
}
