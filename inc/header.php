<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ITParral Panel</title>
    <link rel="stylesheet" href="tpl/css/panel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="panel.php">English Control</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-list" style="font-size: 1.5rem;"></i></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-gear" style="font-size: 1.5rem;"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="inc/logout.php">Cerrar sesión</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Registro</div>
                    <a class="nav-link" href="demanda.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-journal-plus"></i></div>
                        Demanda de materias
                    </a>
                    <a class="nav-link" href="alta.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-journal-arrow-up"></i></div>
                        Alta de materias
                    </a>
                    <div class="sb-sidenav-menu-heading">Calificaciones</div>
                    <a class="nav-link" href="calificaciones.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-journal-minus"></i></div>
                        Parciales
                    </a>
                    <a class="nav-link" href="kardex.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-journal-text"></i></div>
                        Kardex
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">¡Hola!</div>
                <?php
                $string = $_SESSION["names"];
                $name = explode(" ", $string);
                unset($name[1]);
                $name = implode(" ", $name);
                echo $name . " " . $_SESSION["apellido_p"];
                ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
