<?php
session_start();
// Comprobar sí hay sesión iniciada
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Comprobar sí el usuario es admin
    if ($_SESSION['tipo_usuario'] === 3){
        include 'db.php';
        // Comprobar si existe la variable get
        if (isset($_GET['curso'])){
            // Guardar el valor de la variable get
            $idCurso = $_GET['curso'];
            $idCursoSanitized = mysqli_real_escape_string($link, $idCurso);
            $sqlEliminarCursando = "DELETE FROM cursando WHERE curso_id = $idCursoSanitized";
            $sqlEliminarCurso = "DELETE FROM curso WHERE curso.id = $idCursoSanitized";

            if (mysqli_query($link, $sqlEliminarCursando)){
                if (mysqli_query($link, $sqlEliminarCurso)){
                    $_SESSION['msg'] = "Curso eliminado correctamente";
                    header('location: ../admin_cursos.php');
                } else {
                    $_SESSION['err_msg'] = "Error al eliminar el curso";
                    header('location: ../cursos_admin.php');
                }
            } else {
                $_SESSION['err_msg'] = "Error al eliminar el cursando";
                header('location: ../cursos_admin.php');
            }
        } else {
            echo "Ningun argumento pasado";
        }
    } else {
        echo 'Acceso de admin necesario';
    }
} else {
    echo "inicia sesion";
}