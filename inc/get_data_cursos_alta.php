<?php
session_start();
if ($_SESSION["tipo_usuario"] === 1) {
    if (isset($_GET['idNivel'])){
        $id_nivel = $_GET['idNivel'];
        try {
            $conn = new PDO('mysql:host=localhost;dbname=english-control', 'root', '');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        $sql = "SELECT nivel_curso, CONCAT(nombres, ' ', apellido_p, ' ', apellido_m) AS nom_completo, hora, dias, curso.id
                FROM curso
                    JOIN profesor p on p.id = curso.profesor_id
                    JOIN nivel n on n.id = curso.nivel_id
                    JOIN dias d on curso.dias_id = d.id
                    JOIN hora h on curso.hora_id = h.id
                WHERE nivel_id = $id_nivel";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nivel_curso, $nom_completo, $hora, $dias, $id_curso) => [$nivel_curso, $nom_completo, $hora, $dias, "<a href=inc/validar_alta.php?curso=" . $id_curso  . ">Dar de alta</a>"]);
            echo json_encode([
                'data' => $rs,
            ]);
        } else {
            var_dump($conn->errorInfo());
            die;
        }
    }


}