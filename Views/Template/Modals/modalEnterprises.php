<!-- Modal -->
<div class="modal fade" id="modalFormEnterprise" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formEnterprise" name="formEnterprise" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Token</label>
                                <input type="text" class="form-control" id="token" name="token">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">BD</label>
                                <input type="text" class="form-control" id="bd" name="bd">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Rif</label>
                                <input type="text" class="form-control" id="rif" name="rif">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">BD Sincro</label>
                                <input type="text" class="form-control" id="bdSincro" name="bdSincro">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Token Panel</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tokenpanel" name="tokenpanel">
                                    <button class="btn btn-outline-primary mb-0" type="button" id="button-addon2" onclick="generateToken()">
                                    <i class="fas fa-sync"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Url Panel</label>
                                <input type="text" class="form-control" id="urlpanel" name="urlpanel">
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
<div class="modal fade" id="modalFormEnterpriseEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formEnterpriseEdit" name="formEnterpriseEdit" class="form-horizontal">
                <input type="hidden" class="form-control" id="idEnterpriseEdit" name="idEnterpriseEdit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Token</label>
                                <input type="text" class="form-control" id="tokenEdit" name="tokenEdit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">BD</label>
                                <input type="text" class="form-control" id="bdEdit" name="bdEdit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Rif</label>
                                <input type="text" class="form-control" id="rifEdit" name="rifEdit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">BD Sincro</label>
                                <input type="text" class="form-control" id="bdSincroEdit" name="bdSincroEdit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreEdit" name="nombreEdit">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Token Panel</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tokenpanelEdit" name="tokenpanelEdit">
                                    <button class="btn btn-outline-primary mb-0" type="button" id="button-addon2" onclick="generateToken()">
                                    <i class="fas fa-sync"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Url Panel</label>
                                <input type="text" class="form-control" id="urlpanelEdit" name="urlpanelEdit">
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