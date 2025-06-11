<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Herramienta de Business Intelligence">
  <meta name="author" content="ADN PANEL">

  <meta name="theme-color" content="#fff">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="ADN Panel">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="white">


  <link rel="apple-touch-icon" href="<?= media(); ?>/img/icon_5000.png">
  <link rel="apple-touch-icon" sizes="2000x2000" href="<?= media(); ?>/img/icons/icon_2000.png"> 
  <link rel="apple-touch-icon" sizes="1000x1000" href="<?= media(); ?>/img/icons/icon_1000.png"> 
  

  <link href="<?= media(); ?>/img/icon_2000.png" sizes="2000x2000" rel="apple-touch-startup-image" />
  <link href="<?= media(); ?>/img/icon_1000.png" sizes="1000x1000" rel="apple-touch-startup-image" />
  
  <link rel="shortcut icon" type="image/png" href="<?= media(); ?>/img/brand/logoadn.ico">
  <link rel="manifest" href="./manifest.json">
  
  <link rel="apple-touch-icon" sizes="76x76" href="<?= media(); ?>/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= media(); ?>/img/favicon.png">
  <title>Login Panel</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= media(); ?>/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= media(); ?>/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= media(); ?>/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= media(); ?>/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link id="pagestyle" href="<?= media(); ?>/css/styles.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
  
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div id="divLoading">
      <div class="contenedor-loader">
        <div></div>
      </div> 
      <p class="cargando">Cargando...</p>
    </div>
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Inicia Sesión</h4>
                  <p class="mb-0">Ingrese su usuario y clave para iniciar sesión</p>
                </div>
                <div class="card-body">
                  <form class="login-form" name="formLogin" id="formLogin" action="">
                    <div class="mb-3">
                      <input id="txtEmail" name="txtEmail" type="text" class="form-control form-control-lg" placeholder="Usuario" aria-label="Usuario">
                    </div>
                    <div class="mb-3">
                      <input id="txtPassword" name="txtPassword" type="password" class="form-control form-control-lg" placeholder="Clave" aria-label="Clave">
                    </div>
                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="text-center">                      
                      <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Ingresar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('./assets/img/office.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-info opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">ADN Panel</h4>
                <p class="text-white position-relative">"Herramienta de Business Intelligence"</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?= media(); ?>/js/core/popper.min.js"></script>
  <script src="<?= media(); ?>/js/core/bootstrap.min.js"></script>
  <script src="<?= media(); ?>/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= media(); ?>/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
  <script src="./script.js"></script>
  <script>const base_url = "<?= base_url(); ?>";</script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= media(); ?>/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>

