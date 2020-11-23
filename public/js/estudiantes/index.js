var estudiantes_table = $('#estudiantes-table').DataTable({
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

    "columns": [    {
        "title": "Carnet",
        "data": "carnet",
        "width": "10%",
        "responsivePriority": 1,
        "render": function (data, type, full, meta) {
                return (data);
        },
    },

      {
            "title": "Estudiane",
            "data": "nombre",
            "width": "10%",
            "responsivePriority": 1,
            "render": function (data, type, full, meta) {
                return (data);
            },
        },

        {
        "title": "Dirección",
        "data": "direccion",
        "width": "10%",
        "responsivePriority": 1,
        "render": function (data, type, full, meta) {
                return (data);
        },
    },

    {
        "title": "Teléfono",
        "data": "telefono",
        "width": "15%",
        "responsivePriority": 4,
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
                  "<a href='" + urlActual + "/reinscripcion/" + full.id + "' class='resinscripcion-estudiante' >" +
                  "<i class='fa fa-btn fa-table' title='Realizar Reinscripción'></i>" +
                  "</a>" + "</div>" +
                  "<div class='float-left col-lg-4'>" +
                  "<a href='" + urlActual + "/edit/" + full.id + "' class='editar-estudiante' >" +
                  "<i class='fa fa-btn fa-edit' title='Editar Estudiante'></i>" +
                  "</a>" + "</div>"  +
                 "<div class='float-left col-lg-4'>" +
                 "<div id='" + full.id + "' class='text-center'>" +
                    "<div class='float-left col-lg-4'>" +
                      "<a href='pagos/" + full.id + "' class='edit-pago' >" +
                    "<i class='fa fa-btn fas fa-check-square' title='Ver inscripciones del Estudiante'></i>" +
                    "</a>" + "</div>";

            } else {
                return "sin Acciones"

            }


        },
        "responsivePriority": 5
    }]

});

$("#btnConfirmarAccion").click(function (event) {
    event.preventDefault();
        confirmarAccion();
});


function confirmarAccion(button) {
    $('.loader').fadeIn();
    var formData = $("#ConfirmarAccionForm").serialize();
    var id = $("#idConfirmacion").val();
    $.ajax({
        type: "POST",
        headers: { 'X-CSRF-TOKEN': $('#tokenReset').val() },
        url: APP_URL + "/clientes/" + id + "/delete",
        data: formData,
        dataType: "json",
        success: function (data) {
            $('.loader').fadeOut(225);
            $('#modalConfirmarAccion').modal("hide");
            clientes_table.ajax.reload();
            alertify.set('notifier', 'position', 'top-center');
            alertify.success('El Cliente se Desactivó Correctamente!!');
        },
        error: function (errors) {
            $('.loader').fadeOut(225);
            if (errors.responseText != "") {
                var errors = JSON.parse(errors.responseText);
                if (errors.password_actual != null) {
                    $("input[name='password_actual'] ").after("<label class='error' id='ErrorPassword_actual'>" + errors.password_actual + "</label>");
                }
                else {
                    $("#ErrorPassword_actual").remove();
                }
            }

        }

    });
}

$(document).on('click', 'a.activar-cliente', function (e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);
    alertify.confirm('Activar Cliente', 'Esta seguro de activar el cliente',
        function () {
            $('.loader').fadeIn();
            $.post({
                type: $this.data('method'),
                url: $this.attr('href')
            }).done(function (data) {
                $('.loader').fadeOut(225);
                clientes_table.ajax.reload();
                alertify.set('notifier', 'position', 'top-center');
                alertify.success('Cliente Activado con Éxito!!');
            });
        }
        , function () {
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('Cancelar')
        });
});
