<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use DB;
class tutores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users=Tutor::all();
        return view('profesionales',compact('users'));
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar(){
		return view('profesionales.registrotutor');
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**public function crear(){
      *  $roles=Role::all()->pluck('nombre_rol');
       * return view('profesionales/crearUsuarios',compact('roles'));
    *}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /** public function guardar(Request $request)
    *{

     *   $this->validate(request(), [
      *      'name' => ['required'],
       *     'user_name' => ['required','unique:users,user_name'],
        *    'email' => ['required','email','unique:users,email'],
        *    'password' => ['required'],
         *   'role_id'=> ['required','not_in:seleccione una opcion']
        *]);
      
      *$rol_id=Role::query()->where('nombre_rol',$request['role_id'])->value('id_prof');
    *    $request['role_id']=$rol_id;
     *   $user=new User();
      *  $user->create($request->all());
      *  return redirect()->route('profesionales');
    *}
    */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}