<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignacion;
use App\Profesor;
use App\Grado;
use App\Materia;
use App\Ciclo;
use Illuminate\Support\Facades\Response;

class AsignacionMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Profesor::all();
        $g = Materia::all();
        $c = Ciclo::all();
        return view('admin.asignaciones.index', compact('p','g','c'));
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
        $as = Asignacion::create([
          'materiaId' => $request->materiaId,
          'profesorId' => $request->profesorId,
          'cicloId' => $request->ciclo,
        ]);
        $as->save();
        return Response::json(['success'=>'éxito']);
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
    public function edit(Asignacion $asignacion, Request $request)
    {
        $as = Asignacion::find($asignacion->id);
        return Response::json($as);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        $asignacion->update($request->all());
        return Response::json(['success' => 'Éxito']);
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
      $json['data'] = Asignacion::select(
          'profesor.nombre as profesor',
          'materia.nombre as materia',
          'grado.nombre as grado',
          'ciclo.anio as ciclo',
        )->join(
          'profesor', 'profesor.id', '=', 'asignacion.profesorId',
          )->join(
            'materia', 'materia.id', '=', 'asignacion.materiaId',
            )->join(
              'grado', 'grado.id', '=', 'materia.gradoId'
              )->join(
                'ciclo', 'ciclo.id', '=', 'asignacion.cicloId'
                )->get();

        return Response::json($json);

    }
}
