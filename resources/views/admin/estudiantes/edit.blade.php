@extends('admin.layoutadmin')

@section('header')
    <section class="content-header">
        <h1>
          Estudiantes
          <small>Estudiantes</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li><a href="{{route('estudiantes.index')}}"><i class="fa fa-list"></i> Estudiantes</a></li>
          <li class="active">Editar</li>
        </ol>
    </section>
@stop

@section('content')
    <form method="POST" id="EstudiantesEditForm"  action="{{route('estudiantes.update', $estudiante)}}">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control"  placeholder="Nombre del Estudiante" name="nombre" value="{{old('nombre', $estudiante->nombre)}}">
                                  <input type="hidden" class="form-control"  placeholder="Nombre del Estudiante" name="id_estudiante" value="{{old('id', $estudiante->id)}}">
                            </div>
                            <div class="col-sm-3">
                                <label for="carnet">Carnet:</label>
                                <input type="text" class="form-control"  placeholder="Ingrese Carnet" name="carnet" value="{{old('carnet', $estudiante->carnet)}}">
                            </div>
                            <div class="col-sm-3">
                                <label for="cui">CUI:</label>
                                <input type="text" class="form-control"  placeholder="Cui del estudiante" name="cui" value="{{old('cui', $estudiante->cui)}}">
                            </div>
                            <div class="col-sm-2">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" class="form-control"  placeholder="telefono:" name="telefono" value="{{old('telefono', $estudiante->telefono)}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control"  placeholder="Dirección" name="direccion" value="{{old('direccion', $estudiante->direccion)}}">
                            </div>
                        </div>
                        <br>
                        <div class="text-right m-t-15">
                            <a class='btn btn-primary form-button' href="{{ route('estudiantes.index')}}">Regresar</a>
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


<script src="{{asset('js/estudiantes/edit.js')}}"></script>
@endpush
