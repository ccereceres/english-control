<?php
//BORRAR ESTO
session_start();
$idAlumno = $_SESSION['id'];
include_once "inc/db.php";
    $sql = "SELECT nivel_curso,
                    (calif_1 + calif_2 + calif_3 + calif_4 + calif_5)/5 AS promedio
            FROM alumnos
                JOIN cursado c on alumnos.id = c.alumnos_id
                JOIN calificaciones c2 on c2.id = c.calificaciones_id
            WHERE alumnos.id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Enlaza la variable $num_control como parametro
        mysqli_stmt_bind_param($stmt, "s", $param_id_alum);
        
        // Establecer los parametros
        $param_id_alum = $idAlumno;
        
        // Intentar ejecutar la declaracion
        if(mysqli_stmt_execute($stmt)){
            // Guardar resultado
            echo "EXECUTE";
            mysqli_stmt_store_result($stmt);
            echo "STORE";
            // Comprobar si el usuario existe, si existe comprobar contraseña
            echo mysqli_stmt_num_rows($stmt);
            // Si el alumno tiene una o mas calificaciones registradas
            if(mysqli_stmt_num_rows($stmt) >= 1){
                include 'inc/headerAlumnoDataTables.php'; ?>
                                <div class="card-body">
                                    <table id="kardex" class="table table-striped compact" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Nivel</th>
                                            <th>Promedio</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
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
                <script src="tpl/js/tablaKardex.js"></script>
                </body>
                </html>

            <?php
            } else{
                // El alumno no tiene calificaciónes registradas
                $_SESSION['err_msg'] = "No tienes calificaciones registradas";
                header('location: panel.php');
            }
        } else{
            // No se conecto la BD
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Cerrar declaracion
        mysqli_stmt_close($stmt);
    }
?>