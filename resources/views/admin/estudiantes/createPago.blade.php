<!-- Modal -->
<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" id="CrearPagoForm">


      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Registrar Pago</h4>
          </div>
            <div class="modal-body">

              <div class="row">
                          <div class="col-sm-4">
                              <label for="monto">Monto:</label>
                              <input type="text" class="form-control" placeholder="Ingrese Monto" name="monto">
                              <input type="hidden" class="form-control" placeholder="Ingrese Monto" name="id" value="{{$id}}">
                          </div>
                          <div class="col-sm-4">
                              <label for="mes">Mes:</label>
                              <select name="mes" class="form-control">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiempre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Dciciembre">Diciembre</option>
                              </select>
                          </div>
                          <div class="col-sm-4">
                              <label for="ciclo">Ciclo Escolar</label>
                              <select name="anio" class="form-control">
                                  <option value="2020">2020</option>
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


      $('#modalPago').on('show.bs.modal', function(e) {

      })


  if(window.location.hash === '#insertar')
  {
      $('#modalPago').modal('show');

  }

  $('#modalPago').on('hide.bs.modal', function(){
      $("#CrearPagoForm").validate().resetForm();
      document.getElementById("CrearPagoForm").reset();
      window.location.hash = '';
  });

  $('#modalPago').on('show.bs.modal', function(){
      window.location.hash = '#insertar';
  });
   $("#CrearPagoForm").submit(function(event){

           event.preventDefault();

           var serializedData = $("#CrearPagoForm").serialize();

               $.ajax({
                   type: "POST",
                   headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
                   url: "{{route('pagos.save')}}",
                   data: serializedData,
                   dataType: "json",
                   success: function (data) {
                       $('.loader').fadeOut(225);
                       $('#modalPago').modal("hide");
                       pagos_table.ajax.reload();
                   },
                   error: function (errors) {
                       $('.loader').fadeOut(225);
                       $('#modalAbono').modal("hide");
                       //detalles_table.ajax.reload();
                       alertify.set('notifier', 'position', 'top-center');
                       alertify.error('Hubo un error al registrar el pago');
                   }
               })

       });

    </script>
@endpush
