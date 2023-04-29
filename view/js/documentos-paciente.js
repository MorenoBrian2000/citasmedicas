
window.onload = function () {
    let id_paciente = $("#id_paciente").val();
    mostrarArchivos(id_paciente);
};

const mostrarArchivos = (id_paciente) => {
    let ruta = 'controller/documentos-paciente.controlador.php?id_paciente=' + id_paciente,
        data = {
            subir_archivo: true
        };

    $.post(ruta, data, function (data) {
        console.log(data);

        let documentos = JSON.parse(data);

        let initialPreviewConfig = [];

        for (let index = 0; index < documentos.length; index++) {
            const element = documentos[index];
            let extencion = element.split('.').pop();
            let fileConfig = {};
            switch (extencion) {
                case 'jpg':
                    fileConfig = { caption: element.split('/').pop(), url: "controller/documentos-paciente.controlador.php?file=" + element, key: index };
                    initialPreviewConfig.push(fileConfig);
                    break;
                case 'png':
                    fileConfig = { caption: element.split('/').pop(), url: "controller/documentos-paciente.controlador.php?file=" + element, key: index };
                    initialPreviewConfig.push(fileConfig);
                    break;
                case 'pdf':
                    fileConfig = { type: "pdf", caption: element.split('/').pop(), url: "controller/documentos-paciente.controlador.php?file=" + element, key: index, downloadUrl: true };
                    initialPreviewConfig.push(fileConfig);
                    break;
                default:
                    break;
            }

        }

        // let id_paciente = $("#id_paciente").val();
        $("#input-ke-1").fileinput({
            theme: "explorer-fa",
            language: 'es',
            uploadUrl: 'controller/documentos-paciente.controlador.php?id_paciente=' + id_paciente,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            initialPreviewAsData: true,
            maxFileSize: 10000,
            removeFromPreviewOnError: true,
            allowedFileExtensions : ['jpg','png','pdf'],
            initialPreview: documentos,
            initialPreviewConfig: initialPreviewConfig
        });

    });
}

