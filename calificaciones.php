<?php
session_start();
include_once 'inc/db.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $sql = "SELECT calif_1, calif_2, calif_3, calif_4, calif_5 FROM alumnos JOIN cursando c on alumnos.id = c.alumnos_id JOIN calificaciones c2 on c.calificaciones_id = c2.id WHERE alumnos.id = ?";

    /** @var mysqli $link */
    if($stmt = mysqli_prepare($link, $sql)){
        // Enlaza la variable $num_control como parametro
        mysqli_stmt_bind_param($stmt, "s", $param_id_alumno);
        // Establecer los parametros
        $param_id_alumno = $_SESSION['id'];

        // Intentar ejecutar la declaracion
        if(mysqli_stmt_execute($stmt)){
            // Guardar resultado
            mysqli_stmt_store_result($stmt);
            // Comprobar si el usuario existe, si existe comprobar contraseña
            if(mysqli_stmt_num_rows($stmt) == 1){
                // Enlazar variables de resultados
                mysqli_stmt_bind_result($stmt, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5);
                mysqli_stmt_fetch($stmt);


                }
            } else{
                // Numero de control no existe
                $_SESSION["err_msg"] = "Numero de control no existe";
                header("location: ../login.php");
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Cerrar declaracion
        mysqli_stmt_close($stmt);
    ?>
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
                            <a class="nav-link" href="panel.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-journal-plus"></i></div>
                                Demanda de materias
                            </a>
                            <a class="nav-link" href="panel.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-journal-arrow-up"></i></div>
                                Alta de materias
                            </a>
                            <div class="sb-sidenav-menu-heading">Calificaciones</div>
                            <a class="nav-link" href="calificaciones.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-journal-minus"></i></div>
                                Parciales
                            </a>
                            <a class="nav-link" href="panel.php">
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
                        <div class="row">
                            <div class="card col-auto p-3 m-3">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 1</h6>
                                    <p class="card-text">
                                        <?php echo $calif_1?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-3 m-3">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 2</h6>
                                    <p class="card-text">
                                        <?php echo $calif_2?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-3 m-3">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 3</h6>
                                    <p class="card-text">
                                        <?php echo $calif_3?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-3 m-3">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 4</h6>
                                    <p class="card-text">
                                        <?php echo $calif_4?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-3 m-3">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 5</h6>
                                    <p class="card-text">
                                        <?php echo $calif_5?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

            </div>
        </div>
        <script src="tpl/js/scriptsPanel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
