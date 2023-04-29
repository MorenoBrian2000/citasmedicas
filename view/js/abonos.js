
$(document).ready(function () {
    let folio_pago = document.getElementById('folio_pago').value;
    let id_pago = document.getElementById('id_pago').value;
    traerPagosAbonos(folio_pago);
    mostrarPagosDetalle(id_pago, folio_pago);
});

const agrgearPago = async () => {

    try {
        let datos = {
            folio_pago: $("#folio_pago").val(),
            monto_abono: $("#monto-pago").val(),
            tipo: $("#lst_tipo_pago").val(),
        };
        let consulta = await fetch('api/controller/pago-abono', {
            method: 'POST',
            body: JSON.stringify(datos),
            headers: {
                'Content-Type': 'application/json'
            }
        })

        let resutl = await consulta.json();
        let { response } = resutl;

        if (response) {

            Swal.fire('Success!', response.mesnsage, 'success');
            location.reload();            
        } else {
            Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
        }
    } catch (error) {
    }
}

const traerPagosAbonos = async (folio_pago) => {

    const dataSet = [];
    let datos = {
        "tabla": "tbl_pago_abono",
        "item": "folio_pago",
        "valor": folio_pago
    };

    try {
        let response = await fetch('api/controller/buscador', {
            method: 'POST',
            body: JSON.stringify(datos),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let detalles = await response.json();

        for (const abono of detalles) {
            let datos = [];
            datos.push(abono.id_pago_abono);
            datos.push(abono.folio_pago);
            datos.push(abono.tipo);
            datos.push(abono.monto_abono);
            datos.push(`<button class='badge badge-danger  badge-sm' onclick='deletePagoAbono(${abono.id_pago_abono})'><i class='mdi mdi-delete'></i> Borrar</button>`);
            dataSet.push(datos);
        }
        $('#example').DataTable({
            data: dataSet,
            columns: [
                { title: "#" },
                { title: "Folio " },
                { title: "Tipo" },
                { title: "Monto Pago" },
                { title: "Acciones" }
            ]
        });
    } catch (error) {
        console.log(error);
    }
}


const deletePagoAbono = (id_pago_abono) => {

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
                let response = await fetch(`api/controller/pago-abono/${id_pago_abono}`, {
                    method: 'DELETE'
                });
                let data = await response.json();
                if (data.response) {
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                    reloadDatatable();
                } else {
                    Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
                }

            } catch (error) {

                console.log(error);

            }


        }
    })


}
const mostrarPagosDetalle = async (id_pago, folio_pago) => {

    try {

        let respuesta_2 = await fetch(`api/controller/pagos/${id_pago}`);
        let pago_cita2 = await respuesta_2.json();
        let totalPago = pago_cita2.monto_total;
        let monto_abonado = pago_cita2.monto_abonado;
        let saldoRestante = totalPago - monto_abonado;

        $("#costoTotal").append('$' + totalPago);
        $("#totalPago").append('$' + monto_abonado);
        $("#saldoRestante").append('$' + saldoRestante);

    } catch (error) {
        console.log(error);
    }

}


const reloadDatatable = () => {

    $('#example').dataTable().fnDestroy();
    let folio_pago = document.getElementById('folio_pago').value;
    traerPagosAbonos(folio_pago);


}

