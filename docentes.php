<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        if ($_SESSION['tipo_usuario'] === 2) {

        include 'inc/headerDocentes.php';?>

                            

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu est arcu. Pellentesque vel leo consectetur, elementum arcu et, dictum dui. Mauris elementum lacus elit. Nunc rutrum turpis sed convallis porta. Ut sit amet nisl at erat euismod pretium. Nam venenatis, quam ut tincidunt ultricies, felis mauris posuere nisi, sed efficitur enim libero sed nibh. Phasellus maximus sit amet lacus nec dapibus. Phasellus id tempus diam, non tristique sem. Sed placerat lacus vitae lacus sodales, eget feugiat lorem pharetra. Cras quis scelerisque nunc. Aenean aliquet suscipit neque sed venenatis. Nunc sem nisi, lobortis sed ornare eu, condimentum in lorem. Etiam sodales ornare nulla, sed suscipit augue dictum ac. In hac habitasse platea dictumst. Donec mattis rhoncus elementum. Morbi tincidunt, turpis ac consequat viverra, diam metus commodo libero, eu fringilla tortor sapien at dui.

    Integer vulputate velit viverra leo pulvinar, eu viverra odio facilisis. Vivamus feugiat dictum libero, et vestibulum urna venenatis eu. Quisque dictum consectetur magna, et gravida nisl pharetra condimentum. Aliquam et augue quis diam maximus tempus ut sed nisi. Nullam sem nisl, hendrerit quis ipsum sit amet, suscipit tristique neque. Sed sollicitudin commodo velit. In rutrum nunc eget magna imperdiet, sit amet fringilla nunc maximus. Quisque ornare nulla purus, bibendum imperdiet mauris ullamcorper non. Aenean sed malesuada felis. Maecenas fermentum finibus efficitur.

    In nisl ipsum, posuere a mi in, pharetra sodales velit. Fusce luctus arcu neque, placerat scelerisque dui sollicitudin at. Integer accumsan pellentesque lectus, nec rutrum mi congue non. Suspendisse potenti. Sed sed urna ac orci commodo tincidunt vel eu dui. Nunc sed pellentesque elit, et hendrerit sem. Ut ut nisi at eros lacinia imperdiet. Integer ac orci dignissim libero suscipit porttitor. Praesent scelerisque luctus lorem at congue. Nullam volutpat faucibus feugiat. Sed ultrices, magna in ultrices viverra, metus nunc consequat ante, non lacinia nibh enim non velit. Donec in est tempor ipsum sodales faucibus. Cras ultrices quis nulla vitae pellentesque.

    Etiam at risus vel ex interdum placerat a nec odio. Phasellus bibendum non lacus malesuada condimentum. Aenean et sodales tortor, in mattis nibh. Curabitur vel lorem quis tortor vulputate commodo. Aenean gravida mollis magna et pharetra. Donec laoreet aliquam arcu, eu laoreet nisl tincidunt dictum. Nunc cursus feugiat bibendum. Nunc ornare et metus et tempus. Maecenas fermentum in purus vitae mattis. Vestibulum diam dui, luctus vel mauris ut, tincidunt tincidunt eros. Praesent in odio augue. Vivamus iaculis vel quam nec posuere. Suspendisse maximus imperdiet quam convallis pulvinar.

    Fusce ultricies est neque, nec tristique nisi volutpat non. Aliquam fringilla mattis pretium. Aenean et congue ex. Fusce et neque maximus, porta quam in, finibus nibh. Donec facilisis tincidunt augue vel fringilla. Nullam faucibus diam eget consectetur consequat. Etiam fermentum risus quam, ultricies congue sapien rhoncus in. 

    <?php
        include 'inc/footerDocentesBootstrapNormal.php';
        } else if ($_SESSION['tipo_usuario'] === 3) {
            include 'inc/headerAdmin.php'; ?>
        ADMIIIIIIIIIIIIIN :3
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
