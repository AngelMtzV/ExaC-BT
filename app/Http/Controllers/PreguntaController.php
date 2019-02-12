<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use App\Examen;
use Session;
use Validator;
use Response;


class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexE($id)
    {
        $idExamen = $id;
        //Recupera el id del examen y hace una consulta para encontrar el objeto con ese id
        $examen = Examen::find($id);
        //Hace una consulta para las preguntas con el id del examen 
        $preguntas = Pregunta::where('id_examen', $id)->paginate(10);
        //dd($preguntas);
        return view('administrador.addPreguntas.indexPreguntas',compact('preguntas','examen','idExamen'));
    }

    public function index()
    {
        $preguntas = Pregunta::paginate(10);
        //dd($preguntas);
        return view('administrador.addPreguntas.indexPreguntas',compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'inpPregunta' => 'required', 
            'inpOpcion1' => 'required',
            'inpOpcion2' => 'required',
            'inpOpcion3' => 'required',
            'inpOpcion4' => 'required',
            'inpIdExamen' => 'required',
            'opcionid' => 'required',
        ]);
        //se crea una nueva asignatura
        $pregunta =  new Pregunta;
        $pregunta->pregunta = $request->get('inpPregunta');
        $pregunta->opcion1 = $request->get('inpOpcion1');
        $pregunta->opcion2 = $request->get('inpOpcion2');
        $pregunta->opcion3 = $request->get('inpOpcion3');
        $pregunta->opcion4 = $request->get('inpOpcion4');
        $pregunta->respuesta = $request->get('opcionid');
        $pregunta->id_examen = $request->get('inpIdExamen');
        //Se guardan los datos
        //dd($pregunta);
        $pregunta->save();
        Session::flash('message','Pregunta agregada correctamente');
        return back()->with('message','Pregunta agregada correctamente');
        //return redirect()->route('indexE');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //dd($pregunta);
        return view('administrador.addPreguntas.editPreguntas', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $request->validate([
            'inpPregunta' => 'required',
            'inpOpcion1' => 'required',
            'inpOpcion2' => 'required',
            'inpOpcion3' => 'required',
            'inpOpcion4' => 'required',
            'opcionid' => 'required',
            'inpIdExamen' => 'required',
        ]);

        
        //Obtebemos los valores del formulario
        $question = $request->input('inpPregunta');
        $opcion1 = $request->input('inpOpcion1');
        $opcion2 = $request->input('inpOpcion2');
        $opcion3 = $request->input('inpOpcion3');
        $opcion4 = $request->input('inpOpcion4');
        $respuesta = $request->get('opcionid');
        $idExamen = $request->input('inpIdExamen');

        //Hace una consulta para las preguntas con el id del examen 
        $preguntas = Pregunta::where('id_examen', $idExamen)->paginate(10);
        $examen = Examen::find($idExamen);
        //Sacamos el id del pregunta
        $idPregunta = $pregunta->id;
        //se busca el pregunta mediante el id
        $pregunta = Pregunta::find($idPregunta);
        //pasamos los valores a las columnas de la base de datos
        $pregunta->pregunta = $question;
        $pregunta->opcion1 = $opcion1;
        $pregunta->opcion2 = $opcion2;
        $pregunta->opcion3 = $opcion3;
        $pregunta->opcion4 = $opcion4;
        $pregunta->respuesta = $respuesta;
        //Se guardan los datos
        //dd($pregunta);
        $pregunta->save();
        //$pregunta->update($request->all());

        Session::flash('message','Pregunta actualizada correctamente.');
        //return back()->with('message','Los datos se han actualizado correctamente.');
        return redirect()->route('indexE',$idExamen);
        //return view('administrador.addPreguntas.indexPreguntas',compact('examen','idExamen','preguntas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();

        Session::flash('message','Pregunta eliminada correctamente.');
        return back()->with('message','Los datos se han eliminado correctamente.');
        //return redirect()->route('preguntas.index');
    }
}
