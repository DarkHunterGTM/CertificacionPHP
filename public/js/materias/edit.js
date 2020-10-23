var validator = $("#EditarMateriaForm").validate({
    ignore: [],
    onkeyup: false,
    rules: {
        nombre: {
            required: true,
        },
    },
    messages: {
        nombre: {
            required: 'Por favor, Ingrese el nombre de la materia',
        },
    }
});
