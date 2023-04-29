

document.addEventListener('DOMContentLoaded', async function () {
    traerCitasAll();
});


// Tables

const traerCitasAll = async () => {
    try {
        Main.DataTable('table-citas', 'api/controller/citas?datatable');
    } catch (error) {
        console.log(error);
    }
}


const traerCitasPendientes = async (Citas) => {

    let dataSet = [];
    let fecha = new Date();
    let toDay = fecha.toJSON();
    // let filter = Citas.filter(Citas => Citas.fechaProgramada_cita > toDay.substring(0, 10));
    let filter = Citas.filter(Citas => Citas.estado_cita == 1);

    for (const cita of filter) {
        let datos = [];
        datos.push(cita.id_cita);
        datos.push(cita.nombre_paciente);
        switch (cita.estado_cita) {
            case '1':
                datos.push(`<button class='badge badge-warning  badge-xs' onclick="imformacionCita(${cita.id_cita})">Pendiente</button>`);
                break;
            case '2':
                datos.push(`<button class='badge badge-success  badge-xs' onclick="imformacionCita(${cita.id_cita})">Aplicada</button>`);
                break;
            case '3':
                datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita.id_cita})">Cancelada</button>`);
                break;
            case '4':
                datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita.id_cita})">Cancelada</button>`);
                break;
            default:
                console.log('entra aqui x2');
                break;
        }
        datos.push(cita.fechaProgramada_cita);
        datos.push(cita.horaInicio_cita);
        datos.push(cita.horaFin_cita);
        datos.push(`<button class='badge badge-success  badge-sm' onclick="imformacionCita(${cita.id_cita})"><i class='mdi mdi-eye'></i> Info</button>
                        <a class='badge badge-info badge-sm' href='extenciones/fpdf/generar-pdf.php?folio_cita=${cita.id_cita}' target="_blank"><i class='mdi mdi-printer'></i> Imprimir</a>
                        <a class='badge badge-primary badge-sm' href='index.php?ruta=cita&id=${cita.id_cita}'><i class='mdi mdi-pencil'></i> Editar</a>
                        <button class='badge badge-danger badge-sm' btn-sm' onclick="deleteCitas(${cita.id_cita})"><i class='mdi mdi-delete'></i> Elimiar</button>
                    `);
        dataSet.push(datos);
    }
    $('#tablePendientes').DataTable({
        data: dataSet,
        columns: [
            { title: "#" },
            { title: "Paciente" },
            { title: "Status" },
            { title: "Fecha" },
            { title: "Hora Inicio" },
            { title: "Hora Fin" },
            { title: "Acciones" }
        ]
    });
}

const traerCitasAplicadas = async (Citas) => {

    let dataSet = [];
    let filter = Citas.filter(Citas => Citas.estado_cita == 2);

    for (const cita of filter) {
        let datos = [];
        datos.push(cita.id_cita);
        datos.push(cita.nombre_paciente);
        switch (cita.estado_cita) {
            case '1':
                datos.push(`<button class='badge badge-warning  badge-xs' onclick="imformacionCita(${cita.id_cita})">Pendiente</button>`);
                break;
            case '2':
                datos.push(`<button class='badge badge-success  badge-xs' onclick="imformacionCita(${cita.id_cita})">Aplicada</button>`);
                break;
            case '3':
                datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita.id_cita})">Cancelada</button>`);
                break;
            case '4':
                datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita.id_cita})">Cancelada</button>`);
                break;
            default:
                console.log('entra aqui x2');
                break;
        }
        datos.push(cita.fechaProgramada_cita);
        datos.push(cita.horaInicio_cita);
        datos.push(cita.horaFin_cita);
        datos.push(`<button class='badge badge-success  badge-sm' onclick="imformacionCita(${cita.id_cita})"><i class='mdi mdi-eye'></i> Info</button>
                        <a class='badge badge-info badge-sm' href='extenciones/fpdf/generar-pdf.php?folio_cita=${cita.id_cita}' target="_blank"><i class='mdi mdi-printer'></i> Imprimir</a>
                        <a class='badge badge-primary badge-sm' href='index.php?ruta=cita&id=${cita.id_cita}'><i class='mdi mdi-pencil'></i> Editar</a>
                        <button class='badge badge-danger badge-sm' btn-sm' onclick="deleteCitas(${cita.id_cita})"><i class='mdi mdi-delete'></i> Elimiar</button>
                    `);
        dataSet.push(datos);
    }
    $('#tableAplicadas').DataTable({
        data: dataSet,
        columns: [
            { title: "#" },
            { title: "Paciente" },
            { title: "Status" },
            { title: "Fecha" },
            { title: "Hora Inicio" },
            { title: "Hora Fin" },
            { title: "Acciones" }
        ]
    });
}

const traerCitasCanceladas = async (Citas) => {

    let dataSet = [];
    // let filter1 = Citas.filter(Citas => );
    let filter2 = Citas.filter(Citas => Citas.estado_cita == 4);
    let filter1 = Citas.filter(Citas => Citas.estado_cita == 3);
    console.log(filter1);
    for (const cita of filter2) {
        let datos = [];
        datos.push(cita.id_cita);
        datos.push(cita.nombre_paciente);
        switch (cita.estado_cita) {
            case '1':
                datos.push(`<button class='badge badge-warning  badge-xs' onclick="imformacionCita(${cita.id_cita})">Pendiente</button>`);
                break;
            case '2':
                datos.push(`<button class='badge badge-success  badge-xs' onclick="imformacionCita(${cita.id_cita})">Aplicada</button>`);
                break;
            case '3':
                datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita.id_cita})">Cancelada</button>`);
                break;
            case '4':
                datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita.id_cita})">Cancelada</button>`);
                break;
            default:
                console.log('entra aqui x2');
                break;
        }
        datos.push(cita.fechaProgramada_cita);
        datos.push(cita.horaInicio_cita);
        datos.push(cita.horaFin_cita);
        datos.push(`<button class='badge badge-success  badge-sm' onclick="imformacionCita(${cita.id_cita})"><i class='mdi mdi-eye'></i> Info</button>
                        <a class='badge badge-info badge-sm' href='extenciones/fpdf/generar-pdf.php?folio_cita=${cita.id_cita}' target="_blank"><i class='mdi mdi-printer'></i> Imprimir</a>
                        <a class='badge badge-primary badge-sm' href='index.php?ruta=cita&id=${cita.id_cita}'><i class='mdi mdi-pencil'></i> Editar</a>
                        <button class='badge badge-danger badge-sm' btn-sm' onclick="deleteCitas(${cita.id_cita})"><i class='mdi mdi-delete'></i> Elimiar</button>
                    `);
        dataSet.push(datos);
    }
    $('#tableCanceladas').DataTable({
        data: dataSet,
        columns: [
            { title: "#" },
            { title: "Paciente" },
            { title: "Status" },
            { title: "Fecha" },
            { title: "Hora Inicio" },
            { title: "Hora Fin" },
            { title: "Acciones" }
        ]
    });
}

// function
const traerCita = async (id_cita) => {
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
            <a href='index.php?ruta=cita&id=${Cita.id_cita}'> <h2>Folio : #${Cita.id_cita}</h2></a>

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

const crearCitas = async () => {

    let Citas = {
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
        status: "1",
    }

    console.log(Citas);

    let response = await fetch('api/controller/citas', {
        method: 'POST',
        body: JSON.stringify(Citas),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();

    console.log(data);
    if (data.response) {
        Swal.fire('Success!', 'Citas agregado con exito!', 'success');
        location.reload();
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}
const deleteCitas = (id_cita) => {

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
                let response = await fetch(`api/controller/citas/${id_cita}`, {
                    method: 'DELETE'
                });
                let data = await response.json();
                if (data.response) {
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                    reloadTable();
                } else {
                    Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
                }

            } catch (error) {

                console.log(error);

            }


        }
    })


}

const reloadTable = () => {
    $('#example').dataTable().fnDestroy();
    traerCitasAll();
}

const updateStatusCita = async (id_cita) => {
    let response = await fetch(`api/controller/citas/${id_cita}`);
    let Citas = await response.json();
    $("#id_update_cita").val(id_cita);
    $("#id_estado_cita").val(Citas.estado_cita);
    $("#id_estado_pago").val(Citas.estado_cita);
    $("#modalUpdateStatus").modal();
}

document.getElementById('updateStatusCita').addEventListener('click', async (e) => {


    let getData = {
        id_cita: $("#id_update_cita").val(),
        estado_cita: $("#id_estado_cita").val(),
        estatus_pago: $("#id_estado_pago").val(),
        action: 'updateStatusCita'
    }

    console.log(getData);

    try {

        let consulta = await fetch('api/controller/update-field', {
            method: 'PUT',
            body: JSON.stringify(getData),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        let response = await consulta.json();
        if (response.response) {
            console.log(getData.estado_cita);
            switch (getData.estado_cita) {
                case '2':
                    generarPagoCitaCompletada(getData.id_cita);
                    break;
                default:
                    console.log('tipo de cita');
                    break;
            }
            Swal.fire('Success!', 'Cita acutalizada con exito!', 'success');
            // location.reload();
        } else {
            Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
        }
    } catch (error) {
        console.log(error);
    }

})

document.getElementById('id_estado_cita').addEventListener('change', () => {

    switch ($("#id_estado_cita").val()) {
        case '1':
            $("#id_estado_pago").val('1');
            break;
        case '2':
            $("#id_estado_pago").val('1');
            break;
        case '3':
            $("#id_estado_pago").val('3');
            break;
        case '4':
            $("#id_estado_pago").val('3');
            break;
        default:
            break;
    }

})


const generarPagoCitaCompletada = async (id_cita) => {


    let response = await fetch(`api/controller/citas/${id_cita}`);
    let Citas = await response.json();


    let data = {
        id_cita: Citas.id_cita,
        id_cita: Citas.id_cita,
        monto_total: (parseFloat(Citas.pago_cita) * 1.16),
        monto_abonado: 0,
        monto_subtotal: Citas.pago_cita,
        tipo_pago: 'EFECTIVO',
        notas: 'PAGO CITA',
    }
    try {
        let response = await fetch('api/controller/pagos', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let result = await response.json();
        if (result.response) {

            let paquete_servicio = {
                folio_pago: result.folio_pago,
                tipo: 'PAGO CITA',
                id_paquete_servicio: '4',
                costo: Citas.pago_cita,
                iva: (Citas.pago_cita * 0.16),
                subtotal: (Citas.pago_cita * 1.16)
            };
            let response2 = await fetch('api/controller/pago-detalle', {
                method: 'POST',
                body: JSON.stringify(paquete_servicio),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            let result2 = await response2.json();
            validar = result2.response;
            if (validar) {
                Swal.fire('Pago Registrado Con Exito!', 'Se guardaron correctamente los datos!', 'success').then(result => {
                    // location.reload.();
                    window.location = 'pagos';
                })
            }

        } else {
            Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
        }

    } catch (error) {
        console.log(error);
    }
}

const enviarMensajeCita = () => $("#modal-mensaje").modal();
const sendSMS = () => {
    let mensaje = document.getElementById('txt_mensaje').value;
    let telefono = document.getElementById('txt_numtelefono').value;
    $.post("controller/enviar-sms.controlador.php", { mensaje: mensaje, telefono: telefono, action: 'ctrEnviarSMS' }, function (result) {
        console.log(result);
    });
}
