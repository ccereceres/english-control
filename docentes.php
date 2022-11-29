<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        if ($_SESSION['tipo_usuario'] === 2) {

        include 'inc/headerDocentes.php';?>
            <section class="page-section">
                <div class="container px-4 py-4 px-lg-5">
                    <h2 class="text-center mt-0">Instituto Tecnológico de Parral</h2>
                    <hr class="divider" />
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="mt-5">
                                <div class="mb-2"><i class="bi bi-card-list fs-1 text-primary"></i></div>
                                <h3 class="h4 mb-2">Modificar calificaciones</h3>
                                <p class="text-muted mb-0">Modifica las calificaciones de los alumnos</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="mt-5">
                                <div class="mb-2"><i class="bi bi-card-checklist fs-1 text-primary"></i></div>
                                <h3 class="h4 mb-2">Confirmar calificaciones</h3>
                                <p class="text-muted mb-0">Confirma las calificaciones de los alumnos</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="mt-5">
                                <div class="mb-2"><i class="bi bi-clipboard2-x fs-1 text-primary"></i></div>
                                <h3 class="h4 mb-2">Cargar faltas</h3>
                                <p class="text-muted mb-0">Carga las faltas de los alumnos</p>
                            </div>
                        </div>
                    </div>
                    <hr class="divider" />
                    <div class="text-center">
                        Atención, las fechas para subir calificaciones acabarán el 6 de diciembre
                    </div>
                    <?php
                    if(isset($_SESSION['msg_err'])){ ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $_SESSION['msg_err'] ?>
                        </div>
                        <?php
                        unset($_SESSION['msg_err']);
                    }
                    ?>
                </div>
            </section>
        <?php
        include 'inc/footerDocentesBootstrapNormal.php';
        } else if ($_SESSION['tipo_usuario'] === 3) {
            include 'inc/headerAdmin.php'; ?>
        ADMIIIIIIIIIIIIIN :3
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
    <?php
            include 'inc/footerBootstrapNormal.php';
        } else {
            header("location: login_docente.php");
            $_SESSION['err_msg'] = "Tipo de usuario desconocido";
        }
    } else {
        header("location: login_docente.php");
        $_SESSION['err_msg'] = "Acceso denegado. Inicia sesión";
    }
?>
