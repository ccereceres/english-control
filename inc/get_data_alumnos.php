<?php
    try {
        $conn = new PDO('mysql:host=localhost;dbname=english-control','jahy','H3nt4i-!#22');
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }
    $sql = "SELECT nombres, apellido_p, num_control FROM alumnos";
    $st = $conn
        ->query($sql);
    if ($st) {
        $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($nombres, $apellido_p, $num_control) => [$nombres, $apellido_p, $num_control] );
        echo json_encode([
            'data' => $rs,
        ]);
    } else {
        var_dump($conn->errorInfo());
        die;
    }