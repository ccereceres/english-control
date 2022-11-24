<?php
if(isset($_GET['idCurso']) && isset($_GET['accion'])) {
    $idCurso = $_GET['idCurso'];
    if ($_GET['accion'] == 'ver') {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        $sql = "SELECT nombres, apellido_p, apellido_m, num_control, nombre FROM alumnos JOIN cursando c on alumnos.id = c.alumnos_id join curso c2 on c.curso_id = c2.id join carrera c3 on alumnos.carrera_id = c3.id where c2.id = $idCurso";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nombres, $apellido_p, $apellido_m, $num_control, $nombre) => [$nombres, $apellido_p, $apellido_m, $num_control, $nombre]);
            echo json_encode([
                'data' => $rs,
            ]);
        } else {
            var_dump($conn->errorInfo());
            die;
        }
    } elseif ($_GET['accion'] == 'modificar') {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        $sql = "SELECT num_control, calif_1, calif_2, calif_3, calif_4, calif_5, calificaciones_id FROM alumnos JOIN cursando c on alumnos.id = c.alumnos_id join curso c2 on c.curso_id = c2.id join carrera c3 on alumnos.carrera_id = c3.id join calificaciones c4 on c.calificaciones_id = c4.id where c2.id = $idCurso";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($num_control, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5, $calificaciones_id) => [$num_control, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5, "<a href=modificar_calificacion.php?idCalificaciones=". $calificaciones_id . "&accion=modificar" .">Modificar Calificación</a>"]);
            echo json_encode([
                'data' => $rs,
            ]);
        } else {
            var_dump($conn->errorInfo());
            die;
        }
    } elseif ($_GET['accion'] == 'confirmar') {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        $sql = "SELECT num_control, calif_1, calif_2, calif_3, calif_4, calif_5, calificaciones_id FROM alumnos JOIN cursando c on alumnos.id = c.alumnos_id join curso c2 on c.curso_id = c2.id join carrera c3 on alumnos.carrera_id = c3.id join calificaciones c4 on c.calificaciones_id = c4.id where c2.id = $idCurso";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($num_control, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5, $calificaciones_id) => [$num_control, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5, "<a href=alumnos.php?idCalificacion=". $calificaciones_id . "&accion=modificar" .">Confirmar Calificación</a>"]);
            echo json_encode([
                'data' => $rs,
            ]);
        } else {
            var_dump($conn->errorInfo());
            die;
        }
    } else {
        // TODO Metodo $_GET no existe
    }
}