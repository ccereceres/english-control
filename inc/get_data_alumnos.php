<?php
    try {
        $conn = new PDO('mysql:host=localhost;dbname=english-control','jahy','H3nt4i-!#22');
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }
    $sql = "SELECT nombres, apellido_p, num_control, id FROM alumnos";
    $st = $conn
        ->query($sql);
    if ($st) {
        $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nombres, $apellido_p, $num_control, $id) => [$nombres, $apellido_p, $num_control, "<a href=panel.php?". $id .">Borrar</a>" . " " . "<a href=panel.php?". $id .">Editar</a>"] );
        echo json_encode([
            'data' => $rs,
        ]);
    } else {
        var_dump($conn->errorInfo());
        die;
    }