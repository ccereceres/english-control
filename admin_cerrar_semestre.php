<?php
session_start();
if ($_SESSION['tipo_usuario'] === 3){
    include 'inc/db.php';
    include 'inc/headerAdmin.php';
    if (isset($_POST['cerrar_semestre'])){
        $sqlKarder = "INSERT INTO cursado(alumnos_id, calificaciones_id, nivel_curso)
                        SELECT a.id, calificaciones.id, nivel_curso
                        FROM calificaciones
                            JOIN cursando c on calificaciones.id = c.calificaciones_id
                            JOIN alumnos a on c.alumnos_id = a.id
                            JOIN curso c2 on c.curso_id = c2.id
                            JOIN nivel n on c2.nivel_id = n.id";
        $sqlBorrarCursando = "DELETE FROM cursando";
        $sqlBorrarCurso = "DELETE FROM curso";
        $sqlBorrarDemanda = "DELETE FROM demanda";
        if (mysqli_query($link, $sqlKarder)){
            if (mysqli_query($link, $sqlBorrarCursando)){
                if (mysqli_query($link, $sqlBorrarCurso)){
                    if (mysqli_query($link, $sqlBorrarDemanda)){
                        $_SESSION['msg'] = "Semestre cerrado";
                        header('location: docentes.php');
                    } else {
                        $_SESSION['err_msg'] = "Error al borrar demanda";
                        header('location: docentes.php');
                    }
                } else {
                    $_SESSION['err_msg'] = "Error al borrar curso";
                    header('location: docentes.php');
                }
            } else {
                $_SESSION['err_msg'] = "Error al borrar cursando";
                header('location: docentes.php');
            }
        } else {
            $_SESSION['err_msg'] = "Error al crear kardex";
            header('location: docentes.php');
        }
    }

    ?>
    <form method="POST">
        <h1>Esta acción es irreversible</h1>
        <input class="btn btn-danger" type="submit" value="Cerrar semestre" name="cerrar_semestre">
    </form>


<?php
    include 'inc/footerBootstrapNormal.php';
} else {
    header('index.php');
}
