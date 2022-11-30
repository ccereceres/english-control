<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    if (isset($_GET['curso'])) {
        include 'db.php';
        $id_curso = $_GET['curso'];
        $idAlumno = $_SESSION['id'];
        $verificar = "SELECT * FROM cursando WHERE alumnos_id = ?";
        if ($stmt = mysqli_prepare($link, $verificar)) {
            // Enlaza la variable $num_control como parametro
            mysqli_stmt_bind_param($stmt, "s", $param_id_alum);

            // Establecer los parametros
            $param_id_alum = $idAlumno;

            // Intentar ejecutar la declaracion
            if (mysqli_stmt_execute($stmt)) {
                // Guardar resultado
                echo "EXECUTE";
                mysqli_stmt_store_result($stmt);
                echo "STORE";
                // Comprobar si el usuario existe, si existe comprobar contraseña
                echo mysqli_stmt_num_rows($stmt);
                // Si el alumno tiene una o mas calificaciones registradas
                if (mysqli_stmt_num_rows($stmt) == 0) {
                    //Verificar si el curso esta lleno
                    $sqlCount = "SELECT COUNT(*) FROM cursando WHERE curso_id = $id_curso";
                    $numEstudiantes = mysqli_query($link, $sqlCount);
                    $row = mysqli_fetch_row($numEstudiantes);
                    echo $row[0];
                    if ($row[0] <= 45){
                        // INSERT
                        $sqlInsertCalif = "INSERT INTO calificaciones(estado_id) VALUES ('1')";
                        if (mysqli_query($link, $sqlInsertCalif)){
                            $sqlSacarValor = "SELECT MAX(id) FROM calificaciones";
                            $idCalif = mysqli_query($link, $sqlSacarValor);
                            $id_calif = mysqli_fetch_row($idCalif);
                            $ins_cal = $id_calif[0];
                            $sqlInsertCurso = "INSERT INTO cursando(alumnos_id, curso_id, calificaciones_id) VALUES ($idAlumno, $id_curso, $ins_cal)";
                            if (mysqli_query($link, $sqlInsertCurso)){
                                $_SESSION['msg'] = "Dado de alta exitosamente";
                                header('location: ../panel.php');
                            } else {
                                $_SESSION['err_msg'] = "Error al insertar en el curso";
                                header('location: ../panel.php');
                            }
                        } else {
                            $_SESSION['err_msg'] = "No se creo la calificacion";
                        }
                    } else {
                        $_SESSION['err_msg'] = "El curso esta lleno";
                        header('location: ../panel.php');
                    }
                } else {
                    // El alumno ya tiene registrada la demanda
                    $_SESSION['err_msg'] = "Ya diste de alta tu materia";
                    header('location: panel.php');
                }
            } else {
                // No se conecto la BD
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Cerrar declaracion
            mysqli_stmt_close($stmt);
        }
    } else {
        header('location: ../panel.php');
    }
} else {
    header('location: ../index.php');
}