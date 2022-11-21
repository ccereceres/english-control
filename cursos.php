<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        if(isset($_GET['accion']) && ($_GET['accion'] == 'modificar' || $_GET['accion'] == 'confirmar')){
            $accion = $_GET['accion']?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
                <title>ITParral Panel</title>
                <link rel="stylesheet" href="tpl/css/panel.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
                <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
                                    <a class="nav-link" href="cursos.php">
                                        <div class="sb-nav-link-icon"><i class="bi bi-journal-plus"></i></div>
                                        Modificar Calificaciones
                                    </a>
                                    <a class="nav-link" href="cursos.php">
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
                                Mostrar curso. Al seleccionar dirigirse a la pagina modificar o confirmar $_GET con argumentos "id del curso" "Accion a realizar"
                                <div class="card-body">
                                <table id="cursos" class="table table-striped compact" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <!-- TODO Cambiar en la BD -->
                                            <th>Curso</th>
                                            <th>Hora</th>
                                            <th>Dias</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                </table>
                                </div>
                            </div>
                        </main>

                    </div>
                </div>
                <!-- Scripts para seleccionar que accion va a realizar -->
                <script type="application/javascript">
                    let prof_id = <?php echo $_SESSION['id']?>;
                    let accion = "<?php echo $accion ?>";
                </script>
                <script src="tpl/js/scriptsPanel.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                    crossorigin="anonymous"></script>
                <script
                    src="https://code.jquery.com/jquery-3.6.1.min.js"
                    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
                    crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                <script src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
                <script src="//cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
                <script src="tpl/js/tablaCursos.js"></script>
            </body>
            </html>
    <?php
        } else {
            //metodo get no existe
            header('location: docentes.php');
        }
    } else {
        //El usuario no tiene la contraseña iniciada
        header("location: login_docente.php");
        $_SESSION['err_msg'] = "Acceso denegado. Inicia sesión";
    }
?>
