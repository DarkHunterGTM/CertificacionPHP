$.validator.addMethod('entero', function(value, element){
    var regex = new RegExp("^(0+[1-9]|[1-9])[0-9]*$");
    return regex.test(value);
},"Esta cantidad no puede ser menor o igual a 0");

$.validator.addMethod('dinero', function(value, element){
    var regex = new RegExp("^\\d+(?:\\.\\d{0,2})?$");
    return regex.test(value);
},"El monto no puede ser menor a Q0.00");

$.validator.addMethod("select", function (value, element, arg) {
    return arg !== value;
}, "Debe seleccionar una opción.");

var validator = $("#CrearPagoForm").validate({
    ignore: [],
    onkeyup: false,
    rules: {
        monto: {
            required: true,
            dinero: true,
        },
        mes: {
            required: true,
            select: "default",
        },
        anio: {
            required: true,
              select: "default",
        },
    },
    messages: {
        monto: {
            required: 'Por favor, ingrese el monto a pagar',
        },
    }
});
