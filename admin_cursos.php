<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['tipo_usuario'] === 3) {
        include 'inc/headerDataTablesAdmin.php'; ?>
                                <div class="card-body">
                                <table id="cursos" class="table table-striped compact" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Número de identificación</th>
                                            <th>Nombres</th>
                                            <th>Apellido P</th>
                                            <th>Apellido M</th>
                                            <th>Nivel Curso</th>
                                            <th>Dias</th>
                                            <th>Hora</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                </table>
                                </div>
        <?php
        if(isset($_SESSION['err_msg'])){ ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $_SESSION['err_msg'] ?>
            </div>
            <?php
            unset($_SESSION['err_msg']);
        }
        ?>
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
                <script src="tpl/js/tablaCursosAdmin.js"></script>
            </body>
            </html>
<?php
    }
}
