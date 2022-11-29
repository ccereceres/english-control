<?php
session_start();
if(isset($_GET['idCurso']) && isset($_GET['accion'])) {
    $idCurso = $_GET['idCurso'];
    $idProfesor = $_SESSION['id'];
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
        $sql = "SELECT num_control, a.nombres, a.apellido_p, a.apellido_m, calif_1, calif_2, calif_3, calif_4, calif_5, c3.id 
                FROM profesor JOIN curso c on profesor.id = c.profesor_id 
                    JOIN cursando c2 on c.id = c2.curso_id 
                    JOIN alumnos a on a.id = c2.alumnos_id 
                    JOIN calificaciones c3 on c3.id = c2.calificaciones_id 
                WHERE profesor.id = $idProfesor AND c.id = $idCurso";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($num_control, $nombres , $apellido_p , $apellido_m , $calif_1, $calif_2, $calif_3, $calif_4, $calif_5 , $calificaciones_id) => [$num_control, $nombres , $apellido_p , $apellido_m , $calif_1, $calif_2, $calif_3, $calif_4, $calif_5, "<a href=modificar_calificacion.php?idCalificaciones=". $calificaciones_id . "&accion=modificar" .">Modificar Calificación</a>"]);
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
        $sql = "SELECT num_control, a.nombres, a.apellido_p, a.apellido_m, calif_1, calif_2, calif_3, calif_4, calif_5, nombre, c3.id
                FROM profesor 
                    JOIN curso c on profesor.id = c.profesor_id
                    JOIN cursando c2 on c.id = c2.curso_id
                    JOIN alumnos a on a.id = c2.alumnos_id
                    JOIN calificaciones c3 on c3.id = c2.calificaciones_id
                    JOIN estado e on c3.estado_id = e.id
                WHERE profesor.id = $idProfesor AND c.id = $idCurso";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($num_control, $nombres , $apellido_p , $apellido_m , $calif_1, $calif_2, $calif_3, $calif_4, $calif_5 , $estado , $calificaciones_id)
            => [$num_control, $nombres , $apellido_p , $apellido_m , $calif_1, $calif_2, $calif_3, $calif_4, $calif_5, $estado, "<a href=inc/validar_conf_calif.php?idCalificacion=". $calificaciones_id .">Confirmar Calificación</a>"]);
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