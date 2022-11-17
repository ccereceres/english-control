<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try {
            $conn = new PDO('mysql:host=localhost;dbname=english-control','jahy','H3nt4i-!#22');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        $sql = "SELECT * FROM curso WHERE profesor_id = 1";
        $st = $conn
            ->query($sql);
        if ($st) {
            $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($idCurso, $nivel, $profesor) => [$idCurso, $nivel, $profesor] );
            echo json_encode([
                'data' => $rs,
            ]);
        } else {
            var_dump($conn->errorInfo());
            die;
        }
    } else {
        header("Location: ../index.php");
    }
    
    