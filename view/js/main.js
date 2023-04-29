class Main {

    static DataTable(table, url) {
        let get = fetch(url).then(response => response.json());
        $(`#${table}`).DataTable({
            processing: true,
            ajax: url,
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            order: [[1, 'desc']],
            columnDefs: [{ className: 'dtr-control', orderable: false, targets: 0 }],
            dom: '<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
            language: JSON.parse(localStorage.getItem('lentable'))
        })
    }

    static async validarUsaurio(e) {
        try {
            let form = new FormData();
            form.append('username_user', e.target[0].value);
            form.append('password_user', e.target[1].value);
            form.append('action', 'loginUser');
            let data = await fetch('controller/usuarios.controlador.php', {
                method: 'POST',
                body: form
            });
            let response = await data.json();
            if (response.response) {
                window.location = 'inicio';
            } else {
                alertify.error(resultado.menssage);
            }
        } catch (error) {
            console.log(error);
        }
    }

    static init() {
        localStorage.setItem('lentable', JSON.stringify({
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior"
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        }));
    }
}
