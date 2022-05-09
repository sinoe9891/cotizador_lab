<?php
date_default_timezone_set('America/Tegucigalpa');
setlocale(LC_ALL, 'es_HN');
require_once __DIR__ . '/doc/vendor/autoload.php';
require_once './doc/model.php';
require_once './doc/convertidor/convertidor.php';
require_once './doc/convertidor/convertidor_fecha.php';
$modelonumero = new modelonumero();
$modelofecha = new modelofecha();
$stylesheet = file_get_contents('./doc/css/style.css');


function quitar_acentos($cadena)
{
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	return utf8_encode($cadena);
}


if (isset($_POST['Cotizacion'])) {
	$formInfo = $_POST['Cotizacion'];
	$fullName = $formInfo['nombres'] . ' ' . $formInfo['apellidos'];
	$Nombres = $formInfo['nombres'] . ' ' . $formInfo['apellidos'];
	$age = $formInfo['edad'];
	$genero = $formInfo['genero'];
	$identidad = $formInfo['identificacion'];
	$telefono = $formInfo['telefono'];
	$exams = $_POST["Examen"];
	$precio = $_POST["Precio"];
	$correoCliete = $formInfo['correo'];
	$examsAsHtml = '';
	$total = 0;
	$precios = '';
	$emailBody = '';
	$bodyPDF = '';
	$correoBody = '';
	$Date = date('d/m/Y', time());
	$Time = date('h:i a', time());



	$emailTo = $formInfo['correo'];
	$emailFrom = "no-reply@laboratorioscatacamas.hn";
	$emailSubject = "Cotización de Exámenes";


	$headers = "From: no-reply@laboratorioscatacamas.hn \r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$headers1 = "From: no-reply@laboratorioscatacamas.hn \r\n";
	$headers1 .= "Content-Type: text/html; charset=UTF-8\r\n";

	$emailTo1 = "sinoeproducciones@gmail.com, musaenz@gmail.com ";
	$emailFrom1 = "no-reply@laboratorioscatacamas.hn";
	$emailSubject1 = "Nueva Cotización de Exámenes Creada";

	


	// $html .= $emailBody;
	for ($i = 0, $size = count($exams); $i < $size; ++$i) {
		$examsAsHtml .= '
		<p style="text-align: left;"><span style="font-size: 11pt; font-family: helvetica, arial, sans-serif;"><strong>' . $exams[$i] . '</strong></span></p>
	';
		$precios .= '<p style="text-align: left;"><span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>L.' . $precio[$i] . '</strong></span></p>';
		$total += $precio[$i];
	}
	
	include 'conexion.php';
	$Fecha = date('Y-m-d');
	$hor = time();
	$Hora = date('H:i:s', $hor);
	//insertar en la base de datos del email
	$sql = "INSERT INTO cotizaciones (nombres, correo, precio, fecha, hora) VALUES ('$Nombres','$correoCliete', '$total', '$Fecha', '$Hora')";
	mysqli_query($conn, $sql);
	$last_id = $conn->insert_id;

	$moneda = 'LEMPIRAS';
	$valor_letras = $modelonumero->numtoletras(abs($total), $moneda, '');


	$emailBody = ' 
<!DOCTYPE html>
<html>
<head></head>
<body style="background:#eaeced;">
	<style type="text/css">
		<!--
		< !-- * {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: none;
			-webkit-text-resize: 100%;
			text-resize: 100%;
		}
		a {
			outline: none;
			color: #40acebx;
			text-decoration: underline;
		}
		a:hover {
			text-decoration: none !important;
		}
		.nav a:hover {
			text-decoration: underline !important;
		}
		.title a:hover {
			text-decoration: underline !important;
		}
		.title-2 a:hover {
			text-decoration: underline !important;
		}
		.btn:hover {
			opacity: 0.8;
		}
		.btn a:hover {
			text-decoration: none !important;
		}
		.btn {
			-webkit-transition: all 0.3s ease;
			-moz-transition: all 0.3s ease;
			-ms-transition: all 0.3s ease;
			transition: all 0.3s ease;
		}
		table td {
			border-collapse: collapse !important;
		}
		.ExternalClass,
		.ExternalClass a,
		.ExternalClass span,
		.ExternalClass b,
		.ExternalClass br,
		.ExternalClass p,
		.ExternalClass div {
			line-height: inherit;
		}
		@media only screen and (max-width:500px) {
			table[class="flexible"] {
				width: 100% !important;
			}
			table[class="center"] {
				float: none !important;
				margin: 0 auto !important;
			}
			*[class="hide"] {
				display: none !important;
				width: 0 !important;
				height: 0 !important;
				padding: 0 !important;
				font-size: 0 !important;
				line-height: 0 !important;
			}
			td[class="img-flex"] img {
				width: 100% !important;
				height: auto !important;
			}
			td[class="aligncenter"] {
				text-align: center !important;
			}
			th[class="flex"] {
				display: block !important;
				width: 100% !important;
			}
			td[class="wrapper"] {
				padding: 0 !important;
			}
			td[class="holder"] {
				padding: 30px 15px 20px !important;
			}
			td[class="nav"] {
				padding: 20px 0 0 !important;
				text-align: center !important;
			}
			td[class="h-auto"] {
				height: auto !important;
			}
			td[class="description"] {
				padding: 30px 20px !important;
			}
			td[class="i-120"] img {
				width: 120px !important;
				height: auto !important;
			}
			td[class="footer"] {
				padding: 5px 20px 20px !important;
			}
			td[class="footer"] td[class="aligncenter"] {
				line-height: 25px !important;
				padding: 20px 0 0 !important;
			}
			tr[class="table-holder"] {
				display: table !important;
				width: 100% !important;
			}
			th[class="thead"] {
				display: table-header-group !important;
				width: 100% !important;
			}
			th[class="tfoot"] {
				display: table-footer-group !important;
				width: 100% !important;
			}
		}
		-->
	</style>
	<table bgcolor="#eaeced" cellpadding="0" cellspacing="0" style="min-width: 320px; width: 100%;">
		<!-- fix for gmail -->
		<tbody>
			<tr>
				<td class="wrapper" style="padding: 0 10px;">
					<!-- module 1 -->
					<table cellpadding="0" cellspacing="0" style="width: 100%;" data-module="module-1"
						data-thumb="thumbnails/01.png">
						<tbody>
							<tr style="height: 126px;">
								<td style="height: 126px;" bgcolor="#eaeced" data-bgcolor="bg-module">
									<table align="center" cellpadding="0" cellspacing="0" class="flexible"
										style="margin: 0px auto; width: 600px;">
										<tbody>
											<tr style="height: 12px;">
												<td style="padding: 10px 0px; height: 12px;" bgcolor="white"><img
														alt="logo" height="50"
														src="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/cropped-logo-02-1.png"
														style="display: flex; width:40%;height:auto;margin-left: auto; margin-right: auto;"
														title="logo" />
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- module 2 -->
					<table cellpadding="0" cellspacing="0" style="width: 100%;" data-module="module-2"
						data-thumb="thumbnails/02.png">
						<tbody>
							<tr>
								<td bgcolor="#eaeced" data-bgcolor="bg-module">
									<table align="center" cellpadding="0" cellspacing="0" class="flexible"
										style="margin: 0px auto; width: 600px;">
										<tbody>
											<tr>
												<td class="holder" style="padding: 58px 60px 52px;" bgcolor="white"
													data-bgcolor="bg-block">
													<table cellpadding="0" cellspacing="0" style="width: 100.248%;">
														<tbody>
															<tr>
																<td style="width: 100%;" align="center"
																	data-color="text" data-size="size text"
																	data-min="10" data-max="26"
																	data-link-color="link text color"
																	data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
																	<p style="text-align: center;"><span
																			style="font-size: 24pt; font-family: helvetica, arial, sans-serif;"><strong>Cotizaci&oacute;n</strong></span></p>
																	
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Hola,
																				' . $fullName . '</strong></span></p>
																
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Adjunto encontrar&aacute;s la cotizaci&oacute;n solicitada v&iacute;a nuestro Cotizador Web.</strong></span></p>
																				
																				
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Si tienes consultas, favor comun&iacute;cate a nuestros n&uacute;meros enviando un mensaje al Whatsapp 9478-2525 o escr&iacute;benos al correo electr&oacute;nico: <a href="mailto:info@laboratorioscatacamas.hn">info@laboratorioscatacamas.hn</strong></span></p>
																	<br>
													<p style="text-align: center;"><span style="font-size: 24pt; font-family: helvetica, arial, sans-serif;"><strong>&#161;Gracias por tu preferencia!</strong></span></p>

																	
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- module 3 -->
					<!-- module 4 -->
					<!-- module 5 -->
					<!-- module 6 -->
					<!-- module 7 -->
				</td>
			</tr>
			<!-- fix for gmail -->
		</tbody>
	</table>
</body>
</html>
';




	$bodyPDF .= ' 
<br>
<div class="caja">
	
<div class="fecha">
<p class="numero" style="margin-top: -18px;"><span style="font-size: 20pt;font-family: helvetica, arial, sans-serif;"><strong>
	Cotización No.' . $last_id . '</strong></span></p>
		<p class="fecha" style="margin-top: 10px;"><span style="font-family: helvetica, arial, sans-serif;"><strong>
			' . $Date . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $Time . '</strong></span></p>
		
		</div>


	<p class="nombre" style="margin-top: 50px;"><span style="font-family: helvetica, arial, sans-serif;"><strong>
	' . $fullName . '</strong></span></p>

	<p class="edad">
		<span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $age . '</strong></span>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<span class="genero" style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>' . $genero . '</strong></span>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class="telefono" style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong><a href="tel:' . $telefono . '">' . $telefono . '</a></strong></span>
	</p>

	<p class="identidad">
	<span class="ident" style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;' . $identidad . '</strong></span>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size: 10pt; font-family: helvetica, arial, sans-serif;"><strong>' . $emailTo . '</strong></span></p>
</div>

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
</table>
<table>
	<tbody>
		<tr class="">
			<td class="letras">
				<p style"   text-align: right !important;"><span style="font-size: 9pt; font-family: helvetica, arial, sans-serif;">Monto en letras: <strong>' . $valor_letras . '</strong></span>
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
</table>
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

	//Quitar acentos y espacios
	$searchString = " ";
	$replaceString = "";
	$fullName = strtolower(quitar_acentos(str_replace($searchString, $replaceString, $fullName)));
	$nombreCompleto = strtoupper($fullName);

	$pdfLocation = 'Cotizacion-' . $fullName . '.pdf';
	$pdfName = 'Cotizacion-' . $fullName . '.pdf';
	$filetype    = "application/pdf"; // type

	try {
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
		$mpdf->WriteHTML($bodyPDF);
		// $mpdf->Output("Cotizacion-" . $fullName . ".pdf", "I");
		$mpdf->Output("Cotizacion-" . $fullName . ".pdf", "F");
		//$mpdf->Output("Cotizacion-" . $fullName . ".pdf", "D");
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
		// add html message body


		$header_on = "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html; charset=UTF-8" . "\r\n";
		// mail($emailTo, $emailSubject, $emailBody, $headers);
		$mail = mail($emailTo, "=?UTF-8?B?" . base64_encode($emailSubject) . "?=", $message, $headers);

		if ($mail) {
			// echo "The email was sent.<br>";

			$nuevaCoti = ' 
<!DOCTYPE html>
<html>
<head></head>
<body style="background:#eaeced;">
	<style type="text/css">
		<!--
		< !-- * {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: none;
			-webkit-text-resize: 100%;
			text-resize: 100%;
		}
		a {
			outline: none;
			color: #40acebx;
			text-decoration: underline;
		}
		a:hover {
			text-decoration: none !important;
		}
		.nav a:hover {
			text-decoration: underline !important;
		}
		.title a:hover {
			text-decoration: underline !important;
		}
		.title-2 a:hover {
			text-decoration: underline !important;
		}
		.btn:hover {
			opacity: 0.8;
		}
		.btn a:hover {
			text-decoration: none !important;
		}
		.btn {
			-webkit-transition: all 0.3s ease;
			-moz-transition: all 0.3s ease;
			-ms-transition: all 0.3s ease;
			transition: all 0.3s ease;
		}
		table td {
			border-collapse: collapse !important;
		}
		.ExternalClass,
		.ExternalClass a,
		.ExternalClass span,
		.ExternalClass b,
		.ExternalClass br,
		.ExternalClass p,
		.ExternalClass div {
			line-height: inherit;
		}
		@media only screen and (max-width:500px) {
			table[class="flexible"] {
				width: 100% !important;
			}
			table[class="center"] {
				float: none !important;
				margin: 0 auto !important;
			}
			*[class="hide"] {
				display: none !important;
				width: 0 !important;
				height: 0 !important;
				padding: 0 !important;
				font-size: 0 !important;
				line-height: 0 !important;
			}
			td[class="img-flex"] img {
				width: 100% !important;
				height: auto !important;
			}
			td[class="aligncenter"] {
				text-align: center !important;
			}
			th[class="flex"] {
				display: block !important;
				width: 100% !important;
			}
			td[class="wrapper"] {
				padding: 0 !important;
			}
			td[class="holder"] {
				padding: 30px 15px 20px !important;
			}
			td[class="nav"] {
				padding: 20px 0 0 !important;
				text-align: center !important;
			}
			td[class="h-auto"] {
				height: auto !important;
			}
			td[class="description"] {
				padding: 30px 20px !important;
			}
			td[class="i-120"] img {
				width: 120px !important;
				height: auto !important;
			}
			td[class="footer"] {
				padding: 5px 20px 20px !important;
			}
			td[class="footer"] td[class="aligncenter"] {
				line-height: 25px !important;
				padding: 20px 0 0 !important;
			}
			tr[class="table-holder"] {
				display: table !important;
				width: 100% !important;
			}
			th[class="thead"] {
				display: table-header-group !important;
				width: 100% !important;
			}
			th[class="tfoot"] {
				display: table-footer-group !important;
				width: 100% !important;
			}
		}
		-->
	</style>
	<table bgcolor="#eaeced" cellpadding="0" cellspacing="0" style="min-width: 320px; width: 100%;">
		<!-- fix for gmail -->
		<tbody>
			<tr>
				<td class="wrapper" style="padding: 0 10px;">
					<!-- module 1 -->
					<table cellpadding="0" cellspacing="0" style="width: 100%;" data-module="module-1"
						data-thumb="thumbnails/01.png">
						<tbody>
							<tr style="height: 126px;">
								<td style="height: 126px;" bgcolor="#eaeced" data-bgcolor="bg-module">
									<table align="center" cellpadding="0" cellspacing="0" class="flexible"
										style="margin: 0px auto; width: 600px;">
										<tbody>
											<tr style="height: 12px;">
												<td style="padding: 10px 0px; height: 12px;" bgcolor="white"><img
														alt="logo" height="50"
														src="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/cropped-logo-02-1.png"
														style="display: flex; width:40%;height:auto;margin-left: auto; margin-right: auto;"
														title="logo" />
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- module 2 -->
					<table cellpadding="0" cellspacing="0" style="width: 100%;" data-module="module-2"
						data-thumb="thumbnails/02.png">
						<tbody>
							<tr>
								<td bgcolor="#eaeced" data-bgcolor="bg-module">
									<table align="center" cellpadding="0" cellspacing="0" class="flexible"
										style="margin: 0px auto; width: 600px;">
										<tbody>
											<tr>
												<td class="holder" style="padding: 58px 60px 52px;" bgcolor="white"
													data-bgcolor="bg-block">
													<table cellpadding="0" cellspacing="0" style="width: 100.248%;">
														<tbody>
															<tr>
																<td style="width: 100%;" align="center"
																	data-color="text" data-size="size text"
																	data-min="10" data-max="26"
																	data-link-color="link text color"
																	data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
																	<p style="text-align: center;"><span
																			style="font-size: 24pt; font-family: helvetica, arial, sans-serif;"><strong>Solicitud
																				de Cotizaci&oacute;n No. ' . $last_id . ' </strong></span>
																	<p style="text-align: center;"><span
																			style="font-size: 18pt; font-family: helvetica, arial, sans-serif;"><strong><br>
																				Datos Personales</strong></span>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Fecha:
																				' . $Date . '</strong></span></p>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Hora:
																				' . $Time . '</strong></span></p>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Nombre:
																				' . $Nombres . '</strong></span></p>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Identidad:
																				' . $identidad . '</strong></span></p>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Edad:
																				' . $age . '</strong></span></p>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Correo:
																				' . $correoCliete . '</strong></span></p>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Teléfono:
																				<a
																					href="tel:' . $telefono . '">' . $telefono . '</a></strong></span>
																	</p>
																	<p style="text-align: center;"><span
																			style="font-size: 18pt; font-family: helvetica, arial, sans-serif;"><strong><br>
																				Cotización solicitada</strong></span>
																	
																	' . $examsAsHtml . '
																	<hr>
																	<p style="text-align: left;"><span
																			style="font-size: 15pt; font-family: helvetica, arial, sans-serif;"><strong>Total: L.' . $total . '</strong></span>
																	</p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- module 3 -->
					<!-- module 4 -->
					<!-- module 5 -->
					<!-- module 6 -->
					<!-- module 7 -->
				</td>
			</tr>
			<!-- fix for gmail -->
		</tbody>
	</table>
</body>
</html>
';


			$message1 = $nuevaCoti . $eol;
			$conn->close();
			//Eliminar cotizacion despues de enviar
			unlink("Cotizacion-" . $fullName . ".pdf");
		} else {
			// echo "There was an error sending the mail.";
			unlink("Cotizacion-" . $fullName . ".pdf");
			//Eliminar cotizacion despues de enviar
		}
	} else {

		echo "There was an error sending the mail.";
	}
	$mail = mail($emailTo1, "=?UTF-8?B?" . base64_encode($emailSubject1) . "?=", $message1, $headers1);
} else {
	header('Location: index.php');
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
				<p>Podrá encontrar la cotización en su correo electrónico, <br>en ocasiones puede encontrarla en su carpeta de SPAM </p>
				<h1 style="color: #00c2de;margin: 20px 0;font-size: 44px;">!Muchas Gracias!</h1>
				<p>Si tiene consultas adicionales contáctenos al teléfono <a href="tel:+50427994495">+504 2799-4495</a>.</p>
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