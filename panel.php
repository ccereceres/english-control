<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        if ($_SESSION['tipo_usuario'] == 1){
        include 'inc/header.php';?>
        <section class="page-section">
            <div class="container px-4 py-4 px-lg-5">
                <h2 class="text-center mt-0">Instituto Tecnológico de Parral</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-journal-plus fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Demanda de materia</h3>
                            <p class="text-muted mb-0">Escoge el nivel de inglés y la hora que deseas cursar durante el semestre</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-journal-arrow-up fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Alta de materia</h3>
                            <p class="text-muted mb-0">Regístrate en uno de los cursos disponibles de inglés</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-journal-minus fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Calificaciones parciales</h3>
                            <p class="text-muted mb-0">Consulta las calificaciones del curso durante el semestre actual</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-journal-text fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Kardex</h3>
                            <p class="text-muted mb-0">Consulta todas calificaciones de los cursos de inglés</p>
                        </div>
                    </div>
                </div>
                <hr class="divider" />
                <div class="text-center">
                    Atención, las fechas para demandar el curso de inglés es del 28 de agosto al 9 de septiembre.
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
                <?php
                if(isset($_SESSION['msg'])){ ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['msg'] ?>
                    </div>
                    <?php
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
        </section>
   <?php
        include 'inc/footerBootstrapNormal.php';
        } else {
            header('location: login.php');
        }
    } else {
        header("location: login.php");
        $_SESSION['err_msg'] = "Acceso denegado. Inicia sesión";
    }
?>
