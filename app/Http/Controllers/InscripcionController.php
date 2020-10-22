<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripcion;
use App\Grado;
use App\Ciclo;
use App\Persona;
use App\Estudiante;
use App\AsignacionEncargado;
use Illuminate\Support\Facades\Response;

class InscripcionController extends Controller
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
        return view ('admin.inscripciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grado = Grado::all();
        $ciclo = Ciclo::all();
        return view('admin.inscripciones.create',compact('grado', 'ciclo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $padre = Persona::create([
          'nombre' => $request->nombre_padre,
          'apellido' => $request->apellido_padre,
          'direccion' => $request->direccion_padre,
          'telefono' => $request->telefono_padre,
          'dpi' => $request->dpi_padre,
          'genero' => $request->genero_padre,
      ]);
      $padre->save();
      $madre = Persona::create([
          'nombre' => $request->nombre_madre,
          'apellido' => $request->apellido_madre,
          'direccion' => $request->direccion_madre,
          'telefono' => $request->telefono_madre,
          'dpi' => $request->dpi_madre,
          'genero' => $request->genero_madre,
      ]);
      $madre->save();

      $estudiante = Estudiante::create([
          'cui' => $request->cui,
          'nombre' => $request->nombre_estudiante,
          'telefono' => $request->telefono_estudiante,
          'genero' => $request->genero_estudiante,
          'direccion' => $request->direccion_estudiante,
          'carnet' => $request->carnet,
          'estadoId' => '1',
      ]);
      $estudiante->save();

      $asigenP = AsignacionEncargado::create([
          'rol' => 'Padre',
          'personaId' => $padre->id,
          'estudianteId' => $estudiante->id,
      ]);
      $asigenP->save();

      $asigenP = AsignacionEncargado::create([
          'rol' => 'Madre',
          'personaId' => $madre->id,
          'estudianteId' => $estudiante->id,
      ]);
      $asigenP->save();

      $ins = Inscripcion::create([
          'estudianteId' => $estudiante->id,
          'gradoId' => $request->grado,
          'cicloId' => $request->ciclo,
      ]);
      $ins->save();

        return redirect()->route('inscripciones.index')->withFlash('La inscripción se ha registrado exitosamente');
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

    public function getJson(Request $params)
    {
        $json['data'] = Inscripcion::select(
            'estudiante.nombre as nombre',
            'estudiante.carnet as carnet',
            'estudiante.direccion as direccion',
            'grado.nombre as grado',
            'ciclo.anio as anio',
            'inscripcion.id as id',
            'estudiante.estadoId as estado',
          )->join(
            'estudiante', 'estudiante.id', '=', 'inscripcion.estudianteId'
            )->join(
              'grado', 'grado.id', '=', 'inscripcion.gradoId'
              )->join(
                'ciclo', 'ciclo.id', '=', 'inscripcion.cicloId'
                )->get();

        return Response::json($json);
    }

}
