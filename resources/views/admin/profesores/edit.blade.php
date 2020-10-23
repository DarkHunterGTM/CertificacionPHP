<!-- Modal -->
<div class="modal fade" id="modalProfesorEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="EditarProfesorForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Editar Profesor</h4>
          </div>
            <div class="modal-body">

              <div class="row">
                        <div class="col-sm-4">
                              <label for="materia">Nombre:</label>
                              <input type="text" class="form-control" placeholder="Ingrese nombre del Profesor" name="nombre" id="nombre">
                              <input type="hidden" id='id_edit' name="id">
                        </div>
                              <div class="col-sm-4">
                                    <label for="dpi">DPI:</label>
                                    <input type="text" class="form-control" placeholder="Ingrese número de d" name="dpi" id="dpi">
                                    <input type="hidden" id='id_edit' name="id1">
                            </div>

                </div>

                      <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnInsertar">Editar</button>
            </div>
          </div>
        </div>
    </form>
</div>

@push('scripts')
   <script>
    $(document).on('click', ".edit-profesor", function(){
        $('#modalProfesorEditar').modal('show');
        var id = $(this).parent().parent().attr('id');
        $('#id_edit').val(id);
        cargarProfesor(id);
      })

      $('#modalProfesorEditar').on('hide.bs.modal', function(){
      $("#EditarProfesorForm").validate().resetForm();
      document.getElementById("EditarProfesorForm").reset();
      window.location.hash = '#';
  });

  $('#modalProfesorEditar').on('shown.bs.modal', function(){
      window.location.hash = '#editar';
  });

    function cargarProfesor(id){
    $.ajax({
        url: "{{url()->current()}}" + "/edit/" + id,
        headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
    }).then(function(data){
        $("#nombre").val(data.nombre);
        $("#dpi").val(data.dpi);
    });
}

$("#EditarProfesorForm").submit(function(event){

        event.preventDefault();

        var id = $('#id_edit').val();
        var serializedData = $("#EditarProfesorForm").serialize();

        if ($('#EditarProfesorForm').valid()) {
            $.ajax({
                type: "PUT",
                headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                url: "{{url()->current()}}" + "/" + id + "/update",
                data: serializedData,
                dataType: "json",
                success: function (data) {
                    $('.loader').fadeOut(225);
                    $('#modalProfesorEditar').modal("hide");
                    profesores_table.ajax.reload();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success('El profesor se Editó Correctamente!!');
                },
                error: function (errors) {
                    $('.loader').fadeOut(225);
                    $('#modalEditar').modal("hide");
                    profesores_table.ajax.reload();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error('Ocurrió un error al editar.');
                }
            })
        }
    });
    </script>
  <script src="{{asset('js/profesores/edit.js')}}"></script>
@endpush
