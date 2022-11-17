$(document).ready( function () {
    $('#cursos').DataTable({
        ajax: 'inc/get_data_cursos.php?id=1'
    });
} );