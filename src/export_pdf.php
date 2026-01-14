<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$html = "<h1 style='color:#003366'>RAWBANK | Rapport d'Intégrité QClock</h1>";
$html .= "<p>Généré le : " . date('d/m/Y H:i:s') . "</p>";
$html .= "<p>Responsable : Ezechias KUMBU KUMBU</p>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Rapport_QClock.pdf", ["Attachment" => false]);