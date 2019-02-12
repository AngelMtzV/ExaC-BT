<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Validator;
use Response;
use App\User;
use App\Tipousuario;
use App\Examen;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        //dd("estas en la vista de usuarios!!");
        return view('administrador.usuarios.indexUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposDusuarios = Tipousuario::get();
        return view('auth.register',compact('tiposDusuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'edad' => ['required', 'string', 'max:255'],
            'domicilio' => ['required', 'string', 'max:255'],
            'opcionTipoUsuario' => ['required', 'string', 'max:255'],
        ]);
        
        //se crea una nueva asignatura
        $user =  new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make('password');
        $user->edad = $request->get('edad');
        $user->domicilio = $request->get('domicilio');
        $user->id_tipoUsuario = $request->get('opcionTipoUsuario');
        //Se guardan los datos
        //dd($user);
        $user->save();
        Session::flash('message','Usuario agregado correctamente');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('administrador.usuarios.showUser',compact('user')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $tiposDusuarios = Tipousuario::get();
        return view('administrador.usuarios.editUser',compact('user','tiposDusuarios'));
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
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'edad' => ['required'],
            'domicilio' => ['required', 'string', 'max:255'],
            'opcionTipoUsuario' => ['required'],
        ]);

         //Obtebemos los valores del formulario
        $nom = $request->input('name');
        $edad = $request->input('edad');
        $domicilio = $request->input('domicilio');
        $email = $request->input('email');
        $password = $request->input('password');
        $tipoUser = $request->get('opcionTipoUsuario');

        //se busca el usuario mediante el id
        $user = User::find($id);
        //pasamos los valores a las columnas de la base de datos
        $user->name = $nom;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->edad = $edad;
        $user->domicilio = $domicilio;
        $user->id_tipoUsuario = $tipoUser;
        //Se guardan los datos
        $user->save();
        Session::flash('message','Usuario actualizado correctamente.');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('message','Usuario eliminado.');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('users.index');
    }
}
