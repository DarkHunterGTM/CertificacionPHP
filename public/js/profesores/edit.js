$.validator.addMethod("ntel", function (value, element) {
    var valor = value.length;
    if (valor == 8) {
        return true;
    }
    else {
        return false;
    }
}, "Debe ingresar el número de teléfono con 8 dígitos, en formato ########");

$.validator.addMethod('entero', function (value, element) {
    var regex = new RegExp("^(0+[0-9]|[0-9])[0-9]*$");
    return regex.test(value);
}, "Esta cantidad no puede ser menor  a 0");

$.validator.addMethod("select", function (value, element, arg) {
    return arg !== value;
}, "Debe seleccionar una opción.");

function cuiIsValid(dpi) {
    var console = window.console;
    console.log(dpi);
    if (!dpi) {
        console.log("CUI vacío");
        return true;
    }

    var cuiRegExp = /^[0-9]{4}\s?[0-9]{5}\s?[0-9]{4}$/;

    if (!cuiRegExp.test(dpi)) {
        console.log("CUI con formato inválido");
        return false;
    }

    dpi = dpi.replace(/\s/, '');
    var depto = parseInt(dpi.substring(9, 11), 10);
    console.log(depto);
    var muni = parseInt(dpi.substring(11, 13));
    var numero = dpi.substring(0, 8);
    var verificador = parseInt(dpi.substring(8, 9));
    console.log(verificador);
    // Se asume que la codificación de Municipios y
    // departamentos es la misma que esta publicada en
    // http://goo.gl/EsxN1a

    // Listado de municipios actualizado segun:
    // http://goo.gl/QLNglm

    // Este listado contiene la cantidad de municipios
    // existentes en cada departamento para poder
    // determinar el código máximo aceptado por cada
    // uno de los departamentos.
    var munisPorDepto = [
        /* 01 - Guatemala tiene:      / 17 / municipios. */ 17,
        /* 02 - El Progreso tiene:    /  8 / municipios. */ 8,
        /* 03 - Sacatepéquez tiene:   / 16 / municipios. */ 16,
        /* 04 - Chimaltenango tiene:  / 16 / municipios. */ 16,
        /* 05 - Escuintla tiene:      / 13 / municipios. */ 13,
        /* 06 - Santa Rosa tiene:     / 14 / municipios. */ 14,
        /* 07 - Sololá tiene:         / 19 / municipios. */ 19,
        /* 08 - Totonicapán tiene:    /  8 / municipios. */ 8,
        /* 09 - Quetzaltenango tiene: / 24 / municipios. */ 24,
        /* 10 - Suchitepéquez tiene:  / 21 / municipios. */21,
        /* 11 - Retalhuleu tiene:     /  9 / municipios. */ 9,
        /* 12 - San Marcos tiene:     / 30 / municipios. */30,
        /* 13 - Huehuetenango tiene:  / 32 / municipios. */32,
        /* 14 - Quiché tiene:         / 21 / municipios. */21,
        /* 15 - Baja Verapaz tiene:   /  8 / municipios. */8,
        /* 16 - Alta Verapaz tiene:   / 17 / municipios. */17,
        /* 17 - Petén tiene:          / 14 / municipios. */14,
        /* 18 - Izabal tiene:         /  5 / municipios. */5,
        /* 19 - Zacapa tiene:         / 11 / municipios. */11,
        /* 20 - Chiquimula tiene:     / 11 / municipios. */11,
        /* 21 - Jalapa tiene:         /  7 / municipios. */7,
        /* 22 - Jutiapa tiene:        / 17 / municipios. */17
    ];

    if (depto === 0 || muni === 0)
    {
        console.log("CUI con código de municipio o departamento inválido.");
        return false;
    }

    if (depto > munisPorDepto.length)
    {
        console.log("CUI con código de departamento inválido.");
        return false;
    }

    if (muni > munisPorDepto[depto -1])
    {
        console.log("CUI con código de municipio inválido.");
        return false;
    }

    // Se verifica el correlativo con base
    // en el algoritmo del complemento 11.
    var total = 0;

    for (var i = 0; i < numero.length; i++)
    {
        total += numero[i] * (i + 2);
    }

    var modulo = (total % 11);

    console.log("CUI con módulo: " + modulo);
    return modulo === verificador;
}


$.validator.addMethod("dpi", function(value, element) {
		var valor = value;
		if (cuiIsValid(valor) == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}, "El CUI/DPI ingresado está incorrecto");

  $.validator.addMethod("ntel", function (value, element) {
      var valor = value.length;

      if (valor == 8 || valor == 0) {
          return true;
      }
      else {
          return false;
      }
  }, "Debe ingresar el número de teléfono con 8 dígitos, en formato ########");

  $.validator.addMethod('entero', function(value, element){
      var regex = new RegExp("^(0+[1-9]|[1-9])[0-9]*$");
      return regex.test(value);
  },"Solo utilizar numeros");
var validator = $("#EditarProfesorForm").validate({
    ignore: [],
    onkeyup: false,
    rules: {
        nombre: {
            required: true,
        },
        dpi: {
            required: true,
            dpi: true,
        },
    },
    messages: {
        nombre: {
            required: 'Por favor, ingrese el nombre',
        },
        dpi: {
            required: 'Por favor, ingrese el número de dpi'
        },
    }
});
