<?php
session_start();
if ($_SESSION["tipo_usuario"] === 2) {
    if (isset($_GET['id']) && isset($_GET['accion'])) {
        // ID del profesor para sacar todos sus cursos
        $id = $_GET['id'];
        if ($_GET['accion'] == "modificar") {
            try {
                $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
            $sql = "SELECT nivel_curso, hora, dias, curso.id FROM curso JOIN dias d on curso.dias_id = d.id JOIN hora h on h.id = curso.hora_id JOIN nivel n on n.id = curso.nivel_id WHERE profesor_id = $id";
            $st = $conn
                ->query($sql);
            if ($st) {
                $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nivel_curso, $hora, $dias, $idCurso_db) => [$nivel_curso, $hora, $dias, "<a href=alumnos.php?curso=" . $idCurso_db . "&accion=modificar" . ">modificar</a>"]);
                echo json_encode([
                    'data' => $rs,
                ]);
            } else {
                var_dump($conn->errorInfo());
                die;
            }
        } elseif ($_GET['accion'] == "confirmar") {
            try {
                $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
            $sql = "SELECT nivel_curso, hora, dias, curso.id FROM curso JOIN dias d on curso.dias_id = d.id JOIN hora h on h.id = curso.hora_id JOIN nivel n on n.id = curso.nivel_id WHERE profesor_id = $id";
            $st = $conn
                ->query($sql);
            if ($st) {
                $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nivel_curso, $hora, $dias, $idCurso_db) => [$nivel_curso, $hora, $dias, "<a href=alumnos.php?curso=" . $idCurso_db . "&accion=confirmar" . ">Confirmar</a>"]);
                echo json_encode([
                    'data' => $rs,
                ]);
            } else {
                var_dump($conn->errorInfo());
                die;
            }
        } else {
            echo "asd";
        }
    } else {
        //No deberia de aparecer
        echo "asd";

    }
    // ADMIN
} elseif ($_SESSION['tipo_usuario'] === 3){
    try {
        $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }
    $sql = "SELECT numero_identificacion, nombres, apellido_p, apellido_m, nivel_curso, dias, hora FROM curso JOIN dias d on curso.dias_id = d.id JOIN nivel n on curso.nivel_id = n.id JOIN profesor p on curso.profesor_id = p.id JOIN hora h on curso.hora_id = h.id";
    $st = $conn
        ->query($sql);
    if ($st) {
        $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($numero_identificacion, $nombres, $apellido_p, $apellido_m, $nivel_curso, $dias, $hora) => [$numero_identificacion, $nombres, $apellido_p, $apellido_m, $nivel_curso, $dias, $hora]);
        echo json_encode([
            'data' => $rs,
        ]);
    } else {
        var_dump($conn->errorInfo());
        die;
    }
} else {
    echo "asd";
}