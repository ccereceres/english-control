<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        if(isset($_GET['accion']) && ($_GET['accion'] == 'modificar' || $_GET['accion'] == 'confirmar')){
            $accion = $_GET['accion'];
            include 'inc/headerDataTablesDocente.php';?>

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
