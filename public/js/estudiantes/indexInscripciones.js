var inscripcionesPagos_table = $('#inscripcionesPagos-table').DataTable({
    "responsive": true,
    "processing": true,
    "info": true,
    "showNEntries": true,
    "dom": 'Bfrtip',

    lengthMenu: [
        [10, 25, 50, -1],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ],

    "buttons": [
        'pageLength',
        {
            extend: 'excelHtml5',
            title: 'Clientes',
            exportOptions: {
                columns: [0,1,2,3]
            }
        }
    ],

    "paging": true,
    "language": {
        "sdecimal": ".",
        "sthousands": ",",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
    },
    "order": [0, 'desc'],

    "columns": [   {
            "title": "Grado",
            "data": "grado",
            "width": "10%",
            "responsivePriority": 1,
            "render": function (data, type, full, meta) {
                return (data);
            },
        },

        {
        "title": "Ciclo",
        "data": "anio",
        "width": "10%",
        "responsivePriority": 1,
        "render": function (data, type, full, meta) {
                return (data);
        },
    },
    {
        "title": "Acciones",
        "orderable": false,
        "width": "10%",
        "render": function (data, type, full, meta) {
            var rol_user = $("input[name='rol_user']").val();
            var urlActual = $("input[name='urlActual']").val();

            if (full.estado == 1) {
              return "<div id='" + full.id + "' class='text-center'>" +
                 "<div class='float-left col-lg-4'>" +
                   "<a href='/" + full.id + "' class='edit-pago' >" +
                 "<i class='fa fa-btn fas fa-money-bill-alt' title='Ver Detalles de Pago'></i>" +
                 "</a>" + "</div>";

            } else {
              return "<div id='" + full.id + "' class='text-center'>" +
                 "<div class='float-left col-lg-4'>" +
                   "<a href='/pago/" + full.id + "' class='edit-pago' >" +
                 "<i class='fa fa-btn fas fa-money-bill-alt' title='Ver Detalles de Pago'></i>" +
                 "</a>" + "</div>";

            }


        },
        "responsivePriority": 5
    }]

});
