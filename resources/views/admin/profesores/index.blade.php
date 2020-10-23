@extends('admin.layoutadmin')

@section('header')
<section class="content-header">
    <h1>
      Listado de Profesores
      <small>Todas los Profesores</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Profesores</li>
    </ol>
  </section>

  @endsection

@section('content')
@include('admin.users.confirmarAccionModal')
@include('admin.profesores.create')
@include('admin.profesores.edit')
<div class="loader loader-bar is-active"></div>
<div class="box">
  <div class="box-header">
        <div class="text-right">
            <button  data-target='#modalProfesor' data-toggle='modal' id="print_receipt" class="btn btn-primary pull-right"
                style="margin-top: 15px; margin-bottom: 10px">Registrar Profesor</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <input type="hidden" name="rol_user" value="{{auth()->user()->roles[0]->name}}">
        <table id="profesores-table" class="table table-striped table-bordered no-margin-bottom dt-responsive nowrap"  width="100%">
        </table>
        <input type="hidden" name="urlActual" value="{{url()->current()}}">
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

@endsection


@push('styles')


@endpush

@push('scripts')
  <script>
    $(document).ready(function() {
      $('.loader').fadeOut(225);
      profesores_table.ajax.url("{{route('profesores.getJson')}}").load();
    });

  </script>
  <script src="{{asset('js/profesores/index.js')}}"></script>
@endpush
