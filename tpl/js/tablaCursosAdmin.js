$(document).ready( function () {
    $('#cursos').DataTable({
        ajax: 'inc/get_data_cursos.php',
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2,3,4,5,6]
                }
            }
        ]
    });
} );