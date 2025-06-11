<!-- Modal -->
<div class="modal fade" id="modalFormKpi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title text-white" id="titleModal">Nuevo Kpi</h5>
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

                <form id="formKpi" name="formKpi" class="form-horizontal">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="intIdKpi" class="form-control-label">ID_KPI</label>
                            <input type="number" class="form-control valid validNumber" id="intIdKpi" min="1"
                                name="intIdKpi" onkeypress="return controlTag(event);" readonly value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="intIdKpiDD" class="form-control-label">ID_KPI_DD</label>
                            <input type="number" class="form-control" id="intIdKpiDD" name="intIdKpiDD" min="1"
                                onkeypress="return controlTag(event);" value="(null)">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="intIdKpiPadre" class="form-control-label">KPI_PADRE</label>
                            <input type="number" class="form-control" id="intIdKpiPadre" name="intIdKpiPadre"
                                onkeypress="return controlTag(event);" value="(null)">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="intOculto" class="form-control-label">OCULTO</label>
                            <input type="number" class="form-control valid validNumber" id="intOculto" min="0" max="1"
                                name="intOculto" onkeypress="return controlTag(event);" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtLabel" class="form-control-label">LABEL</label>
                            <input type="text" class="form-control valid validText" id="txtLabel" name="txtLabel"
                                required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtDescription" class="form-control-label">DESCRIPCIÓN</label>
                            <input type="text" class="form-control valid validText" id="txtDescription"
                                name="txtDescription" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="txtSqlValue" class="form-control-label">SQL_VALUE</label>
                            <textarea class="form-control" id="txtSqlValue" name="txtSqlValue" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="txtSqlTabla" class="form-control-label">SQL_TABLA</label>
                            <textarea class="form-control" id="txtSqlTabla" name="txtSqlTabla" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="txtTotalizar" class="form-control-label">TOTALIZAR</label>
                            <input type="text" class="form-control" id="txtTotalizar" name="txtTotalizar" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtIcon" class="form-control-label">ICON</label>
                            <input type="text" class="form-control" id="txtIcon" name="txtIcon">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="intModulo" class="form-control-label">MODULO</label>
                            <input type="number" class="form-control valid validNumber" id="intModulo" min="1" max="13"
                                name="intModulo" required="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="posicion" class="form-control-label">POSICIÓN</label>
                            <input type="number" class="form-control valid validNumber" id="intPosicion"
                                name="intPosicion" value="0" onkeypress="return controlTag(event);">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="intGraficaPrincipal" class="form-control-label">G.PPAL</label>
                            <input type="number" class="form-control valid validNumber" id="intGraficaPrincipal" min="0"
                                max="1" name="intGraficaPrincipal" value="0" onkeypress="return controlTag(event);"
                                required="">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="listIdGrafica" class="form-control-label">ID_GRAFICA</label>
                            <select class="form-control " id="listIdGrafica" name="listIdGrafica" required>
                                <option value="0">Tipo de Grafica</option>
                                <option value="1">1 - GRAFICE_LINE</option>
                                <option value="2">2 - GRAFICA_PIE</option>
                                <option value="3">3 - GRAFICA_DONUT</option>
                                <option value="4">4 - GRAFICA_COLUMN</option>
                                <option value="5">5 - GOOGLE MAPS</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="txtSqlTabla" class="form-control-label">UPD</label>
                            <textarea class="form-control" id="txtUpd" name="txtUpd" rows="1"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-control-label">PARAM1</label>
                            <textarea class="form-control" id="txtParam1" name="txtParam1" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-control-label">PARAM2</label>
                            <textarea class="form-control" id="txtParam2" name="txtParam2" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-control-label">PARAM3</label>
                            <textarea class="form-control" id="txtParam3" name="txtParam3" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-control-label">PARAM4</label>
                            <textarea class="form-control" id="txtParam4" name="txtParam4" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-control-label">PARAM5</label>
                            <textarea class="form-control" id="txtParam5" name="txtParam5" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>