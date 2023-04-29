window.onload = function () {
    traerFolioCita();
};

var producto_detalle = [];

const traerFolioCita = async () => {
    try {
        let response = await fetch('api/controller/citas');
        let fichas = await response.json();
        for (const ficha of fichas) {
            console.log(ficha);
            document.getElementById("selectCitas1").innerHTML += `<option value="${ficha.id_cita}"> ${ficha.folio_cita} - ${ficha.nombre_paciente}</option>`;

        }
        $('#selectCitas1').select2({ theme: "bootstrap" });
    } catch (error) {
        console.log(error);
    }
}

const getFolioCita = async () => {

    let id_cita = $("#selectCitas1").val();
    let response = await fetch(`api/controller/citas/${id_cita}`);
    let Citas = await response.json();
    $('.dataCita').show();

    $("#nombre_paciente").val(Citas.nombre_paciente);
    $("#nombre_medico").val(Citas.nombre_medico);
    $("#fechaProgramada_cita").val(Citas.fechaProgramada_cita);
    $("#horaInicio_cita").val(Citas.horaInicio_cita);
    $("#horaFin_cita").val(Citas.horaFin_cita);
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


const traerPaqueteSelecto = async (contador) => {
    try {
        let response = await fetch('api/controller/paquetes');
        let paquetes = await response.json();
        let _templete1
        for (const paquete of paquetes) {
            _templete1 += `<option value="${paquete.id_paquete}" tipo="paquete"> ${paquete.nombre_paquete}</option>`
        }
        $(`#select${contador}`).append(_templete1);

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



const generarPagoCita = async () => {
    let data = {
        id_cita: $("#selectCitas1").val(),
        monto_total: $("#txt_costoSubtotal").val(),
        monto_abonado: $("#txt_cantidad_abono").val(),
        monto_subtotal: $("#txt_costoTotal").val(),
        tipo_pago: $('#lst_tipo_pago').val(),
        notas: $('#txt_notas').val(),
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

            var contador = $('#tabla-pago >tbody >tr').length;
            let validar = false;
            for (let index = 0; index < contador; index++) {
                let valorCosto = document.getElementById(`costo${index}`);
                let cantidadCosto = parseFloat(valorCosto.innerHTML);
                let valueCosto = (cantidadCosto == NaN) ? 0 : cantidadCosto;
                let valueIva = valueCosto * 0.16;
                let valueTotal = valueCosto + valueIva;
                let paquete_servicio = {
                    folio_pago: result.folio_pago,
                    tipo: ($('#selectTipo' + index).val() == 1) ? 'PAQUETE' : 'SERVICIO',
                    id_paquete_servicio: $('#select' + index).val(),
                    costo: valueCosto,
                    iva: valueIva,
                    subtotal: valueTotal
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
            }
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



