if(accion === "modificar"){
    $(document).ready( function () {
        $('#cursos').DataTable({
            ajax: 'inc/get_data_cursos.php?id=' + prof_id + '&accion=modificar',
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }
            ]
        });
    } );
} else if (accion === "confirmar"){
    $(document).ready( function () {
        $('#cursos').DataTable({
            ajax: 'inc/get_data_cursos.php?id=' + prof_id + "&accion=confirmar",
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }
            ]
        });
    } );
} else {
    //TODO
}


