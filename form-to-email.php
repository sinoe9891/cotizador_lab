<?php
date_default_timezone_set('America/Tegucigalpa');
setlocale(LC_ALL, 'es_HN');
require_once __DIR__ . './doc/vendor/autoload.php';
require_once './doc/model.php';
require_once './doc/convertidor/convertidor.php';
require_once './doc/convertidor/convertidor_fecha.php';
$modelonumero = new modelonumero();
$modelofecha = new modelofecha();
$stylesheet = file_get_contents('./doc/css/style.css');


$formInfo = $_POST['Cotizacion'];
$fullName = $formInfo['nombres'] . ' ' . $formInfo['apellidos'];
$age = $formInfo['edad'];
$identidad = $formInfo['identificacion'];
$telefono = $formInfo['telefono'];
$exams = $_POST["Examen"];
$precio = $_POST["Precio"];
$examsAsHtml = '';
$total = 0;


function quitar_acentos($cadena)
{
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	return utf8_encode($cadena);
}

for ($i = 0, $size = count($exams); $i < $size; ++$i) {
	$examsAsHtml .= '
		<p style="text-align: left;"><span style="font-size: 11pt; font-family: helvetica, arial, sans-serif;"><strong>' . $exams[$i] . '</strong></span></p>
	';
	$precios .= '<p style="text-align: left;"><span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>L.' . $precio[$i] . '</strong></span></p>';
	$total += $precio[$i];
}

$moneda = 'LEMPIRAS';
$valor_letras = $modelonumero->numtoletras(abs($total), $moneda, '');

$emailTo = $formInfo['correo'];
$emailFrom = "no-reply@laboratorioscatacamas.hn";
$emailSubject = "Cotización de Exámenes";
$headers = "From: no-reply@laboratorioscatacamas.hn \r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$emailBody .= ' 
<br>
<div class="caja">

<p class="nombre" style="margin-top: 50px;"><span style="font-family: helvetica, arial, sans-serif;"><strong>
' . $fullName . '</strong></span></p>

<p class="edad"><span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;' . $age . '</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<span class="genero" style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>Masculino</strong></span>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="telefono" style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong><a href="tel:' . $telefono . '">' . $telefono . '</a></strong></span></p>

<p class="identidad"><span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;' . $identidad . '</strong></span>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>' . $emailFrom . '</strong></span></p>

</div>';
$emailBody .= ' 
<table class="examenes">
	<tbody>
		<tr>
			<td class="examen">
				<p style="text-align: center;"><span style="font-size: 18pt; font-family: helvetica, arial, sans-serif;">
				' . $examsAsHtml . '
			</td>
			<td class="precios">
				<p style="text-align: center;"><span style="font-size: 18pt; font-family: helvetica, arial, sans-serif;">
				' . $precios . '
				
			</td>
		</tr>
	</tbody>
</table>';
$emailBody .= ' 
<table>
	<tbody>
		<tr class="">
			<td class="letras">
				<p style"   text-align: right !important;"><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;">Monto en letras: <strong>'.$valor_letras.'</strong></span>
				</p>
			</td>
			<td class="sub">
				<p style"    text-align: right !important;"><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;"><strong>Sub total: </strong></span>
				</p>
			</td>
			<td class="subtotal">
				<p class=""><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;"><strong>L.' . $total . '</strong></span>
				</p>
			</td>
		</tr>
	</tbody>
</table>';
$emailBody .= ' 
<table>
	<tbody>

		<tr class="">
			<td class="title">
				<p class=""><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;"><strong>Descuentos y rebajas:</strong></span>
				</p>
			</td>
			<td class="decuentos">
				<p class=""><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;"><strong> L. 0.00</strong></span>
				</p>
			</td>
		</tr>
		<tr class="">
			<td class="title">
				<p class=""><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;"><strong>Total: </strong></span>
				</p>
			</td>
			<td class="total">
				<p class=""><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;"><strong>L.' . $total . '</strong></span>
				</p>
			</td>
		</tr>
	</tbody>
</table>';

$emailBody .= '';



//Quitar acentos y espacios
$searchString = " ";
$replaceString = "";
$fullName = strtolower(quitar_acentos(str_replace($searchString, $replaceString, $fullName)));
$nombreCompleto = strtoupper($fullName);

$pdfLocation = 'Cotizacion-' . $fullName . '.pdf';
$pdfName = 'Cotizacion-' . $fullName . '.pdf';
$filetype    = "application/pdf"; // type

// $html .= $emailBody;

try {
	// $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
	$mpdf = new \Mpdf\Mpdf(['format' => [215.9, 279.4]]);
	$mpdf->adjustFontDescLineheight = 1.8;
	// $mpdf->SetMargins(30, 250, 30);
	$mpdf = new \Mpdf\Mpdf([
		'margin_left' => 5,
		'margin_right' => 5,
		'margin_top' => 32.5,
		'margin_bottom' => 0,
	]);
	$mpdf->SetAutoPageBreak(true, 25);
	// $mpdf->debug = true;
	// ob_end_clean();
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($emailBody);
	// $mpdf->Output("Cotizacion-" . $fullName . ".pdf", "I");
	$mpdf->Output("Cotizacion-" . $fullName . ".pdf", "F");
	// $mpdf->Output("Cotizacion-" . $fullName . ".pdf", "D");
} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
	//       name used for catch
	// Process the exception, log, print etc.
	echo $e->getMessage();
}


if (file_exists("Cotizacion-" . $fullName . ".pdf")) {

	$eol = PHP_EOL;
	$semi_rand     = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	$headers       = "From: $emailFrom$eol" .
		"MIME-Version: 1.0$eol" .
		"Content-Type: multipart/mixed;$eol" .
		" boundary=\"$mime_boundary\"";

	// add html message body
	$message = "--$mime_boundary$eol" .
		"Content-Type: text/html; charset=\"iso-8859-1\"$eol" .
		"Content-Transfer-Encoding: 7bit$eol$eol" .
		$emailBody . $eol;

	// fetch pdf
	$file = fopen($pdfLocation, 'rb');
	$data = fread($file, filesize($pdfLocation));
	fclose($file);
	$pdf = chunk_split(base64_encode($data));

	$message .= "--$mime_boundary$eol" .
		"Content-Type: $filetype;$eol" .
		" name=\"$pdfName\"$eol" .
		"Content-Disposition: attachment;$eol" .
		" filename=\"$pdfName\"$eol" .
		"Content-Transfer-Encoding: base64$eol$eol" .
		$pdf . $eol .
		"--$mime_boundary--";


	// mail($emailTo, $emailSubject, $emailBody, $headers);
	$mail = mail($emailTo, $emailSubject, $message, $headers);
	if ($mail) {
		echo "The email was sent.";
		//Eliminar cotizacion despues de enviar
		unlink("Cotizacion-" . $fullName . ".pdf");
	} else {
		echo "There was an error sending the mail.";
		unlink("Cotizacion-" . $fullName . ".pdf");
		//Eliminar cotizacion despues de enviar
	}
} else {

	echo "There was an error sending the mail.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-param" content="_csrf">
	<link href="fonts/fontawesome-webfont.woff2" rel="stylesheet">
	<link href="fonts/glyphicons-halflings-regular.woff2" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="./index_files/bootstrap.css" rel="stylesheet">
	<link href="./index_files/site.css" rel="stylesheet">
	<script src="assets/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" id="morriston-google-fonts-css" href="https://fonts.googleapis.com/css?family=Pacifico:400,400i,500,500i,600,600i,700,700i,800,800i%7CPoppins:400,400i,500,500i,600,600i,700,700i,800,800i&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese" type="text/css" media="all">
	<link rel="icon" href="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/favicon_v.png" sizes="32x32">
	<link rel="alternate" type="application/rss+xml" title="Laboratorios Catacamas » Feed" href="https://laboratorioscatacamas.hn/feed/">
	<link rel="icon" href="https://laboratorioscatacamas.hn/wp-content/uploads/2020/10/cropped-Favicon2-Laboratorios_Hosanna_Honduras-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon" href="https://laboratorioscatacamas.hn/wp-content/uploads/2020/10/cropped-Favicon2-Laboratorios_Hosanna_Honduras-180x180.png">
	<link rel="alternate" type="application/rss+xml" title="Laboratorios Catacamas » Feed de los comentarios">
	<title>Muchas Gracias</title>
</head>

<body style="background:white !important;">
	<div class="" style="padding: 20px;">
		<br>
		<div><br><img src="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/cropped-logo-02-1.png" alt="" class="img-responsive img-center img-logo" style=""></div>
		<div style="height: 50vh;display: flex;justify-content: center;align-items: center;">

			<div style="text-align: center;">
				<h2>Cotización Solicitada</h2>
				<p>Muy pronto nuestro personal se contactará contigo</p>
				<h1 style="color: #00c2de;margin: 20px 0;font-size: 44px;">!Muchas Gracias!</h1>
				<p>si tiene consultas adicionales contáctenos al teléfono <a href="tel:+50427994495">+504 2799-4495</a>.</p>
			</div>
		</div>
		<div style="display: flex;justify-content: center;">
			<br>
			<a href="https://laboratorioscatacamas.hn/">
				<button type="button" data-step="1" class="btn btn-lg btn-lb next-step pull-right">Volver al Inicio
				</button>
			</a>
		</div>
	</div>
</body>

</html>