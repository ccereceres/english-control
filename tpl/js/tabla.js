if(accion == "modificar"){
    $(document).ready( function () {
        $('#alumnos').DataTable({
            ajax: 'inc/get_data_alumnos.php?idCurso=' + curso_id + '&accion=modificar',
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ]
        });
    } );
} else if (accion == "confirmar"){
    $(document).ready( function () {
        $('#alumnos').DataTable({
            ajax: 'inc/get_data_alumnos.php?idCurso=' + curso_id + "&accion=confirmar",
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ]
        });
    } );
} else if (accion == "ver") {
    $(document).ready( function () {
        $('#alumnos').DataTable({
            ajax: 'inc/get_data_alumnos.php?idCurso=' + curso_id + "&accion=ver",
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print'
                }
            ]
        });
    } );
} else {
    //TODO
}



