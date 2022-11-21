<?php
    if(isset($_GET['id']) && isset($_GET['accion'])) {
        $id = $_GET['id'];
        if ($_GET['accion'] == "modificar") {
            try {
                $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
            $sql = "SELECT nivel_curso, hora, dias, id FROM curso WHERE profesor_id = $id";
            $st = $conn
                ->query($sql);
            if ($st) {
                $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nivel_curso, $hora, $dias, $idCurso_db) => [$nivel_curso, $hora, $dias, "<a href=modificar.php?curso=". $idCurso_db .">modificar</a>"]);
                echo json_encode([
                    'data' => $rs,
                ]);
            } else {
                var_dump($conn->errorInfo());
                die;
            }
        } elseif ($_GET['accion'] == "confirmar"){
            try {
                $conn = new PDO('mysql:host=localhost;dbname=english-control', 'jahy', 'H3nt4i-!#22');
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
            $sql = "SELECT nivel_curso, hora, dias, id FROM curso WHERE profesor_id = $id";
            $st = $conn
                ->query($sql);
            if ($st) {
                $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nivel_curso, $hora, $dias, $idCurso_db) => [$nivel_curso, $hora, $dias, "<a href=confirmar.php?curso=". $idCurso_db .">Confirmar</a>"]);
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
    
    