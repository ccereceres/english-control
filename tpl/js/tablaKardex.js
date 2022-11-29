$(document).ready( function () {
    $('#kardex').DataTable({
        ajax: 'inc/get_data_kardex.php',
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'print',

            }
        ]
    });
} );