
$(document).ready(function () {
    let id_paciente = document.getElementById('id_paciente').value;
    traerPacienteAll(id_paciente);
    mostarDetallespaciente(id_paciente);
});

const traerPacienteAll = async (id_paciente) => {
    const dataSet = [];
    try {
        let response = await fetch(`api/controller/historial-paciente/${id_paciente}`);
        let historil_paciente = await response.json();
        let count = 1;
        for (const cita_paciente of historil_paciente) {
            let datos = [];
            datos.push(count);
            datos.push(cita_paciente.id_cita);
            switch (cita_paciente.estado_cita) {
                case '1':
                    datos.push(`<button class='badge badge-warning  badge-xs' onclick="imformacionCita(${cita_paciente.id_cita})">Pendiente</button>`);
                    break;
                case '2':
                    datos.push(`<button class='badge badge-success  badge-xs' onclick="imformacionCita(${cita_paciente.id_cita})">Aplicada</button>`);
                    break;
                case '3':
                    datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita_paciente.id_cita})">Cancelada</button>`);
                    break;
                case '4':
                    datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita_paciente.id_cita})">Cancelada</button>`);
                    break;
                default:
                    console.log('entra aqui x2');
                    break;
            }
            datos.push(cita_paciente.nombre_paciente);
            datos.push(`
                <button class='badge badge-success  badge-sm' onclick='imformacionCita(${cita_paciente.id_cita})'><i class='mdi mdi-eye'></i> Info</button>
                <a class='badge badge-info badge-sm' href='extenciones/fpdf/generar-pdf.php?folio_cita=${cita_paciente.id_cita}' target="_blank"><i class='mdi mdi-printer'></i> Imprimir</a>
            `);
            count++;
            dataSet.push(datos);
        }
        $('#example').DataTable({
            data: dataSet,
            columns: [
                { title: "#" },
                { title: "Folio " },
                { title: "Status" },
                { title: "Paciente" },
                { title: "Acciones" }
            ]
        });
    } catch (error) {
        console.log(error);
    }
}


const mostarDetallespaciente = async (id_paciente) => {

    try {

        let response = await fetch(`api/controller/pacientes/${id_paciente}`);
        let paciente = await response.json();

        console.log(paciente);

        let templete = `
        <div class="row">
            <div class="col-12 text-center">
                <img src="view/assets/images/icons/pacient.svg" alt="" width="100" class="img-circle img-fluid">
            </div>
           <div class="col-12">
                <h2>${paciente.nombre_paciente} ${paciente.apaterno_paciente} ${paciente.amaterno_paciente}</h2>
                <h4><strong>Correo Electronico: </strong> ${paciente.correo_paciente} </h4>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> <b> Domicilio: </b>${paciente.domicilio_paciente} </li>
                    <li><i class="fa fa-phone"></i> <b> Telefono : </b>${paciente.telefono_paciente} </li>
                    <li><i class="fa fa-address-card"></i> <b> RFC : </b>${paciente.rfc_paciente} </li>
                    <li><i class="fa fa-allergies"></i> <b> Alergias : </b>${paciente.alergias_paciente} </li>
                </ul>
            </div>
        </div>`;

        document.getElementById('targetInfo').innerHTML = templete;

    } catch (error) {
        console.log(error);
    }

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
