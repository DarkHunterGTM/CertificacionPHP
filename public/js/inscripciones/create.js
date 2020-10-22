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


var validator = $("#InscripcionForm").validate({
    ignore: [],
    onkeyup: false,
    rules: {
        nombre_estudiante: {
            required: true,
        },
        carnet: {
            required: true,
        },
        cui: {
            required: true,
            dpi: true,
        },
        telefono_estudiante: {
            required: true,
            ntel: true,
        },
        ciclo: {
            required: true,
            select: 'default'
        },
        genero_estudiante: {
            required: true,
            select: 'default'
        },
        direccion_estudiante: {
            required: true
        },
        //validaciones informacion del padre
        nombre_padre: {
            required: true,
        },
        apellido_padre: {
            required: true,
        },
        telefono_padre: {
            required: true,
            ntel: true,
        },
        dpi_padre: {
            required: true,
            dpi: true,
        },
        genero_padre: {
            required: true,
              select: 'default',
        },
        direccion_padre: {
            required: true,
        },
        //validaciones informacion de la madre
        nombre_madre: {
            required: true,
        },
        apellido_madre: {
            required: true,
        },
        telefono_madre: {
            required: true,
            ntel: true,
        },
        dpi_madre: {
            required: true,
            dpi: true,
        },
        genero_madre: {
            required: true,
              select: 'default'
        },
        direccion_madre: {
            required: true,
        },
    },
    messages: {
        nombre_estudiante: {
            required: 'Por favor, ingrese el nombre del Estudiante',
        },
        carnet: {
            required: 'Por favor, ingrese el numero de carnet del estudiante',
        },
        cui: {
            required: 'Por favor, ingrese el número de cui del estudiante'
        },
        telefono_estudiante: {
            required: 'Por favor, ingrese el número de telefono del estudiante',
        },
        direccion_estudiante: {
            required: 'Por favor, ingrese la dirección del estudiante',
        },
        telefono_estudiante: {
            required: 'Por favor, ingrese el número de telefono del estudiante',
        },
        //validacion del Padre
        nombre_padre: {
            required: 'Por favor, ingrese el nombre del padre',
        },
        apellido_padre: {
            required: 'Por favor, ingrese el apellido del padre',
        },
        telefono_padre: {
            required: 'Por favor, ingrese el número de teléfono',
        },
        dpi_padre: {
            required: 'Por favor, ingrese el número de dpi del padre',
        },
        direccion_padre: {
            required: 'Por favor, ingrese la dirección del padre',
        },
        //validacion del Madre
        nombre_madre: {
            required: 'Por favor, ingrese el nombre del madre',
        },
        apellido_madre: {
            required: 'Por favor, ingrese el apellido del madre',
        },
        telefono_madre: {
            required: 'Por favor, ingrese el número de teléfono',
        },
        dpi_madre: {
            required: 'Por favor, ingrese el número de dpi del madre',
        },
        direccion_madre: {
            required: 'Por favor, ingrese la dirección del madre',
        },
    }
});
