window.addEventListener('load', async () => {

    let folio_pago = document.getElementById('folio_pago').value;
    try {
        // let response = await fetch(`api/controller/factura/${folio_pago}`);
        let response = await fetch(`api/controller/factura/${folio_pago}`);
        let factura = await response.json();
        let iva = factura.monto_subtotal * 0.16;
        document.getElementById('data-paciente').innerHTML = `${factura.nombre_paciente}<br> ${factura.correo_paciente}<br> ${factura.telefono_paciente}`;
        document.getElementById('sub_total').innerHTML = `Monto Subtotal : $ ${factura.monto_subtotal}`;
        document.getElementById('iva_total').innerHTML = `IVA (16%) : $ ${iva}`;
        document.getElementById('monto_total').innerHTML = `Monto Total : $ ${factura.monto_total}`;
        datallesPagos(factura.id_pago, factura.folio_pago);


    } catch (e) {
    }

})


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
        let templete = ``;
        for (const detalle of detalles) {
            templete += `<tr class="text-right">
                <td class="text-left">${detalle.id_pago_detalle}</td>
                <td class="text-left">${detalle.tipo}</td>
                <td>$ ${detalle.iva}</td>
                <td>$ ${detalle.costo}</td>
                <td>$ ${detalle.subtotal}</td>
            </tr>`;
        }

        $("#datelle-pago").html(templete);

    } catch (error) {
    }


}

const printDiv = (nombreDiv) => {
    var contenido = document.getElementById(nombreDiv).innerHTML;
    var contenidoOriginal = document.body.innerHTML;
    document.body.innerHTML = contenido;
    window.print();
    document.body.innerHTML = contenidoOriginal;
}


const enviarCorreo = () => {

    var contenido = $('#factura-print').html().text();

    console.log(contenido);
}