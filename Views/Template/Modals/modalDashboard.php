<!-- Modal -->
<div class="modal fade" id="modalFormDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Dashboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formDashboard" name="formDashboard">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Base de datos</label>
                        <input type="text" class="form-control" id="baseDeDatos" name="baseDeDatos">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnActionForm" class="btn bg-gradient-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFormDashboardClonar" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Dashboard Clonado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formDashboardClonar" name="formDashboardClonar">
                <input type="hidden" id="idDashboardClonar" name="idDashboardClonar">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcionClonar" name="descripcionClonar">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Base de datos</label>
                        <input type="text" class="form-control" id="baseDeDatosClonar" name="baseDeDatosClonar">
                    </div>
                    <div class="form-group">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="tipoClonacion" id="tipoClonacion1" value="0">
                            <label class="custom-control-label" for="customRadio1">Clonar en el mismo servidor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipoClonacion" id="tipoClonacion2" value="1">
                            <label class="custom-control-label" for="customRadio2">Clonar en otro servidor</label>
                        </div>
                    </div>
                    <div class="form-group" id="servidorClonarGroup" style="display: none;">
                        <label for="message-text" class="col-form-label">Servidor</label>
                        <select class="form-control" id="servidorClonar" name="servidorClonar" required="">
                        </select>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnActionForm" class="btn bg-gradient-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para controlar la visibilidad del select -->
<script>
    document.getElementById('tipoClonacion1').addEventListener('change', function() {
        document.getElementById('servidorClonarGroup').style.display = 'none';
    });

    document.getElementById('tipoClonacion2').addEventListener('change', function() {
        document.getElementById('servidorClonarGroup').style.display = 'block';
    });
</script>