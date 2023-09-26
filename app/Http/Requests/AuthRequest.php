<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
    
    public function messagge(){
        return [
            'email.required' => 'Email Harus Diisi!',
            'password.required' => 'Password Harus Diisi!',
        ];
    }
}
