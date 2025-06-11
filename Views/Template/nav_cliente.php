<div id="baseUrl" data-value="<?= base_url() ?>"></div>
<!--<div class="min-height-300 position-absolute w-100" <?= ($data['page_name'] == "home" || $data['page_name'] == "perfil") ? ' style="'.$color.'" id="contenidoFondo"' : '' ?> ></div>-->

<?php if($_SESSION['userData']['USERTOKEN'] == '' && $_SESSION['userData']['URL_WEBVIEW'] == '') {?>

<?php if($data['page_name'] != 'tabla') { ?>
  <?php if($_COOKIE['theme'] == 'dark-version' || $_COOKIE['theme'] == ''){?>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <?php }else{ ?>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 bg-white" id="sidenav-main">
  <?php }?>
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center" href="<?= base_url() ?>/home">
        <?php if($_COOKIE['theme'] == 'dark-version' || $_COOKIE['theme'] == ''){?>
          <img src="<?= media();?>/img/brand/logo-adn-blanco.png" class="navbar-brand-img h-100" alt="...">
        <?php }else{ ?>
          <img src="<?= media();?>/img/brand/logo-adn-azul.png" class="navbar-brand-img h-100" alt="...">
        <?php }?>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $data['page_name'] == "home" ? 'active' : '' ?>" href="<?= base_url() ?>/home">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php if($_SESSION['menu']['inventario']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "inventario" ? 'active' : '' ?>" href="<?= base_url() ?>/home/inventario">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-box-open text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Inventario</span>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['menu']['logistica']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "logistica" ? 'active' : '' ?>" href="<?= base_url() ?>/home/logistica">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-box-open text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Logistica</span>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['menu']['compras']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "compras" ? 'active' : '' ?>" href="<?= base_url() ?>/home/compras">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-money-check-alt text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Compras</span>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['menu']['ventas']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "ventas" ? 'active' : '' ?>" href="<?= base_url() ?>/home/ventas">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-hand-holding-usd text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Ventas</span>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['menu']['finanzas']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "finanzas" ? 'active' : '' ?>" href="<?= base_url() ?>/home/finanzas">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world-2 text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Finanzas</span>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['menu']['cobranza']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "cobranza" ? 'active' : '' ?>" href="<?= base_url() ?>/home/cobranza">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-money-bill-wave text-secondary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Cobranza</span>
            </a>
          </li>
        <?php } ?>

        <?php if($_SESSION['menu']['auditoria']) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "auditoria" ? 'active' : '' ?>" href="<?= base_url() ?>/home/auditoria">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-timeline text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Auditoria</span>
            </a>
          </li>
        <?php } ?>
        <?php if($_SESSION['userData']['ROLID'] == 1){ ?>
          <li class="nav-item mt-3 d-flex align-items-center">
            <div class="ps-4">
              <i class="ni ni-support-16"></i>
            </div>
            <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Administrador</h6>
          </li>
          <li class="nav-item">
            <a class="linkLoanding nav-link <?= $data['page_name'] == "empresas" ? 'active' : '' ?>" href="<?= base_url(); ?>/enterprise">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-city text-info text-sm opacity-10"></i>
              </div>  
              <span class="nav-link-text">Empresas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "dashboard" ? 'active' : '' ?>" href="<?= base_url(); ?>/dashboard">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-laptop text-info text-sm opacity-10"></i>
              </div>  
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $data['page_name'] == "usuario" ? 'active' : '' ?>" href="<?= base_url(); ?>/usuarios">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-users text-info text-sm opacity-10"></i>
              </div>  
              <span class="nav-link-text">Usuarios</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </aside>
<?php } ?>
<?php } ?>
  <main class="main-content position-relative border-radius-lg ">
  <?php if($_SESSION['userData']['USERTOKEN'] == '' && $_SESSION['userData']['URL_WEBVIEW'] == '') {?>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 me-md-0 me-sm-4 mt-0 justify-content-end" id="navbar">
          <?php if($data['page_name'] != "tabla"){ ?>
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <li class="nav-item d-xl-none d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white button-togle-sidebar"></i>
                  <i class="sidenav-toggler-line bg-white button-togle-sidebar"></i>
                  <i class="sidenav-toggler-line bg-white button-togle-sidebar"></i>
                </div>
              </a>
            </li>
          </div>
          <?php } ?>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item pe-2 d-flex align-items-center">
              <span class="font-weight-bold nav-link dashboard-nav"><?= $_SESSION['userData']['DASHBOARD_NAME'] ?></span>
            </li>
            <?php 
            if($data['page_name'] == "home"){
              $coloritem='text-white';
            }else{
              $coloritem = 'text-secondary';
            }
            ?>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <div class="form-check form-switch ps-0 ms-auto my-auto" bis_skin_checked="1">
              <?php if($_COOKIE['theme'] == 'dark-version' || $_COOKIE['theme'] == ''){?>
                <div class="d-flex align-items-center">
                  <div id="iconTheme"><i class="fa-regular fa-sun mx-2 text-white"></i></div>
                  <input class="form-check-input mt-0 ms-auto" type="checkbox" id="dark-version" onclick="darkModeTheme(this)" checked="true">
                </div>
              <?php }else{ ?>
                <div id="iconTheme"><i class="fa-solid fa-moon mx-2 text-white"></i></div>
                <input class="form-check-input ms-auto" type="checkbox" id="dark-version" onclick="darkModeTheme(this)">
              <?php }?>
              </div>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center" style="margin-left: 10px;">
              <a href="javascript:;" class="font-weight-bold nav-link <?= $coloritem ?> p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?= $_SESSION['userData']['USERNAME'] ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton" style="display: none;" id="MenuToggleTopBar">

                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/home">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <i class="ni ni-shop avatar avatar-sm bg-gradient-dark  me-3 "></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Inicio</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>

                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/usuarios/perfil">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                       <i class="ni ni-single-02 avatar avatar-sm bg-gradient-dark  me-3 "></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Perfil</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <?php if($_SESSION['userData']['RESUMEN'] == 1){ ?>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/resumen">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <i class="ni ni-chart-bar-32 avatar avatar-sm bg-gradient-dark  me-3 "></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Resumen</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <?php } ?>
                <?php if($_SESSION['userData']['MAPA'] == 1){ ?>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/mapa">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <i class="ni ni-map-big avatar avatar-sm bg-gradient-dark  me-3 "></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Mapa</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <?php } ?>
                <?php if($_SESSION['userData']['CDF'] == 1){ ?>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/center">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                      <i class="ni ni-chart-pie-35 avatar avatar-sm bg-gradient-dark me-3"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Centro DF</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <?php } ?>
                <?php if($_SESSION['userData']['STIMULDASH'] == 1){ ?>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/ControlPanel/controlPanelView">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                      <i class="ni ni-compass-04 avatar avatar-sm bg-gradient-dark me-3"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Panel de Control</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <?php } ?>
                <?php if($_SESSION['userData']['DESING_STIMULDASH'] == 1){ ?>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/ControlPanel/controlPanelDesing">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                      <i class="ni ni-compass-04 avatar avatar-sm bg-gradient-dark me-3"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Diseñar Panel</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <?php } ?>

                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url(); ?>/logout">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                       <i class="ni ni-user-run avatar avatar-sm bg-gradient-dark  me-3 "></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Salir</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php } ?>

