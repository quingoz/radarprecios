<?php
  headerCliente($data);

 ?>

<style type="text/css">
.radio-toolbar input[type="radio"] {
    opacity: 0;
    position: fixed;
}

.radio-toolbar label {
    display: inline-block;
    background-color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    width: 100%;
    margin: 5px auto;
    box-shadow: 1px 2px 5px #dee2e6;
}

.radio-toolbar input[type="radio"]:checked+label {
    background-color: #bfb;
    border-color: #4c4;
}

.radio-toolbar input[type="radio"]:focus+label {
    border: 2px dashed #444;
}

.radio-toolbar label:hover {
    background-color: #e9ecef;
}
</style>

<div id="url" data-value="<?= base_url() ?>"></div>
<!-- Page content -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Editar Perfíl </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form id="formDataUser" name="formDataUser">
                        <h6 class="heading-small text-muted mb-4">Información de usuario</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" id="txtUsername" class="form-control aa" name="txtUsername"
                                            disabled value="<?= $data['dataUsuario']['USERNAME'] ?>">
                                    </div>
                                </div>
                                <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input">Dashboard</label>
                                        <input type="number" id="intDashboard" class="form-control" name="intDashboard"
                                            value="<?= $data['dataUsuario']['ID_DASHBOARD'] ?>">
                                    </div>
                                </div>
                                <?php  } else { ?>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="hidden" id="intDashboard" class="form-control" name="intDashboard"
                                            value="<?= $data['dataUsuario']['ID_DASHBOARD'] ?>">
                                    </div>
                                </div>
                                <?php  } ?>
                            </div>


                            <!-- 
                    |
                    |configuracion para CH 982022 
                    |
                    |-->



                            <!-- ///////////GERENCIA CH///////////////-->
                            <?php if(!empty($_SESSION['userDashboards'])) { ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group radio-toolbar">

                                        <?php foreach($_SESSION['userDashboards'] as $key => $value) { ?>
                                        <div class="form-check" style="padding-left:0;">
                                            <input class="form-check-input" type="radio" name="intDashboard"
                                                id="<?= $value['ID'] ?>" value="<?= $value['DASHBOARD_ID'] ?>"
                                                <?= $_SESSION['userData']['ID_DASHBOARD'] == $value['DASHBOARD_ID'] ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="<?= $value['ID'] ?>">
                                                <img src="<?= media() ?>/img/brand/<?= $value['DASHBOARD_IMAGE'] ?>"
                                                    width="50"> &nbsp; <?= $value['DASHBOARD_NAME'] ?>
                                            </label>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                            <!--|
                      |
                      | fin configuracion para CH 982022 
                      |
                      |-->

                            <?php if(!empty($_SESSION['userDashboards'])) { ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label hidden class="form-control-label"
                                            for="input-first-name">Contraseña</label>
                                        <input type="hidden" id="txtPassword" class="form-control" name="txtPassword"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label hidden class="form-control-label" for="input-last-name">Confirma
                                            Contraseña</label>
                                        <input type="hidden" id="txtPasswordConfirm" class="form-control"
                                            name="txtPasswordConfirm" value="">
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Contraseña</label>
                                            <input type="password" id="txtPassword" class="form-control"
                                                name="txtPassword" value=""
                                                <?= empty($_SESSION['permisos'][4]['r'])? 'required':''?>>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Confirma
                                                Contraseña</label>
                                            <input type="password" id="txtPasswordConfirm" class="form-control"
                                                name="txtPasswordConfirm" value=""
                                                <?= empty($_SESSION['permisos'][4]['r'])? 'required':''?>>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <div class="row mb-10">
                                        <div class="col-md-12">
                                            <?php 
                      if($_SESSION['userData']['COLOR'] == null || $_SESSION['userData']['COLOR'] == '#000000' || $_SESSION['userData']['COLOR'] == ''){
                        
                        echo '<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>';

                      }else{
                        echo '<button class="btn" style="background:'.$_SESSION['userData']['COLOR'].';color:white;" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>';                        
                      }?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

</div>
<?php footerCliente($data); ?>