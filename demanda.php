<?php
session_start();
if ($_SESSION['tipo_usuario'] === 1){
    include 'inc/db.php';
    $idAlumno = $_SESSION['id'];
    $verificar = "SELECT * FROM demanda WHERE alumnos_id = ?";
    if($stmt = mysqli_prepare($link, $verificar)){
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
            if(mysqli_stmt_num_rows($stmt) == 0){




    $sqlDatosAlumno = "SELECT *
                        FROM alumnos
                            JOIN carrera c on alumnos.carrera_id = c.id
                        WHERE alumnos.id = $idAlumno";
    $sqlHora = "SELECT * FROM hora";
    $sqlNivel = "SELECT * FROM nivel";
    $sqlSemestre = "SELECT * FROM semestre";

    $queryNivel = mysqli_query($link, $sqlNivel);
    $queryHora = mysqli_query($link, $sqlHora);
    $queryAlumno = mysqli_query($link, $sqlDatosAlumno);
    $querySemestre = mysqli_query($link, $sqlSemestre);

    // Crea el curso cuando el usuario de click en el boton
    if (isset($_POST['enviar_demanda'])){
        // Variables para insertar datos
        $semestre_id = mysqli_real_escape_string($link, $_POST['sel-semestre']);
        $nivel_id = mysqli_real_escape_string($link, $_POST['sel-nivel']);
        $hora_id = mysqli_real_escape_string($link, $_POST['sel-hora']);
        $alumno_id = $_SESSION['id'];
        $sqlInsert = "INSERT INTO `demanda`(`id`, `alumnos_id`, `hora_id`, `nivel_id`, `semestre_id`) 
                        VALUES (NULL,'$alumno_id','$hora_id','$nivel_id','$semestre_id')";
        if (mysqli_query($link, $sqlInsert)){
            $_SESSION['msg_sql'] = "Demanda enviada exitosamente";
            header('location: panel.php');
        } else {
            $_SESSION['msg_sql'] = "Error al enviar demanda. Falló consulta INSERT";
        }
    }
    include 'inc/header.php';
?>
    <!-- Formulario demandar materia -->
    <form class="p-3" method="POST">
        <!-- Formulario Elegir Nivel de inglés -->
        <div class="form-group my-2">
            <label for="l-nivel">Nivel de inglés que desea tomar</label>
            <select name="sel-nivel" id="l-nivel" class="form-control">
                <?php while ($nivel = mysqli_fetch_array($queryNivel, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $nivel["id"];?>"><?php echo $nivel["nivel_curso"] ?></option>
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
        <!-- Formulario escoger semestre -->
        <div class="form-group my-2">
            <label for="l-semestre">Semestre</label>
            <select name="sel-semestre" id="l-semestre" class="form-control">
                <?php while ($semestre = mysqli_fetch_array($querySemestre, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $semestre["id"];?>"><?php echo $semestre["nombre"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <!-- Boton enviar formulario -->
        <div>
            <input class="btn btn-primary" type="submit" value="Enviar" name="enviar_demanda">
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
            } else{
                // El alumno ya tiene registrada la demanda
                $_SESSION['err_msg'] = "Ya demandaste tu materia";
                header('location: panel.php');
            }
        } else{
            // No se conecto la BD
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Cerrar declaracion
        mysqli_stmt_close($stmt);
    }
} else {
    header('location: index.php');
}


