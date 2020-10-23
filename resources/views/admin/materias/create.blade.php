<!-- Modal -->
<div class="modal fade" id="modalMateria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="CrearMateriaForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Registrar Materia</h4>
          </div>
            <div class="modal-body">

              <div class="row">
                          <div class="col-sm-4">
                              <label for="materia">Materia:</label>
                              <input type="text" class="form-control" placeholder="Ingrese nombre de la materia" name="materia">
                          </div>
                          <div class="col-sm-4">
                              <label for="mes">Grado:</label>
                              <select name="grado" class="form-control">
                                  @foreach ($grado as $g)
                                  <option value="{{$g->id}}">{{$g->nombre}}</option>
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
      $('#modalMateria').modal('show');

  }

  $('#modalMateria').on('hide.bs.modal', function(){
      $("#CrearMateriaForm").validate().resetForm();
      document.getElementById("CrearMateriaForm").reset();
      window.location.hash = '';
  });

  $('#modalMateria').on('show.bs.modal', function(){
      window.location.hash = '#insertar';
  });
   $("#CrearMateriaForm").submit(function(event){

           event.preventDefault();

           var serializedData = $("#CrearMateriaForm").serialize();

               $.ajax({
                   type: "POST",
                   headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                   url: "{{route('materias.save')}}",
                   data: serializedData,
                   dataType: "json",
                   success: function (data) {
                       $('.loader').fadeOut(225);
                       $('#modalMateria').modal("hide");
                       materias_table.ajax.reload();
                   },
                   error: function (errors) {
                       $('.loader').fadeOut(225);
                       $('#modalMateria').modal("hide");
                       //detalles_table.ajax.reload();
                       alertify.set('notifier', 'position', 'top-center');
                       alertify.error('Hubo un error al registrar la materia');
                   }
               })

       });

    </script>
@endpush
