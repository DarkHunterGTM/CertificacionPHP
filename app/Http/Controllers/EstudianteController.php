<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Inscripcion;
use Illuminate\Support\Facades\Response;
use App\Grado;
use App\Ciclo;
use App\Pago;
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

    public function index1()
    {
          return view ('admin.estudiantes.pago');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function create1()
    {
      $ciclo = Ciclo::all();
      return view('admin.estudiantes.createPago', compact('ciclo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = Pago::create([
          'mes' => $request->mes,
          'anio' => $request->anio,
          'monto' => $request->monto,
          'fecha' => '2020-01-01',
          'estudianteId' => '1',
        ]);

        $pago->save();
        return Response::json(['success'=>'éxito']);

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
        return view('admin.estudiantes.pago', compact('id'));
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

    public function getJsonPago(Request $params, $id)
    {
        $json['data'] = Estudiante::select(
            'pago.fecha as fecha',
            'pago.monto as monto',
            'pago.mes as mes',
            'pago.anio as anio',
          )->join(
            'pago' , 'pago.estudianteId', '=', 'estudiante.id'
            )->where(
              'estudiante.id', '=', $id
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
