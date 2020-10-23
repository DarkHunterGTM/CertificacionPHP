<div class="modal fade" id="modalPago" tabindex="-1" role="dialog">
    <form method="POST" id="InsertarForm">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Realizar Pago</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-sm-4">
                      <label for="monto">Monto:</label>
                      <input type="text" class="form-control" placeholder="Ingrese Monto" name="monto">
                  </div>
                  <div class="col-sm-2">
                      <label for="mes">Mes:</label>
                      <select name="mes" class="form-control">
                        <option value="default">Seleccione Mes</option>
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
                  <div class="col-sm-2">
                      <label for="ciclo">Ciclo Escolar</label>
                      <select name="anio" class="form-control">
                          <option value="default">Seleccione Año</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                      </select>
                  </div>
              </div>
              <br>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btnInsertar">Registrar</button>
            </div>
        </div>
        </div>
    </form>
</div>
@push('scripts')
<script src="{{asset('js/estudiantes/create.js')}}"></script>
@endpush
