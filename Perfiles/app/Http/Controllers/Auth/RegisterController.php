<?php

namespace App\Http\Controllers\Auth;

use App\Carrera;
use App\Estudiante;
use App\Permiso;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
            'nombres' => ['required','max:100|','regex:/^[\pL\s]+$/u'],
            'user_name' => ['required','unique:users,user_name','unique:estudiante,user_name','alpha_num'],
            'email' => ['required','unique:users,email','unique:estudiante,email','email'],
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'required|numeric|digits_between:7,8|unique:estudiante,telefono',
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
            $data['confirmation_code'] = str_random(10);
            $user =new User();
            $user->create([
                'name' => $data['nombres'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'confirmation_code' => $data['confirmation_code']
            ]);
            $data['password']=bcrypt($data['password']);
            $idcarrera=Carrera::query()->where('nombre_carrera',$data['carrera'])->value('id');
            $data['carrera']=$idcarrera;
            $estudiante=new Estudiante();
            $estudiante->create([
                'nombres' => $data['nombres'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'telefono' => $data['telefono'],
                'carrera_id'=> $data['carrera']
            ]);
            $permisos=[];
            $i=0;
            $role_id=Role::query()->where('nombre_rol','estudiante')->value('id');
            $iduser=User::query()->where('email',$data['email'])->value('id');
            $idEstudiante=Estudiante::query()->where('email',$data['email'])->value('id');
            $roles=Role::findOrFail($role_id);
            $aux=$roles->permisos()->pluck('name');
            foreach ($aux as $a) {
                $per=Permiso::query()->where('name',$a)->get()->first();
                $per=$per->id;
                $permisos=array_add($permisos,$i,$per);
                $i=$i+1;
            }
            $user->roles()->attach($role_id,['user_id'=>$iduser]);
            $user->estudiante()->attach($idEstudiante,['user_id'=>$iduser]);
            $user->permisosUser()->attach($permisos,['user_id'=>$iduser]);
            $data1=$data;
            Mail::send('emails.bienvenido', $data1, function($message) use ($data) {
                $message->to($data['email'], $data['nombres'])->subject('Por favor confirma tu correo');
            });
            return $user;
        });
    }
    public function verify($code){
        $user = User::where('confirmation_code', $code)->first();
        if (! $user){
            return redirect('/');
        }
        $user->confirmado = true;
        $user->confirmation_code = null;
        $user->save();
        return redirect('/');//->with('notification', 'Has confirmado correctamente tu correo!');
    }
}
