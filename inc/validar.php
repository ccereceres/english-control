<?php
//Inicializar la sesion
session_start();

//Comprobar si el usuario tiene sesion iniciada
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header('location: alumnos.php');
    exit;
}
//Si el usuario no tiene la sesion iniciada
//Incluir archivo de configuracion de la base de datos
include_once "db.php";

//Definiendo variables e iniciandolas en cadenas vacias
$num_control = $password = '';
$num_control_err = $password_err = $login_err = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Comprueba si en usuario esta vacio
    if(empty(trim($_POST["num_control"]))){
        $num_control_err = "Por favor introduzca un numero de control valido.";
    } else{
        $num_control = trim($_POST["num_control"]);
    }
    
    // Comprueba si la contraseña esta vacia
    if(empty(trim($_POST["password"]))){
        $password_err = "Porfavor introduce tu contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar credenciales
    if(empty($num_control_err) && empty($password_err)){
        // Preparar la consulta a la base de datos con name como login
        $sql = "SELECT id, name, password FROM alumnos WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Enlaza la variable $num_control como parametro
            mysqli_stmt_bind_param($stmt, "s", $param_num_control);
            
            // Establecer los parametros
            $param_num_control = $num_control;
            
            // Intentar ejecutar la declaracion
            if(mysqli_stmt_execute($stmt)){
                // Guardar resultado
                mysqli_stmt_store_result($stmt);
                // Comprobar si el usuario existe, si existe comprobar contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                
                    // Enlazar variables de resultados
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>