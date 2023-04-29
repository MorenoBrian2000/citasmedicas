document.addEventListener('DOMContentLoaded', function () {
    genearDatatale();
    mostrarTotalMedicos();
    mostrarTotalPacientes();
    mostrarTotalEspecialidades();
    mostrarTotalServicios();
    mostrarTotalPaquetes();
    mostrarTotalCitas();
    mostrarTotalUsuarios();
});

const genearDatatale = async () => {
    var calendarEl = document.getElementById('calendar');
    var dataSet = [];
    try {
        let response = await fetch('api/controller/citas');
        let Citas = await response.json();
        for (const data of Citas) {
            let { folio_cita, horaInicio_cita, horaFin_cita, fechaProgramada_cita, id_cita } = data;
            let citaCalendar = { id: id_cita, title: folio_cita, start: fechaProgramada_cita + 'T' + horaInicio_cita, end: fechaProgramada_cita + 'T' + horaFin_cita, };
            dataSet.push(citaCalendar);
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'listMonth',
            height: 600,
            locale: 'es',
            headerToolbar: {
                start: 'title', // will normally be on the left. if RTL, will be on the right
                center: 'dayGridMonth,listMonth',
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

    } catch (error) {
        console.error(error);
    }

}


const mostrarTotalMedicos = async () => {
    let data = { tbl_value: 'tbl_medicos' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_medico').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}

const mostrarTotalPacientes = async () => {
    let data = { tbl_value: 'tbl_pacientes' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_paciente').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}


const mostrarTotalEspecialidades = async () => {
    let data = { tbl_value: 'tbl_especialidades' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_especialidades').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}


const mostrarTotalServicios = async () => {
    let data = { tbl_value: 'tbl_serivcios' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_servicios').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}

const mostrarTotalPaquetes = async () => {
    let data = { tbl_value: 'tbl_paquetes' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_paquetes').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}
const mostrarTotalCitas = async () => {
    let data = { tbl_value: 'tbl_citas' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_citas').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}



const mostrarTotalUsuarios = async () => {
    let data = { tbl_value: 'tbl_users' };
    try {
        let response = await fetch('api/controller/inicio', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let respuesta = await response.json();
        console.log(respuesta);

        $('#count_usuarios').html(respuesta.total);

    } catch (error) {
        console.log(error);
    }
}






