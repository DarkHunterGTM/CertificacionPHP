<!-- Modal -->
<div class="modal fade" id="modalAsignacionEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="EditarAsignacionForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Editar Asignación</h4>
          </div>
            <div class="modal-body">
              <input type="hidden" id='id_edit' name="id1">
              <div class="row">
                <div class="col-sm-6">
                <label for="profesor">Profesor</label>
                <select name="profesorId" id="select_profesor" class="form-control">
                    <option value="">-------------</option>
                </select>
              </div>
              <div class="col-sm-6">
              <label for="materia">Materia</label>
              <select name="materiaId" id="select_materia" class="form-control">
                  <option value="">-------------</option>
              </select>
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
    $(document).on('click', ".edit-asignacion", function(){
        $('#modalAsignacionEditar').modal('show');
        var id = $(this).parent().parent().attr('id');
        $('#id_edit').val(id);
        cargarAsignacion(id);
      })

      $('#modalAsignacionEditar').on('hide.bs.modal', function(){
      $("#EditarAsignacionForm").validate().resetForm();
      document.getElementById("EditarAsignacionForm").reset();
      window.location.hash = '#';
  });

  $('#modalAsignacionEditar').on('shown.bs.modal', function(){
      window.location.hash = '#editar';
  });


  function cargarAsignacion(id){
        $.ajax({
            url: "{{url()->current()}}" + "/edit/" + id,
            headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
        }).then(function(data){
            $('#select_profesor > option').each(function(){
                if ($(this).val() == data.profesor) {
                    $(this).attr('selected', 'selected');
                }
            });
            $('#select_materia > option').each(function(){
                if ($(this).val() == data.materia) {
                    $(this).attr('selected', 'selected');
                }
            });
        });
    }

$("#EditarAsignacionForm").submit(function(event){

        event.preventDefault();

        var id = $('#id_edit').val();
        var serializedData = $("#EditarAsignacionForm").serialize();

        if ($('#EditarAsignacionForm').valid()) {
            $.ajax({
                type: "PUT",
                headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                url: "{{url()->current()}}" + "/" + id + "/update",
                data: serializedData,
                dataType: "json",
                success: function (data) {
                    $('.loader').fadeOut(225);
                    $('#modalAsignacionEditar').modal("hide");
                    asignaciones_table.ajax.reload();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success('La Asignación se Editó Correctamente!!');
                },
                error: function (errors) {
                    $('.loader').fadeOut(225);
                    $('#modalEditar').modal("hide");
                    bodegas_table.ajax.reload();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error('Ocurrió un error al editar.');
                }
            })
        }
    });
    </script>
@endpush
