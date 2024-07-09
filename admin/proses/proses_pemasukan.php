<?php
ob_start();
include('../pemasukan.php'); // Replace with the path to your PHP page
$htmlContent = ob_get_clean();

// Include autoloader
require '../../dompdf/vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// $html_file_content = file_get_contents('coba.php');
$dompdf->loadHtml(''.$htmlContent);

// Render
$dompdf->render();

//Output
$dompdf->stream('document', array('Attachment' => 0	));

?>