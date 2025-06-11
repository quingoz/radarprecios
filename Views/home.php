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
            $latitud = $data['mapa'][0]['LATITUD'];
            $longitud = $data['mapa'][0]['LONGITUD'];

            $center = '{"lat": ' . $latitud . ', "lng": ' . $longitud . '}';
    ?>
    <div id="centerData" data-value='<?= $center ?>'></div>
    <div id="mapaData" data-value="<?= htmlspecialchars(json_encode($data['mapa']), ENT_QUOTES, 'UTF-8') ?>"></div>

    <?php  }
    ?>

    <div id="mediaUrl" data-value="<?= media() ?>"></div>

    <form id="formMapa" method="get" action="<?= base_url() ?>/home">
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
                <label class="form-label">Producto</label>
                <select class="form-control select-productos select2" id="productos" name="productos"
                    data-placeholder="Seleccione el producto">
                    <?php foreach($data['productos'] as $key => $producto) { ?>
                    <option value="<?= $producto['id'] ?>"><?= $producto['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Marca</label>
                <select class="form-control select-marcas select2" id="marcas" name="marcas"
                    data-placeholder="Seleccione la marca">
                    <?php foreach($data['marcas'] as $key => $marca) { ?>
						<option value="<?= $marca['id']; ?>"><?= $marca['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Cliente</label>
                <select class="form-control select-clientes select2" id="clientes" name="clientes"
                    data-placeholder="Seleccione el cliente">
                    <?php foreach($data['clientes'] as $key => $cliente) { ?>
                    <option value="<?= $cliente['id'] ?>"><?= $cliente['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2 mt-4">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-rotate-right"></i> Filtrar precios</button>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 ">
            <div class="card mapa z-index-2 ">
                <?php if(empty($data['mapa'])) { 
                    
                    ?>
                <div class="d-flex justify-content-center align-items-center p-2">
                    <h2 class="">No se encontraron registros :(</h2>
                </div>
                <?php }  ?>
                <div id="mapa"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if(!empty($data['cardPurolomo'])) { ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <strong>PRODUCTO PUROLOMO</strong>
                </div> 
                <div class="card-body p-3" style="min-height:100px;">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <strong>Producto: </strong><?= $data['cardPurolomo']['presentation'] ?><br>
                                <strong>Marca: </strong><?= $data['cardPurolomo']['brand'] ?><br>
                                <strong>Precio Min: </strong><?= $data['cardPurolomo']['precio_minimo'] ?><br>
                                <strong>Precio Max: </strong><?= $data['cardPurolomo']['precio_maximo'] ?><br>
                                <strong>Precio Prom: </strong><?= $data['cardPurolomo']['precio_promedio'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
		<?php if(!empty(array_filter($data['cardCompetencia']))) { ?>
        <div class="col-md-4 mb-4">
            <div class="card" style="background-color: #384157;">
                <div class="card-header">
                    <strong>PRODUCTO COMPETENCIA</strong>
                </div> 
                <div class="card-body p-3" style="min-height:100px;">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <h5 class="font-weight-bolder">
                                    <button class="btn btn-link text-success p-0 text-decoration-none" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseSQLValue1" aria-expanded="false"
                                        aria-controls="collapseSQLValue1">
                                        (Mostrar/Ocultar)
                                    </button>
                                </h5>
                                <!-- Contenido colapsable flotante -->
                                <div id="collapseSQLValue1"
                                    class="card rounded collapse position-absolute shadow-md p-2 card-maps" style="background-color: #384157;">
									<p class="mb-0"><strong>Producto: </strong><?= $data['cardPurolomo']['presentation'] ?></p><br>
                                    <?php foreach ($data['cardCompetencia'] as $cardCompetencia) { ?>
                                    <p class="mb-0"><strong>Marca: </strong><?= $cardCompetencia['brand'] ?></p>
                                    <p class="mb-0"><strong>Precio Min: </strong><?= $cardCompetencia['precio_minimo'] ?></p>
                                    <p class="mb-0"><strong>Precio Max: </strong><?= $cardCompetencia['precio_maximo'] ?></p>
                                    <p class="mb-0"><strong>Precio Prom: </strong><?= $cardCompetencia['precio_promedio'] ?></p>
                                    <p class="mb-0">----------------------------</p>
                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php } ?>
        <?php if(!empty(array_filter($data['cardComparativa']))) { ?>
        <div class="col-md-4 mb-4">
            <div class="card" style="background-color: #31426e;">
                <div class="card-header">
                    <strong>COMPARATIVA COMPETENCIA</strong>
                </div> 
                <div class="card-body p-3" style="min-height:100px;">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <strong>Producto: </strong><?= $data['cardComparativa']['nombre_producto'] ?><br><br>
                                <strong>Competencia baja: </strong><?= $data['cardComparativa']['marca_precio_promedio_menor'] ?><br>
                                <strong>Competencia alta: </strong><?= $data['cardComparativa']['marca_precio_promedio_mayor'] ?><br>
                                <strong>Promedio General: </strong><?= $data['cardComparativa']['promedio_general'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php footerCliente($data); ?>

<script>
const base_url = "<?= base_url(); ?>";
</script>
<script src="<?= media(); ?>/js/function_maps.js"></script>
<script src="<?= media(); ?>/js/functions_mapa.js"></script>