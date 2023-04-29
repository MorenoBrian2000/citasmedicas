

document.addEventListener('DOMContentLoaded', async function () {
    try {
        let response = await fetch('api/controller/pagos');
        let Pagos = await response.json();
        traerPagosAll(Pagos);
    } catch (error) {
        console.log(error);
    }
});


// Tables
var producto_detalle = [];

const traerPagosAll = Pagos => {
    const dataSet = [];
    let contador = 1;
    for (const pago of Pagos) {
        let datos = [];
        datos.push(contador);
        datos.push(pago.folio_pago);
        datos.push(pago.folio_cita);
        datos.push(pago.nombre_paciente);
        datos.push(`$ ${pago.monto_total}`);
        datos.push(`$ ${pago.monto_abonado}`);
        // datos.push(pago.status_pago);
        if (pago.status_pago == 0) {
            datos.push(`<button class='badge badge-warning  badge-sm'>Pendiente</button>`);
        } else {
            datos.push(`<button class='badge badge-success  badge-sm'>Pagado</button>`);
        }
        datos.push(`
            <a class='badge badge-warning badge-sm' href='index.php?ruta=abonos&id=${pago.id_pago}&folio=${pago.folio_pago}'><i class='mdi mdi-dollar'></i> Abonos</a>
            <button class='badge badge-success  badge-sm' onclick="datallesPagos(${pago.id_pago} , '${pago.folio_pago}' )"><i class='mdi mdi-eye'></i> View</button>
            <a class='badge badge-info badge-sm' href='index.php?ruta=factura&folio_pago=${pago.folio_pago}' ><i class='mdi mdi-printer'></i> Imprimir</a>
            <button class='badge badge-primary badge-sm' onclick='agrgearDetallePago("${pago.folio_pago}" ,"${pago.folio_cita}");'><i class='mdi mdi-pencil'></i> Editar</button>  
        `);
        // <a class='badge badge-primary badge-sm' href='index.php?ruta=pago&id=${pago.folio_pago}'><i class='mdi mdi-pencil'></i> Editar</a>  
        dataSet.push(datos);
        contador++;
    }
    $('#tablePagosAll').DataTable({
        data: dataSet,
        columns: [
            { title: "#" },
            { title: "Folio Pago" },
            { title: "Folio Cita" },
            { title: "Paciente" },
            { title: "Monto Total" },
            { title: "Monto Abonado" },
            { title: "Status" },
            { title: "Acciones" },
        ]
    });
}


const agregarAbonoPago = () => {

    $("#modalAbono").modal();

}

const datallesPagos = async (id_pago, folio_pago) => {
    $("#modalInfoPago").modal()

    let templete = ``;
    let datos = {
        "tabla": "tbl_pago_detalle",
        "item": "folio_pago",
        "valor": folio_pago
    };

    try {

        let templete = ``;

        let response = await fetch('api/controller/buscador', {
            method: 'POST',
            body: JSON.stringify(datos),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let detalles = await response.json();

        templete += `<table id="tableDetallesCompra" class="table" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Paquete / Servicio</th>
                <th>Costo</th>
                <th>Iva</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody id="detallesCompra">`;

        for (const detalle of detalles) {
            templete += `<tr>
                    <td>${detalle.id_pago_detalle}</td>
                    <td>${detalle.tipo}</td>
                    <td>${detalle.subtotal}</td>
                    <td>${detalle.iva}</td>
                    <td>${detalle.costo}</td>
                </tr>`;
        }

        templete += ` </tbody > `


        let respuesta_2 = await fetch(`api/controller/pagos/${id_pago}`);
        let pago_cita2 = await respuesta_2.json();


        templete += `<div class="row">
                    <div class="col-12 text-center">
                        <img src="view/assets/images/icons/paymet.svg" alt="" width="100" class="img-circle img-fluid">
                    </div>
                   <div class="col-12">
                        <h2>${pago_cita2.nombre_paciente}</h2>
                        <h4><strong>Folio Pago: </strong> ${pago_cita2.folio_pago} </h4>
                    </div>
                    <div class="col-12">
                        <ul class="list-unstyled">
                            <li> *  Cantidad Abonada: $ ${pago_cita2.monto_abonado} </li>
                            <li> *  Subtotal : $ ${pago_cita2.monto_subtotal} </li>
                            <li> *  Total : $ ${pago_cita2.monto_total} </li>
                            <li> *  Tipo de Pago : ${pago_cita2.tipo_pago} </li>
                            <li> *  Fecha : ${pago_cita2.fecha} </li>
                            <li> *  Notas : ${pago_cita2.notas} </li>
                        </ul>
                    </div>
        
        </div>`;

        document.getElementById('modalInfo').innerHTML = templete;


    } catch (error) {
        console.log(error);
    }

    $("#detallesCompra").html(templete);

}

/*  */
const agrgearDetallePago = async (folio_pago, folio_cita) => {
    $("#modalDetallePago").modal();
    $("#folio_cita").val(folio_cita);
    let datos = {
        tabla: "tbl_citas",
        item: "folio_cita",
        valor: folio_cita
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
        let _consulta = await fetch(`api/controller/citas/${respuesta[0].id_cita}`);
        let _respuesta = await _consulta.json();

        document.getElementById('nombre_paciente').value = _respuesta.nombre_paciente;
        document.getElementById('nombre_medico').value = _respuesta.nombre_medico;
    } catch (e) {
        console.log(e);
    }
}

const nuevaFila = () => {

    var contador = $('#tabla-pago >tbody >tr').length;
    let templete = `<tr id=fila${contador}>
        <td><button type="button" onclick="deleteFila(${contador}); generarTotales();" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
        <td>
            <select class="form-control form-control-sm" style="color: black;" id="selectTipo${contador}" onchange="selecionarTipo(${contador});"">
                <option>Selecciona un opcion </option>
                <option value="1" >PAQUETE</option>
                <option value="2" >SERVICIO</option>
            </select>
        </td>
        <td><select class="form-control form-control-sm" style="color: black;" id="select${contador}" tipo='' onchange="calcularFila(${contador});"">
                <option value="0">Seleciona una opcion</option>
            </select>
        </td>
        <td><p id="costo${contador}"></p></td>
        <td><p id="iva${contador}"></p></td>
        <td><p id="subtotal${contador}"></p></td>
    </tr>`

    $("#datosPago").append(templete);

}



const selecionarTipo = async (contador) => {
    let selectTipo = $("#selectTipo" + contador).val();

    switch (selectTipo) {
        case '1':
            try {
                let response = await fetch('api/controller/paquetes');
                let paquetes = await response.json();
                $('option', `#select${contador}`).remove();
                for (const paquete of paquetes) {
                    let templete = `<option value="${paquete.id_paquete}" tipo="paquete"> ${paquete.nombre_paquete}</option>`;
                    $(`#select${contador}`).append(templete);
                }
                $(`#select${contador}`).attr('tipo', 'paquetes');

                // $(`#select${contador}`).select2({ theme: "bootstrap" });
            } catch (error) {
                console.log(error);
            }
            break;
        case '2':
            try {
                let response2 = await fetch('api/controller/servicios');
                let servicios = await response2.json();
                $('option', `#select${contador}`).remove();
                for (const serivicio of servicios) {
                    document.getElementById(`select${contador}`).innerHTML += `<option value="${serivicio.id_servicio}" > ${serivicio.nombre_servicio}</option>`;

                }
                $(`#select${contador}`).attr('tipo', 'servicios');
                // $(`#select${contador}`).select2({ theme: "bootstrap" });
            } catch (error) {
                console.log(error);
            }
            break;
        case '3':
            break;
        default:
            break;
    }

}



const traerPaqueteSelecto = async (contador) => {
    try {
        let response = await fetch('api/controller/paquetes');
        let paquetes = await response.json();
        for (const paquete of paquetes) {
            document.getElementById(`select${contador}`).append(`<option value="${paquete.id_paquete}" tipo="paquete"> ${paquete.nombre_paquete}</option>`);
        }

        let response2 = await fetch('api/controller/servicios');
        let servicios = await response2.json();
        for (const serivicio of servicios) {
            document.getElementById(`select${contador}`).append(`<option value="${serivicio.id_servicio}" > ${serivicio.nombre_servicio}</option>`);
        }
        $(`#select${contador}`).select2({ theme: "bootstrap" });
    } catch (error) {
        console.log(error);
    }
}

const calcularFila = async (contador) => {

    let valorSelect = $("#select" + contador).val();
    let tipo = $("#select" + contador).attr('tipo');;

    try {
        let response = await fetch(`api/controller/${tipo}/${valorSelect}`);
        let paquete_serivicio = await response.json();

        producto_detalle.push(paquete_serivicio);
        if (tipo === "servicios") {
            $("#costo" + contador).html(paquete_serivicio.monto_servicio);
            $("#iva" + contador).html("%16");
            let subttal = (parseFloat(paquete_serivicio.monto_servicio) * 1.16);
            $("#subtotal" + contador).html(subttal.toFixed(2));
        } else if (tipo === "paquetes") {
            $("#costo" + contador).html(paquete_serivicio.monto_paquete);
            $("#iva" + contador).html("%16");
            let subttal = (parseFloat(paquete_serivicio.monto_paquete) * 1.16);
            $("#subtotal" + contador).html(subttal.toFixed(2));
        }

        generarTotales();

    } catch (error) {
        console.log(error);
    }
}


const deleteFila = (contador) => {
    $(`#fila${contador}`).remove();
    console.log('delete');
}



const generarTotales = () => {


    var contador = $('#tabla-pago >tbody >tr').length;
    let sumTotal = 0, sumIva = 0, sumSubtotal = 0;
    let valor, cantidadCost, validar;
    for (let index = 0; index < contador; index++) {
        valor = document.getElementById(`costo${index}`);
        cantidadCost = parseFloat(valor.innerHTML);
        validar = (cantidadCost == NaN) ? 0 : cantidadCost;
        sumTotal += validar;
    }

    $("#costoTotal").html('$' + sumTotal.toFixed(2));
    $("#txt_costoTotal").val(sumTotal.toFixed(2));

    for (let index = 0; index < contador; index++) {
        valor = document.getElementById(`costo${index}`);
        cantidadCost = parseFloat(valor.innerHTML);
        validar = (cantidadCost == NaN) ? 0 : cantidadCost;
        sumIva += (validar * 0.16);
    }
    $("#costoIva").html('$' + sumIva.toFixed(2));
    $("#txt_costoIva").val(sumIva.toFixed(2));

    for (let index = 0; index < contador; index++) {
        valor = document.getElementById(`subtotal${index}`);
        cantidadCost = parseFloat(valor.innerHTML);
        validar = (cantidadCost == NaN) ? 0 : cantidadCost;
        sumSubtotal += validar;
    }
    $("#costoSubtotal").html('$' + sumSubtotal.toFixed(2));
    $("#txt_costoSubtotal").val(sumSubtotal.toFixed(2));
}
