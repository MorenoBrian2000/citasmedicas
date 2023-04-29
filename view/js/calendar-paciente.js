
const buscarCitasMedico = async () => {
    let id_paciente = $('#id_paciente').val();
    if (parseInt(id_paciente)) {
        try {
            let data = { action: 'forPaciente', id_paciente }
            let response = await fetch('api/controller/calendar', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            let Citas = await response.json();
            genearCalendar(Citas);
        } catch (error) {
            console.error(error);

        }
    } else {
        alert('Ingresa el nombre del medico');
    }
}

const genearCalendar = (Citas) => {
    var calendarEl = document.getElementById('calendar-medico');
    var dataSet = [];

    for (const data of Citas) {
        let { folio_cita, horaInicio_cita, horaFin_cita, fechaProgramada_cita, id_cita } = data;
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
            mostrarDatosCita(info.event.id);
        },
        dateClick: function (date, jsEvent, view) {
            $("#modalAgregarCitas").modal('show');
            $("#fechaProgramada_cita").val(date.dateStr);
        }
    });
    calendar.render();

}




const mostrarDatosCita = async (id_cita) => {
    let response = await fetch(`api/controller/citas/${id_cita}`);
    let Citas = await response.json();

    $("#id_cita").val(Citas.id_cita);
    $("#txtPacienteU").val(Citas.nombre_paciente);
    $("#id_pacienteU").val(Citas.id_paciente);
    $("#txtMedicoU").val(Citas.nombre_medico);
    $("#id_medicoU").val(Citas.id_medico);
    $("#fechaProgramada_citaU").val(Citas.fechaProgramada_cita);
    $("#horaInicio_citaU").val(Citas.horaInicio_cita);
    $("#horaFin_citaU").val(Citas.horaFin_cita);


    $("#modalUpdateCitas").modal('show');
}


const crearCitas = async () => {

    let Citas = {
        id_paciente: $("#id_paciente").val(),
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
        id_paciente: $("#id_pacienteU").val(),
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
            <a href='index.php?ruta=cita&id=${Cita.id_cita}'> <h2> Folio #${id_cita}</h2></a>

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