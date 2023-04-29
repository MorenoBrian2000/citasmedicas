<?php
 
include '../pdf/vendor/autoload.php';
// include "barcode.php";
use Dompdf\Dompdf;


ob_start();
include(dirname('__FILE__') . '/factura_plantilla.php');
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
