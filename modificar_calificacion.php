<?php
// Iniciar la sesion
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_GET['idCalificaciones'])) {
        // Guardar el valor de la variable $_GET
        $id_calificaciones = $_GET['idCalificaciones'];
        // Incluir la base de datos
        include_once 'inc/db.php';

        // Preparar la consulta a la base de datos con variable $_GET con id de las calificaciones
        $sql = "SELECT calif_1, calif_2, calif_3, calif_4, calif_5 FROM calificaciones WHERE id = ?";
        /** @var mysqli $link */
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Enlaza la variable $num_control como parametro
            mysqli_stmt_bind_param($stmt, "s", $param_id_calificaciones);
            // Establecer los parametros
            $param_id_calificaciones = $id_calificaciones;

            // Intentar ejecutar la declaracion
            if (mysqli_stmt_execute($stmt)) {
                // Guardar resultado
                mysqli_stmt_store_result($stmt);
                // Comprobar si la calificacion existe
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Enlazar variables de resultados
                    mysqli_stmt_bind_result($stmt, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5);
                    mysqli_stmt_fetch($stmt);
                    echo $calif_1;
                } else {
                    // Calificacion no existe
                    $_SESSION["err_msg"] = "Numero de control no existe";
                    header("location: docentes.php");
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Cerrar declaracion
            mysqli_stmt_close($stmt);
        }
    } else {
        header('location:docentes.php');
    } ?>

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
                    <a class="nav-link" href="cursos.php?accion=modificar">
                        <div class="sb-nav-link-icon"><i class="bi bi-journal-plus"></i></div>
                        Modificar Calificaciones
                    </a>
                    <a class="nav-link" href="cursos.php?accion=confirmar">
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
                <form action="inc/validar_modif_calif.php" method="post">
                    <div class="row">
                        <div class="col-2">
                            <label for="calif-1">Calificación 1</label>
                            <input type="number" class="form-control" placeholder="Calificación 1" value="<?php echo $calif_1 ?>" min="0" max="100" id="calif-1" name="calif-1">
                        </div>
                        <div class="col-2">
                            <label for="calif-2">Calificación 2</label>
                            <input type="number" class="form-control" placeholder="Calificación 2" value="<?php echo $calif_2 ?>" min="0" max="100" id="calif-2" name="calif-2">
                        </div>
                        <div class="col-2">
                            <label for="calif-3">Calificación 3</label>
                            <input type="number" class="form-control" placeholder="Calificación 3" value="<?php echo $calif_3 ?>" min="0" max="100" id="calif-3" name="calif-3">
                        </div>
                        <div class="col-2">
                            <label for="calif-4">Calificación 4</label>
                            <input type="number" class="form-control" placeholder="Calificación 4" value="<?php echo $calif_4 ?>" min="0" max="100" id="calif-4" name="calif-4">
                        </div>
                        <div class="col-2">
                            <label for="calif-5">Calificación 5</label>
                            <input type="number" class="form-control" placeholder="Calificación 5" value="<?php echo $calif_5 ?>" min="0" max="100" id="calif-5" name="calif-5">
                        </div>
                    </div>
                        <div class="col-5 my-2">
                            <button type="submit" class="btn btn-primary mb-2" name="conf_modif_calif">Confirmar</button>
                        </div>
                    <input type="hidden" name="id-calif" value="<?php echo $id_calificaciones?>">
                </form>
                <?php
                if(isset($_SESSION['msg'])){ ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['msg'] ?>
                    </div>
                    <?php
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
        </main>

    </div>
</div>
<!-- Scripts para seleccionar que accion va a realizar -->
<script type="application/javascript">
    let curso_id = <?php echo $_GET['curso']?>;
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
</body>
</html>
<?php } else {
    header('location: login_docente.php');
}?>