
document.addEventListener('DOMContentLoaded', function () {
    let id_paciente = $("#id_cita").val();
    traerCita(id_paciente);
});


const traerCita = async (id_cita) => {
    let response = await fetch(`api/controller/citas/${id_cita}`);
    let Cita = await response.json();
    $("#id_cita").val(Cita.id_cita);
    $(".txtPaciente").val(Cita.nombre_paciente);
    $(".txtMedico").val(Cita.nombre_medico);
    $("#id_paciente").val(Cita.id_paciente);
    $("#id_medico").val(Cita.id_medico);
    $("#fechaProgramada_cita").val(Cita.fechaProgramada_cita);
    $("#horaInicio_cita").val(Cita.horaInicio_cita);
    $("#horaFin_cita").val(Cita.horaFin_cita);
    $("#asunto").val(Cita.asunto_cita);
    $("#nota").val(Cita.nota_cita);
    $("#emfermedad").val(Cita.enfermedad_cita);
    $("#sintomas").val(Cita.sinstomas_cita);
    $("#medicamentos").val(Cita.medicamentos_cita);
    $("#estado_cita").val(Cita.estado_cita);
    $("#estado_pago").val(Cita.estatus_pago);
    $("#costo").val(Cita.pago_cita);
}

const actulizarCitas = async () => {
    let Citas = {
        id_cita: $("#id_cita").val(),
        id_paciente: $("#id_paciente").val(),
        id_medico: $("#id_medico").val(),
        fechaProgramada_cita: $("#fechaProgramada_cita").val(),
        horaInicio_cita: $("#horaInicio_cita").val(),
        horaFin_cita: $("#horaFin_cita").val(),
        asunto_cita: $("#asunto").val(),
        nota_cita: $("#nota").val(),
        enfermedad_cita: $("#emfermedad").val(),
        sinstomas_cita: $("#sintomas").val(),
        medicamentos_cita: $("#medicamentos").val(),
        estado_cita: $("#estado_cita").val(),
        estatus_pago: $("#estado_pago").val(),
        pago_cita: $("#costo").val(),
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
        // location.reload();
        traerCita($("#id_cita").val());
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}

