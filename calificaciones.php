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
        include 'inc/header.php';
    ?>

                        <div class="row">
                            <div class="card col-auto p-2 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación de</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 1</h6>
                                    <p class="card-text">
                                        <?php echo $calif_1?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-2 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación de</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 2</h6>
                                    <p class="card-text">
                                        <?php echo $calif_2?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-2 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación de</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 3</h6>
                                    <p class="card-text">
                                        <?php echo $calif_3?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-2 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación de</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 4</h6>
                                    <p class="card-text">
                                        <?php echo $calif_4?>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-auto p-2 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Calificación de</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Unidad 5</h6>
                                    <p class="card-text">
                                        <?php echo $calif_5?>
                                    </p>
                                </div>
                            </div>
                        </div>

<?php
    include 'inc/footerBootstrapNormal.php';
}
