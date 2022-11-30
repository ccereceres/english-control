$(document).ready( function () {
    $('#cursos_alta').DataTable({
        ajax: 'inc/get_data_cursos_alta.php?idNivel=' + id_nivel,
        dom: 'lfrtip',
        buttons: [
            {
                extend: 'print',

            }
        ]
    });
} );