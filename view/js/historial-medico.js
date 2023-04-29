
$(document).ready(function () {
    let id_medico = document.getElementById('id_medico').value;
    traerMedicosAll(id_medico);
    mostarDetallesMedico(id_medico);
});

const traerMedicosAll = async (id_medico) => {
    const dataSet = [];
    try {
        let response = await fetch(`api/controller/historial-medico/${id_medico}`);
        let historil_medico = await response.json();

        for (const cita_medico of historil_medico) {
            let datos = [];
            datos.push(cita_medico.id_cita);
            datos.push(cita_medico.folio_cita);
            switch (cita_medico.estado_cita) {
                case '1':
                    datos.push(`<button class='badge badge-warning  badge-xs' onclick="imformacionCita(${cita_medico.id_cita})">Pendiente</button>`);
                    break;
                case '2':
                    datos.push(`<button class='badge badge-success  badge-xs' onclick="imformacionCita(${cita_medico.id_cita})">Aplicada</button>`);
                    break;
                case '3':
                    datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita_medico.id_cita})">Cancelada</button>`);
                    break;
                case '4':
                    datos.push(`<button class='badge badge-danger  badge-xs' onclick="imformacionCita(${cita_medico.id_cita})">Cancelada</button>`);
                    break;
                default:
                    console.log('entra aqui x2');
                    break;
            }
            datos.push(cita_medico.nombre_paciente);
            datos.push(`
                <button class='badge badge-success  badge-sm' onclick='imformacionCita(${cita_medico.id_cita})'><i class='mdi mdi-eye'></i> Info</button>
                <a class='badge badge-info badge-sm' href='extenciones/fpdf/generar-pdf.php?folio_cita=${cita_medico.folio_cita}' target="_blank"><i class='mdi mdi-printer'></i> Imprimir</a>
            `);
            dataSet.push(datos);
        }
        $('#example').DataTable({
            data: dataSet,
            columns: [
                { title: "#" },
                { title: "Folio Cita" },
                { title: "Status" },
                { title: "Paciente" },
                { title: "Acciones" }
            ]
        });
    } catch (error) {
        console.log(error);
    }
}


const mostarDetallesMedico = async (id_medico) => {

    try {

        let response = await fetch(`api/controller/medicos/${id_medico}`);
        let medico = await response.json();

        console.log(medico);

        let templete = `
        <div class="row">
            <div class="col-12 text-center">
                <img src="view/assets/images/icons/doctor.svg" alt="" width="100" class="img-circle img-fluid">
            </div>
           <div class="col-12">
                <h2>${medico.nombre_medico} ${medico.apaterno_medico} ${medico.amaterno_medico}</h2>
                <h4><strong>Especialidad: </strong> ${medico.nombre_especialidad} </h4>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Domicilio: ${medico.domicilio_medico} </li>
                    <li><i class="fa fa-phone"></i> Telefono #: ${medico.telefono_medico} </li>
                    <li><i class="fa fa-file-alt"></i> RFC : ${medico.rfc_medico} </li>
                    <li><i class="fa fa-file-medical-alt"></i> Cedula : ${medico.cedula_medico} </li>
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
                <a href='index.php?ruta=cita&id=${Cita.id_cita}'> <h2> ${Cita.folio_cita}</h2></a>
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
                </ul >
            </div >
        </div > `;

        document.getElementById('modalInfo').innerHTML = templete;

    } catch (error) {
        console.log(error);
    }

}
