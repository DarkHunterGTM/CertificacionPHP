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
    <form method="POST" id="EstudiantesEditForm"  action="{{route('personas.update', $persona)}}">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                      <div class="row">
                          <div class="col-sm-3">
                              <label for="nombre">Nombre:</label>
                              <input type="text" class="form-control"  placeholder="Nombre de la persona" name="nombre" value="{{old('nombre', $persona->nombre)}}">
                          </div>
                          <div class="col-sm-3">
                              <label for="apellido_padre">Apellido:</label>
                              <input type="text" class="form-control" placeholder="Apellidos de la persona" name="apellido" value="{{old('apellido', $persona->apellido)}}" >
                          </div>
                          <div class="col-sm-3">
                              <label for="telefono">Teléfono:</label>
                              <input type="text" class="form-control" placeholder="Numero de Telefono" name="telefono" value="{{old('telefono', $persona->telefono)}}" >
                          </div>
                          <div class="col-sm-3">
                              <label for="DPI">DPI:</label>
                              <input type="text" class="form-control" placeholder="Número de DPI" name="dpi" value="{{old('dpi', $persona->dpi)}}" >
                          </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-sm-12">
                              <label for="direccion">Dirección:</label>
                              <input type="text" class="form-control" placeholder="Ingrese Dirección" name="direccion" value="{{old('direccion', $persona->direccion)}}" >
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


<script src="{{asset('js/inscripciones/create.js')}}"></script>
@endpush
