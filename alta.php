<?php
session_start();
if ($_SESSION['tipo_usuario'] === 1){
    include 'inc/db.php';
    $idAlumno = $_SESSION['id'];
    $verificar = "SELECT * FROM cursando WHERE alumnos_id = ?";
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
                $sqlNivel = "SELECT * FROM nivel";
                $queryNivel = mysqli_query($link, $sqlNivel);

                include 'inc/header.php';
                ?>
                <!-- Formulario para escoger nivel a cursar -->
                <form class="p-3" method="POST" action="alta_curso.php">
                    <!-- Formulario Elegir Nivel de inglés -->
                    <div class="form-group my-2">
                        <label for="l-nivel">Nivel de inglés que deseas cursar</label>
                        <select name="sel-nivel" id="l-nivel" class="form-control">
                            <?php while ($nivel = mysqli_fetch_array($queryNivel, MYSQLI_ASSOC)):; ?>
                                <option value="<?php echo $nivel["id"];?>"><?php echo $nivel["nivel_curso"] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- Boton enviar formulario -->
                    <div>
                        <input class="btn btn-primary" type="submit" value="Enviar" name="enviar_nivel">
                    </div>
                </form>
            <?php
            include 'inc/footerBootstrapNormal.php';
            } else{
                // El alumno ya tiene registrada la demanda
                $_SESSION['err_msg'] = "Ya diste de alta tu materia";
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