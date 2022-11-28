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
    }
    include 'inc/headerDataTablesDocente.php'; ?>

                <!-- Formulario para modificar la calificación. Accion en validar_modif_calif.php -->
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