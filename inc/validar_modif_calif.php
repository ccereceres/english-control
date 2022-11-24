<?php
session_start();
include_once 'db.php';
if (isset($_POST['conf_modif_calif'])){
    $id = $_POST['id-calif'];
    $calif_1 = $_POST['calif-1'];
    $calif_2 = $_POST['calif-2'];
    $calif_3 = $_POST['calif-3'];
    $calif_4 = $_POST['calif-4'];
    $calif_5 = $_POST['calif-5'];
    echo $id;
    // Preparar la consulta a la base de datos con variable $_GET con id de las calificaciones
    $sql = "UPDATE calificaciones SET calif_1 = '$calif_1', calif_2 = '$calif_2', calif_3 = '$calif_3', calif_4 = '$calif_4', calif_5 = '$calif_5' WHERE id = '$id'";

    if (mysqli_query($link, $sql)) {
        $_SESSION['msg'] = "Calificacion Actualizada Correctamente";
        header('location: ../modificar_calificacion.php?idCalificaciones=' . $id . '&accion=modificar');
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}
