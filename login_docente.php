<?php
session_start();
// Si el usuario tiene la sesión iniciada
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header('location: panel.php');
    exit;
} else { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicia Sesión</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="tpl/css/login.css">
    </head>
    <body>
    <section>
        <div class="container-fluid ps-md-0">
            <div class="row g-0">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Inicia Sesión</h3>

                                    <!-- Sign In Form -->
                                    <form action="inc/validar_profesor.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="identify" name="identify_number">
                                            <label for="floatingInput">Número de identificación</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                            <label for="floatingPassword">Contraseña</label>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Iniciar Sesión</button>
                                        </div>
                                        <?php
                                        if(isset($_SESSION['err_msg'])){ ?>
                                            <div class="alert alert-danger text-center" role="alert">
                                                <?php echo $_SESSION['err_msg'] ?>
                                            </div>
                                            <?php
                                            unset($_SESSION['err_msg']);
                                        }
                                        ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>
    <?php
}
?>