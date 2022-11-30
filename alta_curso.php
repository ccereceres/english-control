<?php
session_start();
// Mostrar formulario para escoger nivel de ingles
if (isset($_POST['enviar_nivel'])){
    $id_nivel = $_POST['sel-nivel'];
    include 'inc/headerAlumnoDataTables.php';
    ?>
    <div class="card-body">
        <table id="cursos_alta" class="table table-striped compact" style="width: 100%">
            <thead>
            <tr>
                <th>Nivel</th>
                <th>Profesor</th>
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
    <script type="application/javascript">
        let id_nivel = <?php echo $id_nivel ?>
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
    <script src="tpl/js/tablaDemandaCursos.js"></script>
    </body>
    </html>

<?php
} else {
    // No hay click en botón
    header('location: index.php');
}