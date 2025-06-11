 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main" >
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="<?= base_url(); ?>/home">
          <img src="<?= media();?>/img/brand/logo-adn-azul.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
             <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url(); ?>/dashboard">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>            
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url(); ?>/usuarios">
                <i class="fas fa-users text-info"></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
            </li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>            
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url(); ?>/roles">
                <i class="fas fa-user-tag text-green"></i>
                <span class="nav-link-text">Roles</span>
              </a>
            </li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>        
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>/kpi">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Kpi´s</span>
              </a>
            </li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>        
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>/enterprise">
                <i class="fas fa-building text-purple"></i>
                <span class="nav-link-text">Empresas</span>
              </a>
            </li>
            <?php } ?>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
          </h6>
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>/logout">
                <i class="ni ni-user-run"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom"  style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end;">
          <!-- Search form -->

          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            
          </ul>
          <ul class="navbar-nav  mr-0 mr-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= media(); ?>/img/theme/user.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['userData']['USERNAME'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                
                <a href="<?= base_url(); ?>/home" class="dropdown-item">
                  <i class="ni ni-shop"></i>
                  <span>Inicio</span>
                </a>
                <a href="<?= base_url(); ?>/usuarios/perfil" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Mi Perfil</span>
                </a>
                <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>    
                <a href="<?= base_url(); ?>/kpi" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Administrar</span>
                </a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url(); ?>/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->

