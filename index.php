<?php
    // Si el usuario tiene la sesión iniciada
    if(isset($_SESSION['matricula'])){
        // Rediregir a panel.php
        header("Location: panel.php");
    } else { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <title>ITParral English Control</title>
            <link rel="icon" type="image/x-icon" href="res/favicon.ico" />
            <link rel="stylesheet" href="tpl/css/index.css">
        </head>
        <body id="page-top">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="#page-top">ITParral English Control</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto my-2 my-lg-0">
                            <li class="nav-item"><a class="nav-link" href="login.php">Inicia Sesión</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">Acerca</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Masthead-->
            <header class="masthead">
                <div class="container px-4 px-lg-5 h-100">
                    <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                        <div class="col-lg-8 align-self-end">
                            <h1 class="text-white font-weight-bold">Acerca del Instituto Tecnologico de Parral</h1>
                            <hr class="divider" />
                        </div>
                        <div class="col-lg-8 align-self-baseline">
                            <p class="text-white-75 mb-5">El instituto de parral tiene la mision de formar profesionales de clase mundial, 
                                con profundo sentido humano y conocimientos científicos y tecnológicos de vanguardia, 
                                con principios y valores, capaces de contribuir a la transformación armónica de una 
                                sociedad más justa y más humana</p>
                            <a class="btn btn-primary btn-xl" href="login.php">Inicia Sesión</a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About-->
            <section class="page-section bg-primary" id="about">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2 class="text-white mt-0">Nuestra visión</h2>
                            <hr class="divider divider-light" />
                            <p class="text-white-75 mb-4">Ser una institución de educación superior de excelencia, sustentada en la superación y 
                                el compromiso de las personas, así como en la calidad del proceso educativo.</p>
                            <a class="btn btn-light btn-xl" href="login.php">Inicia sesión</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Core theme JS-->
            <script src="tpl/js/index.js"></script>
        </body>
        </html>
    <?php
    }
?>