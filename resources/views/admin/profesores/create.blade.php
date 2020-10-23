<!-- Modal -->
<div class="modal fade" id="modalProfesor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="CrearProfesorForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Registrar Profesor</h4>
          </div>
            <div class="modal-body">

              <div class="row">
                          <div class="col-sm-4">
                              <label for="nombre">Nombre:</label>
                              <input type="text" class="form-control" placeholder="Ingrese nombre del profesor" name="nombre">
                          </div>
                          <div class="col-sm-4">
                              <label for="dpi">DPI:</label>
                              <input type="text" class="form-control" placeholder="Ingrese número de dpi" name="dpi">
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
      $('#modalProfesor').modal('show');

  }

  $('#modalProfesor').on('hide.bs.modal', function(){
      $("#CrearProfesorForm").validate().resetForm();
      document.getElementById("CrearProfesorForm").reset();
      window.location.hash = '';
  });

  $('#modalProfesor').on('show.bs.modal', function(){
      window.location.hash = '#insertar';
  });
   $("#CrearProfesorForm").submit(function(event){

           event.preventDefault();

           var serializedData = $("#CrearProfesorForm").serialize();
            if ($('#CrearProfesorForm').valid()) {
               $.ajax({
                   type: "POST",
                   headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                   url: "{{route('profesores.save')}}",
                   data: serializedData,
                   dataType: "json",
                   success: function (data) {
                       $('.loader').fadeOut(225);
                       $('#modalProfesor').modal("hide");
                       profesores_table.ajax.reload();
                   },
                   error: function (errors) {
                       $('.loader').fadeOut(225);
                       $('#modalProfesor').modal("hide");
                       //detalles_table.ajax.reload();
                       alertify.set('notifier', 'position', 'top-center');
                       alertify.error('Hubo un error al registrar la Profesor');
                   }
               })
            }
       });

    </script>
    <script src="{{asset('js/profesores/create.js')}}"></script>
@endpush
