<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/buscar_plantas';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_completo'               => 'required|string|max:191',
            'email'                         => 'required|string|email|max:191|unique:users',
            'telefono'                      => 'required|max:10',
            'profesion'                     => 'required|string|max:191',
            'uso'                           => 'required|string|max:191',
            'nombre_empresa_institucion'    => 'required|string|max:191',
            'password'                      => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre_completo'               => $data['nombre_completo'],
            'email'                         => $data['email'],
            'telefono'                      => $data['telefono'],
            'profesion'                     => $data['profesion'],
            'uso'                           => $data['uso'],
            'nombre_empresa_institucion'    => $data['nombre_empresa_institucion'],
            'password'                      => bcrypt($data['password']),
        ]);
    }
}
