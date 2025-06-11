<?php 
headerCliente($data);
?>
<div class="container-fluid py-4">
    <style type="text/css">
    #mapa {
        height: 100%;
        width: 100%;
        display: none;
        overflow: hidden;
    }

    .mapa {
        width: 100%;
        height: 62vh;
        margin-bottom: 20px;
    }
    </style>
    <?php
        if (is_array($data['mapa']) && empty($data['mapa'])){?>
    <div id="centerData" data-value='{"lat": 7.198177031469836, "lng": -66.03274186312944}'></div>
    <div id="mapaData" data-value="{}"></div>
    <?php }else{
            $center = $data['mapa'][0]['POSITION'];?>
    <div id="centerData" data-value="<?= htmlspecialchars($center, ENT_QUOTES, 'UTF-8') ?>"></div>
    <div id="mapaData" data-value="<?= htmlspecialchars(json_encode($data['mapa']), ENT_QUOTES, 'UTF-8') ?>"></div>

    <?php  }
    ?>


    <div id="mediaUrl" data-value="<?= media() ?>"></div>

    <form id="formMapa" method="get" action="<?= base_url() ?>/mapa">
        <div class="row">
            <div class="col-md-2">
                <label class="form-label">Fecha de inicio:</label>
                <input type="date" id="start" name="start" class="form-control"
                    value="<?= isset($_GET['start']) ? $_GET['start'] : date('Y-m-d') ?>" required>

            </div>

            <div class="col-md-2">
                <label for="end" class="form-label">Fecha de fin:</label>
                <input type="date" id="end" name="end" class="form-control"
                    value="<?= isset($_GET['end']) ? $_GET['end'] : date('Y-m-d') ?>" required>

            </div>

            <div class="col-md-3">
                <label class="form-label">Grupo</label>
                <select class="form-control select-grupos select2" id="grupos" name="grupos[]" multiple="multiple"
                    data-placeholder="Seleccione los grupos">
                    <?php foreach($data['grupos'] as $key => $grupo) { ?>
                    <option value="<?= $grupo['GPO_CODIGO'] ?>"><?= $grupo['GPO_DESCRIPCION'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Producto</label>
                <select class="form-control select-productos select2" id="productos" name="productos[]"
                    multiple="multiple">
                    <option value=""></option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Vendedor</label>
                <select class="form-control select-vendedores select2" id="vendedores" name="vendedores[]"
                    multiple="multiple" data-placeholder="Seleccione vededores">
                    <option value=""></option>
                    <?php foreach($data['vendedores'] as $key => $vendedor) { ?>
                    <option value="<?= $vendedor['VEN_CODIGO'] ?>"><?= $vendedor['VEN_NOMBRE'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Estado</label>
                <select class="form-control select-estados select2" id="estados" name="estados[]" multiple="multiple"
                    data-placeholder="Seleccione estados">
                    <?php foreach($data['estados'] as $key => $estado) { ?>
                    <option value="<?= $estado['EDO_CODIGO'] ?>"><?= $estado['EDO_DESCRI'] ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="col-md-3">
                <label for="end" class="form-label">Municipio</label>
                <select class="form-control select-municipios select2" id="municipios" name="municipios[]"
                    multiple="multiple">
                    <?php foreach($data['municipios'] as $key => $municipio) { ?>
                    <option value="<?= $municipio['MPO_CODIGO'] ?>"><?= $municipio['MPO_DESCRI'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="end" class="form-label">Cliente</label>
                <select class="form-control select-clientes select2" id="clientes" name="clientes[]" multiple="multiple">
                    <?php foreach($data['clientes'] as $key => $cliente) { ?>
                    <option value="<?= $cliente['CLT_CODIGO'] ?>"><?= $cliente['CLT_NOMBRE'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="end" class="form-label">Frecuencia</label>
                <select class="form-control select-frecuencia select2" id="frecuencia" name="frecuencia[]"
                    multiple="multiple" data-placeholder="Seleccione frecuencias">
                    <option value=""></option>
                    <?php foreach($data['frecuencia'] as $key => $frecuencia) { ?>
                    <option value="<?= $frecuencia['VALUE'] ?>"><?= $frecuencia['DESCRIPCION'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="end" class="form-label">Semana</label>
                <select class="form-control select-semana select2" id="semana" name="semana[]" multiple="multiple"
                    data-placeholder="Seleccione semanas">
                    <option value=""></option>
                    <?php foreach($data['semana'] as $key => $semana) { ?>
                    <option value="<?= $semana['VALUE'] ?>"><?= $semana['DESCRIPCION'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="end" class="form-label">Día Visita</label>
                <select class="form-control select-diavisita select2" id="diavisita" name="diavisita[]"
                    multiple="multiple" data-placeholder="Seleccione dias de visita">
                    <option value=""></option>
                    <?php foreach($data['diavisita'] as $key => $diavisita) { ?>
                    <option value="<?= $diavisita['VALUE'] ?>"><?= $diavisita['DESCRIPCION'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php if(is_array($data['transportistas'])){ ?>
            <div class="col-md-2">
                <label for="end" class="form-label">Transportista</label>
                <select class="form-control select-diavisita select2" id="transportista" name="transportista[]"
                    multiple="multiple" data-placeholder="Seleccione el transportista">
                    <option value=""></option>
                    <?php foreach($data['transportistas'] as $key => $transportistas) { ?>
                    <option value="<?= $transportistas['TRA_CODIGO'] ?>"><?= $transportistas['TRA_NOMBRE'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>
            <div class="col-md-2 mt-4">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-rotate-right"></i> Procesar</button>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 ">
            <div class="card mapa z-index-2 ">
                <?php if(isset($_GET['grupos']) && empty($data['mapa'])) { 
                    
                    ?>
                <div class="d-flex justify-content-center align-items-center p-2">
                    <h2 class="">No se encontraron registros :(</h2>
                </div>
                <?php }  ?>
                <div id="mapa"></div>
            </div>
        </div>
    </div>
    <?php if($data['cards']) { ?>
    <div class="row">
        <div class="col-md-12">
            <button id="generarPDF" class="btn btn-danger">Generar PDF</button> 
        </div>
    </div>
    <div class="row">
        <?php foreach($data['cards'] as $key => $value) { ?>
            
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body p-3" style="min-height:100px;">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    <?= $value['ETIQUETA'] ?></p>
                                <?php if(!empty($value['VALOR'])){?>
                                <h5 class="font-weight-bolder">
                                    <button class="btn btn-link text-success p-0 text-decoration-none" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseSQLValue<?=$key?>" aria-expanded="false"
                                        aria-controls="collapseSQLValue<?=$key?>">
                                        (Mostrar/Ocultar)
                                    </button>
                                </h5>
                                <!-- Contenido colapsable flotante -->
                                <div id="collapseSQLValue<?=$key?>"
                                    class="card rounded collapse position-absolute shadow-md p-2 card-maps">
                                    <h6 class="font-weight-bolder">
                                        <?= $value['VALOR'] ?>
                                    </h6>
                                </div>
                                <?php } ?>
                                <p class="mb-0">
                                <span class="text-sm font-weight-bolder"><?= date('Y-m-d H:m:i') ?></span>
                                Mapas
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <?= $value['ICON'] ?>
                                <!-- <i class="ni ni-money-coins text-lg opacity-10 text-white" aria-hidden="true"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    
</div>
<?php footerCliente($data); ?>

<script>
const base_url = "<?= base_url(); ?>";

document.getElementById("generarPDF").addEventListener("click", function () {
    let data = <?php echo json_encode($data['cards']); ?>; // Convertimos PHP a JSON
    let formData = new FormData();
    formData.append("data", JSON.stringify(data));

    fetch("generar_pdf.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.blob())
    .then(blob => {
        let url = window.URL.createObjectURL(blob);
        let a = document.createElement("a");
        a.href = url;
        a.download = "reporte.pdf";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    })
    .catch(error => console.error("Error al generar el PDF:", error));
});

</script>
<script src="<?= media(); ?>/js/function_maps.js"></script>