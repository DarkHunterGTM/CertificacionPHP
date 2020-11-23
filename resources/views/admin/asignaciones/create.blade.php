<!-- Modal -->
<div class="modal fade" id="modalAsignacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="CrearAsignacionForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Registrar Asignación</h4>
          </div>
            <div class="modal-body">

              <div class="row">
                  <div class="col-sm-4">
                      <label for="profesor">Profesor:</label>
                        <select name="profesorId" class="form-control">
                          <option value="default">Seleccione Profesor</option>
                          @foreach ($p as $p)
                          <option value="{{$p->id}}">{{$p->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                          <div class="col-sm-4">
                              <label for="mes">Materia:</label>
                              <select name="materiaId" class="form-control">
                                <option value="default">Seleccione Materia</option>
                                  @foreach ($g as $m)
                                  <option value="{{$m->id}}">{{$m->nombre}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-sm-4">
                              <label for="mes">Ciclo:</label>
                              <select name="ciclo" class="form-control">
                                <option value="default">Seleccione ciclo</option>
                                  @foreach ($c as $c)
                                  <option value="{{$c->id}}">{{$c->anio}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <br>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnInsertar">Registrar</button>
            </div>
          </div>
        </div>
    </form>
</div>

@push('scripts')
   <script>




  if(window.location.hash === '#insertar')
  {
      $('#modalAsignacion').modal('show');

  }

  $('#modalAsignacion').on('hide.bs.modal', function(){
      $("#CrearAsignacionForm").validate().resetForm();
      document.getElementById("CrearAsignacionForm").reset();
      window.location.hash = '';
  });

  $('#modalAsignacion').on('show.bs.modal', function(){
      window.location.hash = '#insertar';
  });
   $("#CrearAsignacionForm").submit(function(event){

           event.preventDefault();

           var serializedData = $("#CrearAsignacionForm").serialize();
            if ($('#CrearAsignacionForm').valid()) {
               $.ajax({
                   type: "POST",
                   headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                   url: "{{route('asignaciones.save')}}",
                   data: serializedData,
                   dataType: "json",
                   success: function (data) {
                       $('.loader').fadeOut(225);
                       $('#modalAsignacion').modal("hide");
                       asignaciones_table.ajax.reload();
                   },
                   error: function (errors) {
                       $('.loader').fadeOut(225);
                       $('#modalAsignacion').modal("hide");
                       //detalles_table.ajax.reload();
                       alertify.set('notifier', 'position', 'top-center');
                       alertify.error('Hubo un error al registrar la asignación');
                   }
               })
            }
       });

    </script>
<script src="{{asset('js/asignaciones/create.js')}}"></script>
@endpush
