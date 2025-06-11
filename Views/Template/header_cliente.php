<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
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

    <link rel="shortcut icon" type="image/png" href="<?= media(); ?>/img/brand/icon-purolomo.png">
    <link rel="manifest" href="./manifest.json">
    <title>App de Precios</title>
    <!--     CDN web     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Nucleo Icons -->
    <link href="<?= media(); ?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= media(); ?>/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link href="<?= media(); ?>/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= media(); ?>/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link id="pagestyle" href="<?= media(); ?>/css/select2.min.css" rel="stylesheet" />
    <link id="pagestyle" href="<?= media(); ?>/css/styles.css" rel="stylesheet" />

    <script src="<?= media() ?>/StimulsoftDashboards/Scripts/stimulsoft.reports.js"></script>
    <script src="<?= media() ?>/StimulsoftDashboards/Scripts/stimulsoft.viewer.js"></script>
    <script src="<?= media() ?>/StimulsoftDashboards/Scripts/stimulsoft.designer.js"></script>
    <script src="<?= media() ?>/StimulsoftDashboards/Scripts/stimulsoft.dashboards.js"></script>

    <!--<script>
    // Se ejecuta antes de que el DOM cargue
    (function() {
        var style = document.createElement('style');
        style.innerHTML = '#divLoading { display: flex; }';
        document.head.appendChild(style);
    })();
    </script>-->
</head>

<body class="g-sidenav-show <?= $_COOKIE['theme'] == ''? 'dark-version': $_COOKIE['theme']  ?> bg-gray-100">
    <?php require_once("nav_cliente.php"); ?>