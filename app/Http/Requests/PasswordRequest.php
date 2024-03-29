<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'old' => 'required',
            'password'   => 'required|confirmed|min:6|max:18',
        ];
    }
    public function messages()
    {
        return [
            'old.required'  => 'El campo es requerido',
            'password.required'    => 'El campo es requerido',
            'password.confirmed'   => 'Los contraseñas no coinciden',
            'password.min'         => 'El mínimo permitido son 6 caracteres',
            'password.max'         => 'El máximo permitido son 18 caracteres',
        ];
    }
}
