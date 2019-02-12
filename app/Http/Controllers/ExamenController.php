<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;
use Session;
use Validator;
use Response;
use App\User;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Examen::paginate(5);
        return view('administrador.crudAdmin', compact('examenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("Estas en crear ExamenController.php");
        $usuarios = User::get();
        return view('administrador.create',compact('usuarios'));
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
            'inpNombre' => 'required',
            'inpNumeroPreguntas' => 'required',
            'inpFecha' => 'required',
            'inpTiempo' => 'required',
            'opcionTipoUsuario' => 'required',
        ]);
        
        //se crea una nueva asignatura
        $examen =  new Examen;
        $examen->nombre = $request->get('inpNombre');
        $examen->no_preguntas = $request->get('inpNumeroPreguntas');
        $examen->fecha_inicio = $request->get('inpFecha');
        $examen->tiempo = $request->input('inpTiempo');
        $examen->tiempo = $request->input('opcionTipoUsuario');
        //Se guardan los datos
        //dd($examen);
        $examen->save();
        Session::flash('message','Examen agregado');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('examens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        return view('administrador.show',compact('examen')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        $usuarios = User::get();
        return view('administrador.edit',compact('examen','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
        $request->validate([
            'inpNombre' => 'required',
            'inpNumeroPreguntas' => 'required',
            'inpFecha' => 'required',
            'inpTiempo' => 'required',
            'opcionTipoUsuario' => 'required',
        ]);
        
        //Obtebemos los valores del formulario
        $nom = $request->input('inpNombre');
        $no_preg = $request->input('inpNumeroPreguntas');
        $fecha = $request->input('inpFecha');
        $tiem = $request->input('inpTiempo');
        $idUsuario = $request->get('opcionTipoUsuario');
        //Sacamos el id del examen
        $idExamen = $examen->id;
        //se busca el examen mediante el id
        $examen = Examen::find($idExamen);
        //pasamos los valores a las columnas de la base de datos
        $examen->nombre = $nom;
        $examen->no_preguntas = $no_preg;
        $examen->fecha_inicio = $fecha;
        $examen->tiempo = $tiem;
        $examen->id_usuario = $idUsuario;
        //Se guardan los datos
        $examen->save();
        //$examen->update($request->all());

        Session::flash('message','Examen actualizado correctamente.');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('examens.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();

        Session::flash('message','Examen eliminado.');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('examens.index');
    }
}
