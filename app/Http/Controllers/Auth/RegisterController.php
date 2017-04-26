<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Pengarang;
use App\Pembaca;
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
    protected $redirectTo = '/home';

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
            'no_matrik' => 'required|max:10|unique:users',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'no_matrik'     => $data['no_matrik'],
            'username'      => $data['username'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
            'userRole'      => $data['role'] == 'author' ? 'pengarang' : 'pembaca',
        ]);

        if ($data['role'] == 'author') {
            $user->pengarang()->create([
              'user_id' => $user->id,
              'nama' => null,
              'telefon' => null,
              'fakulti' => null,
              'persatuan' => null,
              'jawatan' => null,
              'gambar' => null,
            ]);

        } else {
            $user->pembaca()->create([
              'user_id' => $user->id,
              'nama' => null,
              'telefon' => null,
              'fakulti' => null,
              'jabatan' => null,
              'persatuan' => null,
              'gambar' => null,
            ]);
        }

       return $user;
    }
}
