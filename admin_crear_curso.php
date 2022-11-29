<?php
// Iniciar la sesion
session_start();
if ($_SESSION['tipo_usuario'] === 3){

    // Incluir la base de datos
    include_once 'inc/db.php';

    // Consultas para obtener el valor y colocarlas en la lista desplegable
    $sqlProfesor = "SELECT * FROM profesor";
    $sqlDia = "SELECT * FROM dias";
    $sqlNivel = "SELECT * FROM nivel";
    $sqlHora = "SELECT * FROM hora";

    // Hacer la consulta en la BD
    $queryProfesor = mysqli_query($link, $sqlProfesor);
    $queryDia = mysqli_query($link, $sqlDia);
    $queryNivel = mysqli_query($link, $sqlNivel);
    $queryHora = mysqli_query($link, $sqlHora);

    // Crea el curso cuando el usuario de click en el boton
    if (isset($_POST['crear_curso'])){
        // Variables para insertar datos
        $dias = mysqli_real_escape_string($link, $_POST['sel-dia']);
        $profesor_id = mysqli_real_escape_string($link, $_POST['sel-profesor']);
        $nivel_id = mysqli_real_escape_string($link, $_POST['sel-nivel']);
        $hora_id = mysqli_real_escape_string($link, $_POST['sel-hora']);
        $sqlInsert = "INSERT INTO `curso` (`id`, `dias_id`, `profesor_id`, `nivel_id`, `hora_id`) VALUES (NULL, '$dias', '$profesor_id', '$nivel_id', '$hora_id')";
        if (mysqli_query($link, $sqlInsert)){
            $_SESSION['msg_sql'] = "Curso creado exitosamente";
        } else {
            $_SESSION['msg_sql'] = "Error al crear el curso. Falló consulta INSERT";
        }


    }
    include 'inc/headerAdmin.php'; ?>
    <!-- Formulario crear curso -->
    <form class="p-3" method="POST">
        <!-- Formulario Elegir Profesor -->
        <div class="form-group my-2">
            <label for="l-profesor">Profesor</label>
            <select name="sel-profesor" id="l-profesor" class="form-control">
                <?php while ($profesor = mysqli_fetch_array($queryProfesor, MYSQLI_ASSOC)):; ?>
                <option value="<?php echo $profesor["id"];?>"><?php echo $profesor["nombres"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <!-- Formulario Elegir Nivel -->
        <div class="form-group my-2">
            <label for="l-nivel">Nivel de ingles</label>
            <select name="sel-nivel" id="l-nivel" class="form-control">
                <?php while ($nivel = mysqli_fetch_array($queryNivel, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $nivel["id"];?>"><?php echo $nivel["nivel_curso"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <!-- Formulario Elegir Dia -->
        <div class="form-group my-2">
            <label for="l-dia">Dias</label>
            <select name="sel-dia" id="l-dia" class="form-control">
                <?php while ($dia = mysqli_fetch_array($queryDia, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $dia["id"];?>"><?php echo $dia["dias"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <!-- Formulario Elegir Hora -->
        <div class="form-group my-2">
            <label for="l-hora">Hora</label>
            <select name="sel-hora" id="l-hora" class="form-control">
                <?php while ($hora = mysqli_fetch_array($queryHora, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $hora["id"];?>"><?php echo $hora["hora"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <!-- Boton Crear curso -->
            <input class="btn btn-primary" type="submit" value="Crear" name="crear_curso">
        </div>
    </form>
    <!-- Alerta -->
    <?php if (isset($_SESSION['msg_sql'])){ ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['msg_sql'];
        unset($_SESSION['msg_sql']) ?>
    </div>
    <?php } ?>
<?php
    include 'inc/footerBootstrapNormal.php';
} else {
    header('location: index.php');
}
