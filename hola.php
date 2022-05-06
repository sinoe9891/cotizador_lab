<?php
date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . './doc/vendor/autoload.php';
require_once './doc/model.php';
$stylesheet = file_get_contents('./doc/css/style.css');




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
	// $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
	$mpdf = new \Mpdf\Mpdf(['format' => [215.9, 279.4]]);
	
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($html);
	$mpdf->Output("galeria/Nota de Duelo " . ucwords(strtolower($row['nombres'] . ' ' . $row['apellidos'])) . ".pdf", "I");
	$mpdf->Output("galeria/Nota de Duelo " . ucwords(strtolower($row['nombres'] . ' ' . $row['apellidos'])) . ".pdf", "F");
} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
	echo $e->getMessage();
}
