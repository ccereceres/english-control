<?php 
    session_start();


if(isset($_SESSION['email'])){
    //   Usuario SI esta logeado
    header("Location: index.php");
} else { ?>
    <!-- Usuario NO esta logeado -->
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="estilos/login.css">
    </head>
    <body>
        <div class="contenedor">
            <div class="form_contenedor">
                <div class="form_cuerpo">
                    <h2 class="titulo">Inicia sesion</h2>
                    <form action="inc/validar.php" method="POST" class="formulario">
                        <label for="n-control">Numero de control</label>
                        <input type="text" name="num_control" id="n-control" placeholder="Numero de control"><br>
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="Contraseña"><br>
                        <input type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php } ?>