<!-- Modal -->
<div class="modal fade" id="modalMateriaEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="EditarMateriaForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Editar Materia</h4>
          </div>
            <div class="modal-body">

              <div class="row">
                          <div class="col-sm-4">
                              <label for="materia">Materia:</label>
                              <input type="text" class="form-control" placeholder="Ingrese nombre de la materia" name="nombre" id="materia">
                              <input type="hidden" id='id_edit' name="id">
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
    $(document).on('click', ".edit-materia", function(){
        $('#modalMateriaEditar').modal('show');
        var id = $(this).parent().parent().attr('id');
        $('#id_edit').val(id);
        cargarMateria(id);
      })

      $('#modalMateriaEditar').on('hide.bs.modal', function(){
      $("#EditarMateriaForm").validate().resetForm();
      document.getElementById("EditarMateriaForm").reset();
      window.location.hash = '#';
  });

  $('#modalMateriaEditar').on('shown.bs.modal', function(){
      window.location.hash = '#editar';
  });

    function cargarMateria(id){
    $.ajax({
        url: "{{url()->current()}}" + "/edit/" + id,
        headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
    }).then(function(data){
        $("#materia").val(data.nombre);
    });
}

$("#EditarMateriaForm").submit(function(event){

        event.preventDefault();

        var id = $('#id_edit').val();
        var serializedData = $("#EditarMateriaForm").serialize();

        if ($('#EditarMateriaForm').valid()) {
            $.ajax({
                type: "PUT",
                headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                url: "{{url()->current()}}" + "/" + id + "/update",
                data: serializedData,
                dataType: "json",
                success: function (data) {
                    $('.loader').fadeOut(225);
                    $('#modalMateriaEditar').modal("hide");
                    materias_table.ajax.reload();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success('La Materia se Editó Correctamente!!');
                },
                error: function (errors) {
                    $('.loader').fadeOut(225);
                    $('#modalEditar').modal("hide");
                    materias_table.ajax.reload();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error('Ocurrió un error al editar.');
                }
            })
        }
    });
    </script>

        <script src="{{asset('js/materias/edit.js')}}"></script>
@endpush
