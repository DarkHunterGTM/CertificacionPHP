@extends('admin.layoutadmin')

@section('header')
<section class="content-header">
    <h1>
      Listado de Materias
      <small>Todas las Materias</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Materias</li>
    </ol>
  </section>

  @endsection

@section('content')
@include('admin.users.confirmarAccionModal')
@include('admin.materias.create')
@include('admin.materias.edit')
<div class="loader loader-bar is-active"></div>
<div class="box">
  <div class="box-header">
        <div class="text-right">
            <button  data-target='#modalMateria' data-toggle='modal' id="print_receipt" class="btn btn-primary pull-right"
                style="margin-top: 15px; margin-bottom: 10px">Crear Materia</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <input type="hidden" name="rol_user" value="{{auth()->user()->roles[0]->name}}">
        <table id="materias-table" class="table table-striped table-bordered no-margin-bottom dt-responsive nowrap"  width="100%">
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
      materias_table.ajax.url("{{route('materias.getJson')}}").load();
    });

  </script>
  <script src="{{asset('js/materias/index.js')}}"></script>
@endpush
