$.validator.addMethod("select", function (value, element, arg) {
    return arg !== value;
}, "Debe seleccionar una opción.");

var validator = $("#CrearMateriaForm").validate({
    ignore: [],
    onkeyup: false,
    rules: {
        materia: {
            required: true,
        },
        grado: {
            required: true,
            select: 'default'
        },
    },
    messages: {
        materia: {
            required: 'Por favor, Ingrese el nombre de la materia',
        },
        grado: {
            required: 'Por favor, seleccione un grado',
        },
    }
});
