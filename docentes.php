<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){ ?>
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
                <a class="navbar-brand ps-3" href="docentes.php">English Control</a>
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
                                <div class="sb-sidenav-menu-heading">Calificaciones</div>
                                <a class="nav-link" href="modificar_calificacion.php">
                                    <div class="sb-nav-link-icon"><i class="bi bi-journal-plus"></i></div>
                                    Modificar Calificaciones
                                </a>
                                <a class="nav-link" href="docentes.php">
                                    <div class="sb-nav-link-icon"><i class="bi bi-journal-arrow-up"></i></div>
                                    Confirmar Calificaciones
                                </a>
                                <div class="sb-sidenav-menu-heading">Asistencias</div>
                                <a class="nav-link" href="docentes.php">
                                    <div class="sb-nav-link-icon"><i class="bi bi-journal-minus"></i></div>
                                    Cargar faltas
                                </a>
                                <div class="sb-sidenav-menu-heading">Planeaciones</div>
                                <a class="nav-link" href="docentes.php">
                                    <div class="sb-nav-link-icon"><i class="bi bi-journal-minus"></i></div>
                                    Gestión de calidad
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
                            

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu est arcu. Pellentesque vel leo consectetur, elementum arcu et, dictum dui. Mauris elementum lacus elit. Nunc rutrum turpis sed convallis porta. Ut sit amet nisl at erat euismod pretium. Nam venenatis, quam ut tincidunt ultricies, felis mauris posuere nisi, sed efficitur enim libero sed nibh. Phasellus maximus sit amet lacus nec dapibus. Phasellus id tempus diam, non tristique sem. Sed placerat lacus vitae lacus sodales, eget feugiat lorem pharetra. Cras quis scelerisque nunc. Aenean aliquet suscipit neque sed venenatis. Nunc sem nisi, lobortis sed ornare eu, condimentum in lorem. Etiam sodales ornare nulla, sed suscipit augue dictum ac. In hac habitasse platea dictumst. Donec mattis rhoncus elementum. Morbi tincidunt, turpis ac consequat viverra, diam metus commodo libero, eu fringilla tortor sapien at dui.

    Integer vulputate velit viverra leo pulvinar, eu viverra odio facilisis. Vivamus feugiat dictum libero, et vestibulum urna venenatis eu. Quisque dictum consectetur magna, et gravida nisl pharetra condimentum. Aliquam et augue quis diam maximus tempus ut sed nisi. Nullam sem nisl, hendrerit quis ipsum sit amet, suscipit tristique neque. Sed sollicitudin commodo velit. In rutrum nunc eget magna imperdiet, sit amet fringilla nunc maximus. Quisque ornare nulla purus, bibendum imperdiet mauris ullamcorper non. Aenean sed malesuada felis. Maecenas fermentum finibus efficitur.

    In nisl ipsum, posuere a mi in, pharetra sodales velit. Fusce luctus arcu neque, placerat scelerisque dui sollicitudin at. Integer accumsan pellentesque lectus, nec rutrum mi congue non. Suspendisse potenti. Sed sed urna ac orci commodo tincidunt vel eu dui. Nunc sed pellentesque elit, et hendrerit sem. Ut ut nisi at eros lacinia imperdiet. Integer ac orci dignissim libero suscipit porttitor. Praesent scelerisque luctus lorem at congue. Nullam volutpat faucibus feugiat. Sed ultrices, magna in ultrices viverra, metus nunc consequat ante, non lacinia nibh enim non velit. Donec in est tempor ipsum sodales faucibus. Cras ultrices quis nulla vitae pellentesque.

    Etiam at risus vel ex interdum placerat a nec odio. Phasellus bibendum non lacus malesuada condimentum. Aenean et sodales tortor, in mattis nibh. Curabitur vel lorem quis tortor vulputate commodo. Aenean gravida mollis magna et pharetra. Donec laoreet aliquam arcu, eu laoreet nisl tincidunt dictum. Nunc cursus feugiat bibendum. Nunc ornare et metus et tempus. Maecenas fermentum in purus vitae mattis. Vestibulum diam dui, luctus vel mauris ut, tincidunt tincidunt eros. Praesent in odio augue. Vivamus iaculis vel quam nec posuere. Suspendisse maximus imperdiet quam convallis pulvinar.

    Fusce ultricies est neque, nec tristique nisi volutpat non. Aliquam fringilla mattis pretium. Aenean et congue ex. Fusce et neque maximus, porta quam in, finibus nibh. Donec facilisis tincidunt augue vel fringilla. Nullam faucibus diam eget consectetur consequat. Etiam fermentum risus quam, ultricies congue sapien rhoncus in. 
                        </div>
                    </main>
                    
                </div>
            </div>
            <script src="tpl/js/scriptsPanel.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
        </html>
    <?php
    } else {
        header("location: login.php");
        $_SESSION['err_msg'] = "Acceso denegado. Inicia sesión";
    }
?>
