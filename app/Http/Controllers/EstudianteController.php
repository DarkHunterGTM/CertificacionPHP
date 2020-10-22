<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Inscripcion;
use Illuminate\Support\Facades\Response;
use App\Grado;
use App\Ciclo;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class EstudianteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view ('admin.estudiantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function store1(Request $request)
    {


      $ins = Inscripcion::create([
          'estudianteId' => $request->id_estudiante,
          'gradoId' => $request->grado,
          'cicloId' => $request->ciclo,
      ]);
      $ins->save();

        return redirect()->route('inscripciones.index')->withFlash('La reinscripción se ha registrado exitosamente');
    }
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
    public function edit(Estudiante $estudiante)
    {
        return view('admin.estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
    $estudiante->update($request->all());
    return redirect()->route('estudiantes.index')->withFlash('La reinscripción se ha registrado exitosamente');
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
    public function getJson(Request $params)
    {
        $json['data'] = Estudiante::select(
            'estudiante.nombre as nombre',
            'estudiante.carnet as carnet',
            'estudiante.direccion as direccion',
            'estudiante.telefono as telefono',
            'estudiante.estadoId as estado',
            'estudiante.id as id',
          )->get();

        return Response::json($json);
    }

    public function reinscripcion(Estudiante $estudiante)
    {
      $padre = Estudiante::select(
          'personas.nombre as nombre',
          'personas.apellido',
          'personas.direccion',
          'personas.telefono',
          'personas.dpi',
          'personas.genero',
        )->join(
          'asignacion_encargado', 'asignacion_encargado.estudianteId', '=', 'estudiante.id'
          )->join(
            'personas', 'personas.id', '=', 'asignacion_encargado.personaId'
            )->where(
              'asignacion_encargado.rol', '=', 'Padre'
              )->where(
                'estudiante.id', '=', $estudiante->id
                )->get();

        $madre = Estudiante::select(
          'personas.nombre',
          'personas.apellido',
          'personas.direccion',
          'personas.telefono',
          'personas.dpi',
          'personas.genero',
          )->join(
            'asignacion_encargado', 'asignacion_encargado.estudianteId', '=', 'estudiante.id'
              )->join(
                'personas', 'personas.id', '=', 'asignacion_encargado.personaId'
                )->where(
                  'asignacion_encargado.rol', '=', 'Madre'
                  )->where(
                    'estudiante.id', '=', $estudiante->id
                    )->get();

        $grado = Grado::all();
        $ciclo = Ciclo::all();
        return view('admin.estudiantes.reinscripcion', compact('estudiante', 'padre', 'madre', 'ciclo', 'grado'));
    }
}
