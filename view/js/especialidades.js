
$(document).ready(function () { traerespecialidadesAll(); });


const traerespecialidadesAll = async () => {
    try {
        Main.DataTable('example', 'api/controller/especialidades?datatable');
    } catch (error) {
        console.log(error);
    }
}


const traerEspecialidad = async (id_especialidad) => {

    let response = await fetch(`api/controller/especialidades/${id_especialidad}`);
    let especialidades = await response.json();

    $("#id_especialidad").val(especialidades.id_especialidad);
    $("#nombre_especialidad").val(especialidades.nombre_especialidad);
    $("#nombre_medico").val(especialidades.nombre_medico);
    $("#modalUpdateEspecialidades").modal('show');
}


const crearEspecialidades = async () => {

    let especialidades = {
        nombre_especialidad: $("#txt_nombre_especialidad").val().toUpperCase()
    }

    console.log(JSON.stringify(especialidades));
    let response = await fetch('api/controller/especialidades', {
        method: 'POST',
        body: JSON.stringify(especialidades),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();
    if (data.response) {
        Swal.fire('Success!', 'especialidades agregado con exito!', 'success');
        reloadDatatable();
        $(".form-control").val('');
        $("#modalAgregarEspecialidades").modal('hide');

    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}


const actulizarEspecialidades = async () => {

    let especialidades = {
        id_especialidad: $("#id_especialidad").val(),
        nombre_especialidad: $("#nombre_especialidad").val(),
    }

    let response = await fetch('api/controller/especialidades', {
        method: 'PUT',
        body: JSON.stringify(especialidades),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Especialidad actualizada con exito!', 'success');
        reloadDatatable();
        $("#modalUpdateEspecialidades").modal('hide');

    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}



const deleteespecialidades = (id_especialidad) => {


    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then(async (result) => {
        if (result.isConfirmed) {

            try {
                let response = await fetch(`api/controller/especialidades/${id_especialidad}`, {
                    method: 'DELETE'
                });
                let data = await response.json();
                if (data.response) {
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                    reloadDatatable();
                } else {
                    Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
                }

            } catch (error) {

                console.log(error);

            }


        }
    })


}


const reloadDatatable = () => {

    $('#example').dataTable().fnDestroy();
    traerespecialidadesAll();

}

/******** BUSCAR MEDICO AGREGAR *********/
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

// UODATE

$(".txtMedicoU").keyup(async function (e) {


    var ref = $(".contenedorMedicoU li");
    if (e.which === 40) {
        abajoRecorrer(ref);
    } else if (e.which === 38) {
        arribaRecorrer(ref);
    } else if (e.which === 13) {
        enterMedicoU();
    } else {
        var txt = $(".txtMedicoU").val();
        if (txt.trim() === "") {
            $(".contenedorMedicoU").hide();
            return;
        }
        let datos = {
            "tabla": "buscar_medico",
            "item": "nombre_medico",
            "valor": $(".txtMedicoU").val()
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

            $(".contenedorMedicoU").empty();
            if (respuesta.length > 0) {
                $(".contenedorMedicoU").show();
                for (var n in respuesta) {
                    nombreLinea = respuesta[n]["nombre_medico"];
                    var typeStyle = (n == 0) ? "seleccionado" : "deseleccionado";
                    $(".contenedorMedicoU").append("<li class='" + typeStyle + "' onClick='ejecutarMedicoU(" + respuesta[n]["id_medico"] + ")' id='" + respuesta[n]["id_medico"] + "'nombre='" + respuesta[n]["nombre_medico"] + "'>" + nombreLinea + "</li>");
                }
            } else {
                $(".contenedorMedicoU").hide();
            }
        } catch (error) {
            console.log(error);
        }
    }
});

function ejecutarMedicoU(id) {
    $(".contenedorMedicoU li").each(function () {
        if ($(this).attr("id") == id) {
            newlinea = $(this).attr("nombre");
            $(".txtMedicoU").val("").val($(this).text());
            $("#id_medicoU").val(id);
            $(".contenedorMedicoU").hide()
        }
    })

}

function enterMedicoU() {
    $(".contenedorMedicoU li").each(function () {
        if ($(this).hasClass("seleccionado")) {
            let id = $(this).attr("id");
            $("#id_medicoU").val(id);
            newlinea = $(this).attr("nombre");
            $(".txtMedicoU").val("").val($(this).text())
            $(".contenedorMedicoU").hide()
        }
    });
}

// 



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

