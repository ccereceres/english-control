$(document).ready( function () {
    $('#alumnos').DataTable({
        ajax: 'inc/get_data_alumnos.php'
    });
} );
