const datallesPagos = async (id_pago, folio_pago) => {

    $("#modalDetallePago").modal();
    let templete = ``;
    let datos = {
        "tabla": "tbl_pago_detalle",
        "item": "folio_pago",
        "valor": folio_pago
    }

    try {
        let response = await fetch('api/controller/buscador', {
            method: 'POST',
            body: JSON.stringify(datos),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let detalles = await response.json();
        console.log(detalles);
        for (const detalle of detalles) {
            templete += `<tr>
                    <td>${detalle.id_pago_detalle}</td>
                    <td>${detalle.tipo}</td>
                    <td>${detalle.subtotal}</td>
                    <td>${detalle.iva}</td>
                    <td>${detalle.costo}</td>
                    <td><button class='badge badge-danger  badge-sm' onclick="datallesPagos(${detalle.id_pago_detalle})"><i class='mdi mdi-delete'></i></button></td>
                </tr>`;
        }

        /*********************************** */
        let respuesta_2 = await fetch(`api/controller/pagos/${id_pago}`);
        let pago_cita2 = await respuesta_2.json();
        console.log(pago_cita2);
        $("#folio_pago").val(pago_cita2.folio_pago)
        $("#nombre_paciente").val(pago_cita2.nombre_paciente)
        $("#nombre_medico").val(pago_cita2.nombre_medico)

    } catch (error) {
        console.log(error);
    }

    $("#detallesCompra").html(templete);

}