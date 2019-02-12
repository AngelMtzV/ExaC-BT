<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\User;

class controladorApp extends Controller
{
    public function inicio(){
        return view('welcome');
    }

    public function entrar(){
        return view('admin.crudAdmin');
    }

    public function home(){
    	//Recuperamos el id del usuario logueado
        $idUser = auth()->user()->id;
        $users = User::paginate(10);
        return view('administrador.usuarios.indexUser', compact('users'));
    }

}
