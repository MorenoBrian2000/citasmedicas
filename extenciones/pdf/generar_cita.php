<?php

include '../pdf/vendor/autoload.php';
require '../../model/usuarios.modelo.php';

use Dompdf\Dompdf;

//ob_start();
class GenerarPDF
{
    public static function generarCitaPDF()
    {



        $smtp = Conexion::conectar()->prepare("SELECT T1.*, T1.folio_cita, T2.correo_paciente, T2.telefono_paciente, T2.domicilio_paciente, CONCAT_WS(' ', T2.nombre_paciente, T2.apaterno_paciente, T3.amaterno_medico) AS nombre_paciente, CONCAT_WS(' ', T3.nombre_medico, T3.apaterno_medico, T3.amaterno_medico) AS nombre_medico
        FROM tbl_citas T1
        INNER JOIN tbl_pacientes T2 ON T1.id_paciente = T2.id_paciente
        INNER JOIN tbl_medicos T3 ON T1.id_medico = T3.id_medico 
            WHERE T1.folio_cita = '$_GET[folio_cita]'");
        // $smtp->bindParam(":folio_cita", $_GET['folio_cita'], PDO::PARAM_STR);
        $smtp->execute();
        $respuesta = $smtp->fetch();

        include(dirname('__FILE__') . '/cita_plantilla.php');
        $html = ob_get_clean();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream('factura_.pdf', array('Attachment' => 0));
        exit;
    }
}



if ($_GET['folio_cita']) {
    GenerarPDF::generarCitaPDF();
}
