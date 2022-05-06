<?php
date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';
$stylesheet = file_get_contents('css/style.css');




$html .= '
			<div class="main">
			<div class="main-container">
				<div class="container">
					<h1>Hola</h1>
				</div>
				</div>
			</div>';
try {
	$mpdf = new \Mpdf\Mpdf();
	// $mpdf->debug = true;
	// ob_end_clean();
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($html);
	$mpdf->Output("galeria/Nota de Duelo " . ucwords(strtolower($row['nombres'] . ' ' . $row['apellidos'])) . ".pdf", "I");
	$mpdf->Output("galeria/Nota de Duelo " . ucwords(strtolower($row['nombres'] . ' ' . $row['apellidos'])) . ".pdf", "F");
} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
	//       name used for catch
	// Process the exception, log, print etc.
	echo $e->getMessage();
}
			//convertir pdf a jpg
			// $im = imagecreatefromjpeg('galería/Nota de Duelo '.ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).'.jpg');
			// $mpdf->Output("galería/Nota de Duelo ".ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).".jpg", "F");
