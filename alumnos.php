<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    if(isset($_GET['accion']) && isset($_GET['curso']) &&($_GET['accion'] == 'modificar' || $_GET['accion'] == 'confirmar' || $_GET['accion'] == 'ver')){
        $accion = $_GET['accion'];
        include 'inc/headerDataTablesDocente.php';?>

                        Mostrar curso. Al seleccionar dirigirse a la pagina modificar o confirmar $_GET con argumentos "id del curso" "Accion a realizar"
                        <div class="card-body">
                            <table id="alumnos" class="table table-striped compact" style="width: 100%">
                                <thead>
                                <tr>
                                    <?php //El docente nomas desea ver los alumnos en el curso
                                    if($_GET['accion'] == "ver"){?>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Núm Control</th>
                                    <th>Carrera</th>
                                    <?php } else {?>
                                    <th>Núm Control</th>
                                    <th>Calficación 1</th>
                                    <th>Calficación 2</th>
                                    <th>Calficación 3</th>
                                    <th>Calficación 4</th>
                                    <th>Calficación 5</th>
                                    <th>Acción</th>
                                    <?php }?>
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
            let curso_id = <?php echo $_GET['curso']?>;
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
        <script src="tpl/js/tabla.js"></script>
        </body>
        </html>
        <?php
    } else {
        //metodo $_GET no existe ó esta incorrecto
        header('location: docentes.php');
    }
} else {
    //El usuario no tiene la sesión iniciada ó no es docente
    header("location: login_docente.php");
    $_SESSION['err_msg'] = "Acceso denegado. Inicia sesión";
}
?>
