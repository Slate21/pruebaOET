window.onload = inicio();

// Variables que determinana si se muestra o no el formulario
let formVehiculo = 0;
let formconductor_propietario = 0;

// Definiendo variables de los formularios a utilizar
// Variables Submit
let divFormulario_Vehiculos = document.getElementById("div_reguistrarVehiculo");
let divFormulario_PropietarioConductor = document.getElementById("div_reguistrarPersona");

function inicio() {
    // Variables para verificar si los formularios están abiertos o cerrados default 0


    // Agregando event Listener a los botones vehiculo y conducto/propietario
    let btnVehiculos = document.getElementById("btnVehiculos");
    let btnConPro = document.getElementById("btnConPro");

    //Al darle click, muestra el formulario o lo oculta

    btnVehiculos.addEventListener("click", function () {
        // Se encarga de mostrar o ocultar el formulario segun el estado de la variable formVehiculo
        formularioVehiculos();
    }, false);

    btnConPro.addEventListener("click", function () {
        // Se encarga de mostrar o ocultar el formulario segun el estado de la variable formVehiculo
        formularioPersona();
    }, false);

}

//Se encarga de activar o desactivar el formulario vehiculos
function formularioVehiculos() {

    // si está en 0 activa el formulario si está en uno lo desactiva
    if (formVehiculo == 0) {
        // Activa el formulario
        formVehiculo = 1;
        divFormulario_Vehiculos.style = "display: block";

        // Desactiva el formulario de agregar personas
        divFormulario_PropietarioConductor.style = "display: none";
        if (formconductor_propietario) formconductor_propietario = 0;

    } else if (formVehiculo == 1) {

        // Si se cliqueo y ya estaba activado el formulario, se cerrará
        formVehiculo = 0;
        divFormulario_Vehiculos.style = "display: none";

    }
}

//Se encarga de activar o desactivar el formulario persona
function formularioPersona() {
    // Valida si está activo el formulario persona o no
    if (formconductor_propietario == 0) {
        // Pone ela variable formconductor_propietario en 1 quie significa que está activo
        formconductor_propietario = 1;
        divFormulario_PropietarioConductor.style = "display: block";

        // Desactiva el formulario vehiculos si está activo 
        divFormulario_Vehiculos.style = "display: none";
        if (formVehiculo) formVehiculo = 0;

    } else {
        
        // Si se cliqueo y ya estaba activado el formulario, se cerrará
        formconductor_propietario = 0;
        divFormulario_PropietarioConductor.style = "display: none";

    }
}

// Validación de formularios por JQuery
// Formulario Vehiculos
$(document).ready(function () {
    $("#form_vehiculos").validate({
        rules: {
            Placa: {
                required: true,
                minlength: 5
            },
            color: {
                required: true,
                minlength: 3
            },
            CC_Conductor: {
                required: true,
                minlength: 5
            },
            CC_propietario: {
                required: true,
                minlength: 5
            }

        },
        // Mensajes si la validación es erronea
        messages: {
            Placa: {
                required: "Tiene que ingresar la placa",
                minlength: "La placa debe tener al menos 5 caracteres"
            },
            color: {
                required: "Tiene que ingresar un color",
                minlength: "El color debe ser de al menos 3 caracteres"
            },
            CC_Conductor: {
                required: "Debe ingresar la cedula del conductor",
                minlength: "Muy pocos caracteres para la cedula de conductor"
            },
            CC_propietario: {
                required: "Debe ingresar la cedula del propietario",
                minlength: "Muy pocos caracteres para la cedula de propietario"
            }
        }
    });
});


// Formulario Persona
$(document).ready(function () {
    $("#form_persona").validate({
        rules: {
            CC_Persona: {
                required: true,
                minlength: 5
            },
            name_persona: {
                required: true,
                minlength: 5
            },
            lastname_persona: {
                required: true,
                minlength: 5
            },
            location_persona: {
                required: true,
                minlength: 5
            },
            city: {
                required: true,
                minlength: 5
            },
            numberP: {
                required: true,
                minlength: 5
            }
        },
        // Mensajes si la validación es erronea
        messages: {
            CC_Persona: {
                required: "Por favor ingrese la cedula de la persona",
                minlength: "Ha ingresado muy pocos datos"
            },
            name_persona: {
                required: "Ingrese el nombre de la persona",
                minlength: "Ha ingresado muy pocos datos"
            },
            lastname_persona: {
                required: "Ingrese el apellido de la persona",
                minlength: "Ha ingresado muy pocos datos"
            },
            location_persona: {
                required: "Debe ingresar la dirección",
                minlength: "Ha ingresado muy pocos datos"
            },
            city: {
                required: "Debe ingresar la ciudad",
                minlength: "Ha ingresado muy pocos datos"
            },
            numberP: {
                required: "Debe ingresar el número telefónico",
                minlength: "Ha ingresado muy pocos datos"
            }
        }
    });
});
