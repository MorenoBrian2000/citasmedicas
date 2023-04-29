
document.addEventListener('DOMContentLoaded', function () { genearDatatale(); });

const genearDatatale = async () => {
    var calendarEl = document.getElementById('calendar');
    var dataSet = [];
    try {
        let response = await fetch('api/controller/citas');
        let Citas = await response.json();
        for (const data of Citas) {
            let { id_cita, horaInicio_cita, horaFin_cita, fechaProgramada_cita } = data;
            let citaCalendar = { id: id_cita, title: `Folio #${id_cita}`, start: fechaProgramada_cita + 'T' + horaInicio_cita, end: fechaProgramada_cita + 'T' + horaFin_cita };
            dataSet.push(citaCalendar);
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 600,
            locale: 'es',
            headerToolbar: {
                start: 'title', // will normally be on the left. if RTL, will be on the right
                center: 'dayGridMonth,timeGridWeek,listMonth',
                end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
            },
            themeSystem: 'bootstrap',
            titleFormat: {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
            },

            buttonText: {
                today: 'HOY',
                month: 'MES',
                week: 'SEMANA',
                day: 'DIA',
                list: 'LISTA'
            },
            timeZone: 'local',
            events: dataSet,
            dayMaxEventRows: true, // for all non-TimeGrid views
            views: {
                timeGrid: {
                    dayMaxEventRows: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                }
            },
            eventClick: function (info) {
                imformacionCita(info.event.id);
            },
            dateClick: function (date, jsEvent, view) {
                $("#modalAgregarCitas").modal('show');
                $("#fechaProgramada_cita").val(date.dateStr);
            }
        });
        calendar.render();

    } catch (error) {
        console.error(error);
    }

}


const mostrarDatosCita = async (id_cita) => {
    let response = await fetch(`api/controller/citas/${id_cita}`);
    let Citas = await response.json();

    $("#id_cita").val(Citas.id_cita);
    $("#txtPacienteU").val(Citas.nombre_paciente);
    $("#iid_pacienteU").val(Citas.iid_paciente);
    $("#txtMedicoU").val(Citas.nombre_medico);
    $("#id_medicoU").val(Citas.id_medico);
    $("#fechaProgramada_citaU").val(Citas.fechaProgramada_cita);
    $("#horaInicio_citaU").val(Citas.horaInicio_cita);
    $("#horaFin_citaU").val(Citas.horaFin_cita);


    $("#modalUpdateCitas").modal('show');
}


const crearCitas = async () => {

    let Citas = {
        iid_paciente: $("#iid_paciente").val(),
        id_medico: $("#id_medico").val(),
        fechaProgramada_cita: $("#fechaProgramada_cita").val(),
        horaInicio_cita: $("#horaInicio_cita").val(),
        horaFin_cita: $("#horaFin_cita").val(),
        status: "1",
    }

    console.log(JSON.stringify(Citas));

    let response = await fetch('api/controller/citas', {
        method: 'POST',
        body: JSON.stringify(Citas),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();
    if (data.response) {
        Swal.fire('Success!', 'Citas agregado con exito!', 'success');
        genearDatatale();
        $("#modalAgregarCitas").modal('hide');
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}


const actulizarCitas = async () => {

    let Citas = {
        id_cita: $("#id_cita").val(),
        iid_paciente: $("#iid_pacienteU").val(),
        id_medico: $("#id_medicoU").val(),
        fechaProgramada_cita: $("#fechaProgramada_citaU").val(),
        horaInicio_cita: $("#horaInicio_citaU").val(),
        horaFin_cita: $("#horaFin_citaU").val()
    }
    let response = await fetch('api/controller/citas', {
        method: 'PUT',
        body: JSON.stringify(Citas),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Cita actualizada con exito!', 'success');
        $("#modalUpdateCitas").modal('hide');
        genearDatatale();

    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}

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
            $("#iid_paciente").val(id);
            $(".contenedorPaciente").hide()
        }
    })

}

function enterPaciente() {
    $(".contenedorPaciente li").each(function () {
        if ($(this).hasClass("seleccionado")) {
            let id = $(this).attr("id");
            $("#iid_paciente").val(id);
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

// 
const imformacionCita = async (id_cita) => {

    $("#modalInfoCita").modal();

    try {

        let response = await fetch(`api/controller/citas/${id_cita}`);
        let Cita = await response.json();

        console.log(Cita);

        let templete = `
        <div class="row">
            <div class="col-12 text-center">
                <img src="https://cdn0.iconfinder.com/data/icons/doctors-specialist-1/60/patient__avatar__medical__man__boy-512.png" alt="" width="100" class="img-circle img-fluid">
            </div>
           <div class="col-12">
            <a href='index.php?ruta=cita&id=${Cita.id_cita}'> <h2> Folio #${Cita.id_cita}</h2></a>

                <h4><strong>Paciente: </strong> ${Cita.nombre_paciente} </h4>
                <h4><strong>Medico: </strong> ${Cita.nombre_medico} </h4>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-procedures"></i> <b> Asunto :  </b>${Cita.asunto_cita} </li>                    
                    <li><i class="fa fa-building"></i> <b> Enfermedad:  </b>${Cita.enfermedad_cita} </li>
                    <li><i class="fa fa-tablets"></i> <b> Medicamentos:  </b>${Cita.medicamentos_cita} </li>
                    <li><i class="fa fa-diagnoses"></i> <b> Sintomas:  </b>${Cita.sinstomas_cita} </li>
                    <li><i class="fa fa-calendar-check"></i> <b> Fecha Programada:  </b>${Cita.fechaProgramada_cita} </li>
                    <li><i class="fa fa-calendar-times"></i> <b> Fecha creada #:  </b>${Cita.fechaProgramada_cita} </li>
                </ul>
            </div>
        </div>`;

        document.getElementById('modalInfo').innerHTML = templete;

    } catch (error) {
        console.log(error);
    }

}