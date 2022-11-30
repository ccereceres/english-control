<?php
session_start();
// Si el unusario es de tipo 1 (Alumno)
if ($_SESSION["tipo_usuario"] === 1) {
// Obtiene el id del alumno guardado en la variable $_SESSION
$idAlumno = $_SESSION["id"];
    try {
        $conn = new PDO('mysql:host=localhost;dbname=english-control', 'root', '');
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }
    $sql = "SELECT nivel_curso,
                    (calif_1 + calif_2 + calif_3 + calif_4 + calif_5)/5 AS promedio
            FROM alumnos
                JOIN cursado c on alumnos.id = c.alumnos_id
                JOIN calificaciones c2 on c2.id = c.calificaciones_id
            WHERE alumnos.id = $idAlumno";
    $st = $conn
        ->query($sql);
    if ($st) {
        $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nivel_curso, $porcentaje) => [$nivel_curso, $porcentaje]);
        echo json_encode([
            'data' => $rs,
        ]);
    } else {
        var_dump($conn->errorInfo());
        die;
    }
}