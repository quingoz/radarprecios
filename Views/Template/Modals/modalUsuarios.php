<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formUsuario" name="formUsuario" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Contraseña</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Seleccione Empresa</label>
                                <select class="form-control" id="idEnterprise" name="idEnterprise">
                                </select>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Seleccione Dashboard</label>
                                <select class="form-control js-example-basic-multiple" id="idDashboard" name="idDashboard[]" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Url WebView</label>
                                <input type="text" class="form-control" id="urlWebView" name="urlWebView">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">User Token</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="userToken" name="userToken">
                                    <button class="btn btn-outline-primary mb-0" type="button" id="button-addon2" onclick="generateToken()">
                                    <i class="fas fa-sync"></i></button>
                                </div>
                            </div>
                        </div>
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
<div class="modal fade" id="modalFormUsuarioEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formUsuarioEdit" name="formUsuarioEdit" class="form-horizontal">
              <input type="hidden" class="form-control" id="idUsuarioEdit" name="idUsuarioEdit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcionEdit" name="descripcionEdit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Usuario</label>
                                <input type="text" class="form-control" id="usernameEdit" name="usernameEdit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Contraseña</label>
                                <input type="text" class="form-control" id="passwordEdit" name="passwordEdit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Seleccione Empresa</label>
                                <select class="form-control" id="idEnterpriseEdit" name="idEnterpriseEdit">
                                </select>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Seleccione Dashboard</label>
                                <select class="form-control js-example-basic-multiple" id="idDashboardEdit" name="idDashboardEdit[]" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Url WebView</label>
                                <input type="text" class="form-control" id="urlWebViewEdit" name="urlWebViewEdit">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">User Token</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="userTokenEdit" name="userTokenEdit">
                                    <button class="btn btn-outline-primary mb-0" type="button" id="button-addon2" onclick="generateToken()">
                                    <i class="fas fa-sync"></i></button>
                                </div>
                            </div>
                        </div>
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
<!--<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celIdentificacion">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">Jacob</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">Larry</td>
            </tr>
            <tr>
              <td>Tipo Usuario:</td>
              <td id="celTipoUsuario">Larry</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>-->