<?php

namespace App\Http\Controllers\Auth;

use App\Carrera;
use App\Estudiante;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
    protected $redirectTo = '/';

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
            'nombre' => 'required|max:255',
            'user_name' => ['required','unique:users,user_name','unique:estudiantes,user_name','alpha_num'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => '',
            'carrera'=> ['required','not_in:seleccione una opcion']
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
        DB::transaction(function () use($data) {
            $user =new User();
            $user->create([
                'name' => $data['nombre'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $data['password']=bcrypt($data['password']);
            $idcarrera=Carrera::query()->where('nombre_carrera',$data['carrera'])->value('id');
            $data['carrera']=$idcarrera;
            $estudiante=new Estudiante();
            $estudiante->create([
                'nombres' => $data['nombre'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'telefono' => $data['telefono'],
                'carrera_id'=> $data['carrera']
            ]);
            $role_id=Role::query()->where('nombre_rol','estudiante')->value('id');
            $iduser=User::query()->where('email',$data['email'])->value('id');
            $user->roles()->attach($role_id,['user_id'=>$iduser]);
            return $user;
        });
    }
}
