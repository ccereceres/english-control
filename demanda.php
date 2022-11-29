<?php
include 'inc/header.php';
session_start();
if ($_SESSION['tipo_usuario'] === 1){
    $idAlumno = $_SESSION['id'];
    $sqlDatosAlumno = "SELECT *
                        FROM alumnos
                            JOIN carrera c on alumnos.carrera_id = c.id
                        WHERE alumnos.id = $idAlumno";
    $sqlHora = "SELECT * FROM hora";
    $sqlNivel = "SELECT * FROM nivel";
    $sqlSemestre = "";
?>
    <form action="">

        nivel de ingles que desea tomar
        hora
        Semestre
        Carrera hidden
        nombre hidden
        apellidos hidden
        numero de control hidden

    </form>
<?php
include 'inc/footerBootstrapNormal.php';
} else {
    header('location: index.php');
}
