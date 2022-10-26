<!--TO DO
    *Cambiar echo a variables de sesion
    *Quitar mensajes de debug
-->
<?php
//BORRAR ESTO
session_start();
$_SESSION['id'] = 1;

include_once "inc/db.php";
    $sql = "SELECT * FROM calificaciones WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        echo "PREPARE";
        // Enlaza la variable $num_control como parametro
        mysqli_stmt_bind_param($stmt, "s", $param_id_calif);
        
        // Establecer los parametros
        $param_id_calif = $_SESSION['id'];
        
        // Intentar ejecutar la declaracion
        if(mysqli_stmt_execute($stmt)){
            // Guardar resultado
            echo "EXECUTE";
            mysqli_stmt_store_result($stmt);
            echo "STORE";
            // Comprobar si el usuario existe, si existe comprobar contraseña
            echo mysqli_stmt_num_rows($stmt);
            if(mysqli_stmt_num_rows($stmt) >= 1){                
                // Enlazar variables de resultados
                echo "NUM_ROWS";
                mysqli_stmt_bind_result($stmt, $id, $calif_1, $calif_2, $calif_3, $calif_4, $calif_5);
                if(mysqli_stmt_fetch($stmt)){
                    echo $calif_1;
                    echo $calif_2;
                    echo $calif_3;
                    echo $calif_4;
                    echo $calif_5;
                }
            } else{
                // Numero de control no existe
                $login_err = "Invalid username or password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Cerrar declaracion
        mysqli_stmt_close($stmt);
    }
?>