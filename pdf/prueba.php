<?php
//require '../pdf/vendor/autoload.php';
include_once "../pdf/vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
include "generate_tiket.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper(array(0, 0, 595, 841), 'portrait');
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=factura.pdf");
echo $dompdf->output();

