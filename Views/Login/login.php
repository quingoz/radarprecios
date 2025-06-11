<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Herramienta de Business Intelligence">
    <meta name="author" content="ADN DASHBOARD">

    <meta name="theme-color" content="#fff">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="ADN Dashboard">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="white">

	<link rel="shortcut icon" type="image/png" href="<?= media(); ?>/img/brand/icon-purolomo.png">
    <link rel="apple-touch-icon" href="<?= media(); ?>/img/icon_5000.png">
    <link rel="apple-touch-icon" sizes="2000x2000" href="<?= media(); ?>/img/icons/icon_2000.png">
    <link rel="apple-touch-icon" sizes="1000x1000" href="<?= media(); ?>/img/icons/icon_1000.png">


    <link href="<?= media(); ?>/img/icon_2000.png" sizes="2000x2000" rel="apple-touch-startup-image" />
    <link href="<?= media(); ?>/img/icon_1000.png" sizes="1000x1000" rel="apple-touch-startup-image" />

    <link rel="manifest" href="./manifest.json">

    <link rel="apple-touch-icon" sizes="76x76" href="<?= media(); ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= media(); ?>/img/favicon.png">
    <title>Login Dashboard</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body id="BgBody" class="bg-body "
    style="background-image: url('<?= media(); ?>/img/fondo.png') !important;">
    <main class="main-content">
        <!-- Header -->
        <div class="header  py-7 py-lg-8 pt-lg-9 login-clip-path">
            <div class="container pt-5">
                <div class="header-body text-center mb-7" style="margin-top: -70px">

                </div>
            </div>

        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 column-form-login">
                    <div class="card p-4">
                        <div class="card-header pb-0 text-center">
                            <h3><img src="<?= media(); ?>/img/logo.png" width="250"></h3>
                        </div>
                        <div class="card-body">
                            <form class="login-form" name="formLogin" id="formLogin" action="">
                                <div class="mb-3">
                                    <div class="input-group" bis_skin_checked="1">
                                        <span class="input-group-text ps-3 px-3 bg-secondary" id="basic-addon1"><i
                                                class="fas fa-user text-white"></i></span>
                                        <input id="txtEmail" name="txtEmail" type="text"
                                            class="form-control form-control-lg ps-3" placeholder="Usuario"
                                            aria-label="Usuario">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group" bis_skin_checked="1">
                                        <span class="input-group-text ps-3 px-3 bg-secondary" id="basic-addon1"><i class="fas fa-lock text-white"></i></span>
                                        <input id="txtPassword" name="txtPassword" type="password"
                                            class="form-control form-control-lg ps-3" placeholder="Clave"
                                            aria-label="Clave">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" style="background-color: #CD2B14 !important;"
                                        class="btn btn-button-login mt-4 mb-0">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="<?= media(); ?>/js/core/popper.min.js"></script>
    <script src="<?= media(); ?>/js/core/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
    <script src="./script.js"></script>
    <script>
    const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= media(); ?>/js/argon-dashboard.min.js?v=2.0.4"></script>
    <script type="text/javascript" src="<?= media();?>/js/functions_theme_dark.js"></script>
</body>

</html>