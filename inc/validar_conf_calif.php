<?php
session_start();
include_once 'db.php';
// Recibe el id de calificaciones para confirmarlo
if (isset($_GET['idCalificacion'])){
    // Guarda el valor de la variable GET en una variable local
    // Valor de la variable es el id de las calificaciones
    $idCalif = $_GET['idCalificacion'];
    $sql = "UPDATE calificaciones SET estado = '2' WHERE id = $idCalif";
    $sqlIdCurso = "select curso_id from calificaciones join cursando c on calificaciones.id = c.calificaciones_id WHERE calificaciones.id = $idCalif";
    if (mysqli_query($link, $sql)) {
            $query = mysqli_query($link, $sqlIdCurso);
            $curso = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $idCurso = $curso["curso_id"];
            $_SESSION['msg'] = "Calificacion Confirmada Correctamente";
            header('location: ../alumnos.php?curso=' . $idCurso . "&accion=confirmar");
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}