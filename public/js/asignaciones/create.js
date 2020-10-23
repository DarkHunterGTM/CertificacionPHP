$.validator.addMethod("select", function (value, element, arg) {
    return arg !== value;
}, "Debe seleccionar una opción.");

var validator = $("#CrearAsignacionForm").validate({
    ignore: [],
    onkeyup: false,
    rules: {
        profesorId: {
            required: true,
            select: 'default'
        },
        materiaId: {
            required: true,
            select: 'default'
        },
    },
    messages: {
        profesorId: {
            required: 'Por favor, Seleccione un profesor',
        },
        materiaId: {
            required: 'Por favor, seleccione una materia',
        },
    }
});
