<?php
//Inicializar la sesion
session_start();

//Comprobar si el usuario tiene sesion iniciada
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header('location: ../panel.php');
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
    if(empty(trim($_POST["identify_number"]))){
        $num_control_err = "Por favor introduzca un numero de control valido.";
    } else{
        $numero_identificacion = trim($_POST["identify_number"]);
    }
    
    // Comprueba si la contraseña esta vacia
    if(empty(trim($_POST["password"]))){
        $password_err = "Porfavor introduce tu contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validar credenciales
    if(empty($num_control_err) && empty($password_err)){
        // Preparar la consulta a la base de datos con numero_identificación como login
        $sql = "SELECT id, nombres, apellido_p, apellido_m, numero_identificacion, password, tipo FROM profesor WHERE numero_identificacion = ?";

        /** @var mysqli $link */
        if($stmt = mysqli_prepare($link, $sql)){
            // Enlaza la variable $numero_identificacion como parametro
            mysqli_stmt_bind_param($stmt, "s", $param_numero_identificacion);
            // Establecer el parametro para buscar en la base de datos
            $param_numero_identificacion = $numero_identificacion;
            
            // Intentar ejecutar la declaracion
            if(mysqli_stmt_execute($stmt)){
                // Guardar resultado
                mysqli_stmt_store_result($stmt);
                // Comprobar si el usuario existe, si existe comprobar contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                
                    // Enlazar variables de resultados
                    mysqli_stmt_bind_result($stmt, $id, $names, $apellido_p, $apellido_m, $numero_identificacion_db, $password_db, $tipo);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password == $password_db){
                            // Contraseña es correcta, iniciar nueva sesion
                            session_start();
                            // Guardar informacion en variables de sesion
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["names"] = $names;   
                            $_SESSION["apellido_p"] = $apellido_p;
                            $_SESSION["apellido_m"] = $apellido_m;
                            $_SESSION["numero_identificacion_db"] = $numero_identificacion_db;
                            $_SESSION["tipo_usuario"] = $tipo;
                            
                            // Redirigir a la pagina despues de login exitoso
                            header("location: ../docentes.php");
                        } else{
                            // Contraseña no es valida
                            $_SESSION["err_msg"] = "Contraseña incorrecta";
                            header("location: ../login_docente.php");
                        }
                    }
                } else{
                    // Numero de identificacion no existe
                    $_SESSION["err_msg"] = "Número de identificación no existe";
                    header("location: ../login_docente.php");
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Cerrar declaracion
            mysqli_stmt_close($stmt);
        }
    } else {
        $_SESSION["err_msg"] = "Número de identificación o Contraseña vacios";
        header("location: ../login_docente.php");
    }
    
    // cerrar conexion
    mysqli_close($link);
}