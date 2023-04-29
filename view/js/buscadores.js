
/******** BUSCAR PACIENTE *********/

$(".txtPaciente").keyup(async function (e) {

    var ref = $(".contenedorPaciente li");
    if (e.which === 40) {
        abajoRecorrer(ref);
    } else if (e.which === 38) {
        arribaRecorrer(ref);
    } else if (e.which === 13) {
        enterPaciente();
    } else {
        var txt = $(".txtPaciente").val();
        if (txt.trim() === "") {
            $(".contenedorPaciente").hide();
            return;
        }
        let datos = {
            "tabla": "buscar_paciente",
            "item": "nombre_paciente",
            "valor": $(".txtPaciente").val()
        }
        try {
            let response = await fetch('api/controller/buscador', {
                method: 'POST',
                body: JSON.stringify(datos),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            let respuesta = await response.json();
            $(".contenedorPaciente").empty();
            if (respuesta.length > 0) {
                $(".contenedorPaciente").show();
                for (var n in respuesta) {
                    nombreLinea = respuesta[n]["nombre_paciente"];
                    var typeStyle = (n == 0) ? "seleccionado" : "deseleccionado";
                    $(".contenedorPaciente").append("<li class='" + typeStyle + "' onClick='ejecutarPaciente(" + respuesta[n]["id_paciente"] + ")' id='" + respuesta[n]["id_paciente"] + "'nombre='" + respuesta[n]["nombre_paciente"] + "'>" + nombreLinea + "</li>");
                }
            } else {
                $(".contenedorPaciente").hide();
            }
        } catch (error) {
            console.log(error);
        }
    }
});
function ejecutarPaciente(id) {
    $(".contenedorPaciente li").each(function () {
        if ($(this).attr("id") == id) {
            newlinea = $(this).attr("nombre");
            $(".txtPaciente").val("").val($(this).text());
            $("#id_paciente").val(id);
            $(".contenedorPaciente").hide()
        }
    })

}

function enterPaciente() {
    $(".contenedorPaciente li").each(function () {
        if ($(this).hasClass("seleccionado")) {
            let id = $(this).attr("id");
            $("#id_paciente").val(id);
            newlinea = $(this).attr("nombre");
            $(".txtPaciente").val("").val($(this).text())
            $(".contenedorPaciente").hide()
        }
    });
}
/******** BUSCAR Medico *********/
$(".txtMedico").keyup(async function (e) {

    var ref = $(".contenedorMedico li");
    if (e.which === 40) {
        abajoRecorrer(ref);
    } else if (e.which === 38) {
        arribaRecorrer(ref);
    } else if (e.which === 13) {
        enterMedico();
    } else {
        var txt = $(".txtMedico").val();
        if (txt.trim() === "") {
            $(".contenedorMedico").hide();
            return;
        }
        let datos = {
            "tabla": "buscar_medico",
            "item": "nombre_medico",
            "valor": $(".txtMedico").val()
        }
        try {
            let response = await fetch('api/controller/buscador', {
                method: 'POST',
                body: JSON.stringify(datos),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            let respuesta = await response.json();

            $(".contenedorMedico").empty();
            if (respuesta.length > 0) {
                $(".contenedorMedico").show();
                for (var n in respuesta) {
                    nombreLinea = respuesta[n]["nombre_medico"];
                    var typeStyle = (n == 0) ? "seleccionado" : "deseleccionado";
                    $(".contenedorMedico").append("<li class='" + typeStyle + "' onClick='ejecutarMedico(" + respuesta[n]["id_medico"] + ")' id='" + respuesta[n]["id_medico"] + "'nombre='" + respuesta[n]["nombre_medico"] + "'>" + nombreLinea + "</li>");
                }
            } else {
                $(".contenedorMedico").hide();
            }
        } catch (error) {
            console.log(error);
        }
    }
});


function ejecutarMedico(id) {
    $(".contenedorMedico li").each(function () {
        if ($(this).attr("id") == id) {
            newlinea = $(this).attr("nombre");
            $(".txtMedico").val("").val($(this).text());
            $("#id_medico").val(id);
            $(".contenedorMedico").hide()
        }
    })

}

function enterMedico() {
    $(".contenedorMedico li").each(function () {
        if ($(this).hasClass("seleccionado")) {
            let id = $(this).attr("id");
            $("#id_medico").val(id);
            newlinea = $(this).attr("nombre");
            $(".txtMedico").val("").val($(this).text())
            $(".contenedorMedico").hide()
        }
    });
}

function abajoRecorrer(ref) {
    //var ref = $(".contenedorSuela li");
    for (var i = 0; i < ref.length; i++) {
        if (ref[i].className == "seleccionado") {
            ref[i].className = "deseleccionado";
            if (i < ref.length - 1) {
                i++;
            } else {
                i = 0;
            }
            ref[i].className = "seleccionado"
        }
    }
}

function arribaRecorrer(ref) {
    //var ref = $(".contenedorSuela li");
    for (var i = 0; i < ref.length; i++) {
        if (ref[i].className == "seleccionado") {
            ref[i].className = "deseleccionado";
            if (i < ref.length && i > 0) {
                i--;
            } else {
                i = ref.length - 1;
            }
            ref[i].className = "seleccionado"
        }
    }
}
