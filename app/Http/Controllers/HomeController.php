<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\Pregunta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Recuperamos el id del usuario logueado
        $idUser = auth()->user()->id;
        //Hacemos una consulta a los examenes mediante su id para mostrar solo los examenes diponibles pra él
        $examenes = Examen::where('id_usuario',$idUser)->get();
        return view('/home',compact('examenes'));
    }

    public function welcome()
    {
        return view('/');
    }

    public function examen($id){
        $examen = Examen::find($id);
        $preguntas = Pregunta::where('id_examen',$id)->get();
        return view('Standar.examenes.verExamen', compact('examen','preguntas'));
    }

    public function  iniciarExamen($id){
        $examen = Examen::find($id);
        $preguntas = Pregunta::where('id_examen',$id)->get();
        //dd("Comazaste el ezamen",$preguntas);
        return view('Standar.examenes.examen',compact('examen','preguntas'));   
    }

}
