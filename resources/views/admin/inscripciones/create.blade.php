@extends('admin.layoutadmin')

@section('header')
    <section class="content-header">
        <h1>
          Inscripciones
          <small>Inscripciones</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li><a href="{{route('inscripciones.index')}}"><i class="fa fa-list"></i> Inscripciones</a></li>
          <li class="active">Crear</li>
        </ol>
    </section>
@stop

@section('content')
    <form method="POST" id="InscripcionForm"  action="{{route('inscripciones.save')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h4><b>Datos del Estudiante</b></h4>
                  </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" placeholder="Nombre del Estudiante" name="nombre_estudiante">
                            </div>
                            <div class="col-sm-2">
                                <label for="carnet">Carnet:</label>
                                <input type="text" class="form-control" placeholder="Ingrese Carnet" name="carnet" >
                            </div>
                            <div class="col-sm-2">
                                <label for="cui">CUI:</label>
                                <input type="text" class="form-control" placeholder="Cui del estudiante" name="cui" >
                            </div>
                            <div class="col-sm-2">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" class="form-control" placeholder="telefono:" name="telefono_estudiante">
                            </div>
                            <div class="col-sm-2">
                                <label for="ciclo">Ciclo Escolar</label>
                                <select name="ciclo" class="form-control">
                                    @foreach ($ciclo as $c)
                                    <option value="{{$c->id}}">{{$c->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="genero">Género:</label>
                                <select name="genero_estudiante" class="form-control">
                                  <option value="default">seleccione Género</option>
                                  <option value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="grado">Grado de Inscripción</label>
                                <select name="grado" class="form-control">
                                    @foreach ($grado as $g)
                                    <option value="{{$g->id}}">{{$g->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" placeholder="Dirección" name="direccion_estudiante">
                            </div>
                        </div>

                        <br>
                        <div class="box-header">
                          <h4><b>Datos del Padre</b></h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" placeholder="Nombre del padre" name="nombre_padre">
                            </div>
                            <div class="col-sm-3">
                                <label for="apellido_padre">Apellido:</label>
                                <input type="text" class="form-control" placeholder="Apellidos del padre" name="apellido_padre">
                            </div>
                            <div class="col-sm-3">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" class="form-control" placeholder="Numero de Telefono" name="telefono_padre">
                            </div>
                            <div class="col-sm-3">
                                <label for="DPI">DPI:</label>
                                <input type="text" class="form-control" placeholder="Número de DPI" name="dpi_padre">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-3">
                              <label for="genero">Género:</label>
                              <select name="genero_padre" class="form-control">
                                <option value="default">seleccione Género</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                              </select>
                          </div>
                            <div class="col-sm-9">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" placeholder="Ingrese Dirección" name="direccion_padre">
                            </div>
                        </div>
                        <br>
                        <div class="box-header">
                          <h4><b>Datos del Madre</b></h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" placeholder="Nombre del padre" name="nombre_madre">
                            </div>
                            <div class="col-sm-3">
                                <label for="apellido_padre">Apellido:</label>
                                <input type="text" class="form-control" placeholder="Apellidos del padre" name="apellido_madre">
                            </div>
                            <div class="col-sm-3">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" class="form-control" placeholder="Numero de Telefono" name="telefono_madre">
                            </div>
                            <div class="col-sm-3">
                                <label for="DPI">DPI:</label>
                                <input type="text" class="form-control" placeholder="Número de DPI" name="dpi_madre">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-3">
                              <label for="genero">Género:</label>
                              <select name="genero_madre" class="form-control">
                                <option value="default">seleccione Género</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                              </select>
                          </div>
                            <div class="col-sm-9">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" placeholder="Ingrese Dirección" name="direccion_madre">
                            </div>
                        </div>
                        <br>
                        <div class="text-right m-t-15">
                            <a class='btn btn-primary form-button' href="{{ route('inscripciones.index')}}">Regresar</a>
                            <button id="ButtonCliente" class="btn btn-success form-button">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
    </form>
    &nbsp
    <div class="loader loader-bar"></div>

@stop


@push('styles')

@endpush


@push('scripts')


<script src="{{asset('js/inscripciones/create.js')}}"></script>
@endpush
