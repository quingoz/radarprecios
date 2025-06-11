<div class="modal fade modalDashboardKpi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title text-white" id="titleModal">Edita Dashboard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="divLoading">
                    <div class="contenedor-loader">
                        <div></div>
                    </div>
                    <p class="cargando">Cargando...</p>
                </div>

                <form id="formDashboardKpi" name="formDashboardKpi" class="form-horizontal">
                    <input type="hidden" class="form-control" id="idDashboard" name="idDashboard"
                        value="<?= $data['iDashboard']; ?>">

                    <div class="form-row">

                        <?php for ($i=0; $i < count($data['ID_KPI']); $i++) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="<?= $data['ID_KPI'][$i]['ID_KPI'] ?>"
                                name="kpi[]" value="<?= $data['ID_KPI'][$i]['ID_KPI'] ?>"
                                <?=  $data['ID_KPI'][$i]['CHECKED'] == 'YES'? 'CHECKED':'' ?>>
                            <label class="form-check-label"
                                for="inlineCheckbox1"><?= $data['ID_KPI'][$i]['ID_KPI'] ?></label>
                        </div>
                        <?php } ?>

                    </div>

                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i><span
                                id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>