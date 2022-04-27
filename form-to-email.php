<?php
date_default_timezone_set('America/Tegucigalpa');
setlocale(LC_ALL, 'es_HN');
$formInfo = $_POST['Cotizacion'];
$fullName = $formInfo['nombres'] . ' ' . $formInfo['apellidos'];
$age = $formInfo['edad'];
$emailFrom = $formInfo['correo'];
$identidad = $formInfo['identificacion'];
$telefono = $formInfo['telefono'];
$exams = $_POST["Examen"];
$examsAsHtml = '';
for ($i = 0, $size = count($exams); $i < $size; ++$i) {
	$examsAsHtml .= '
        <li style="text-align: left;"><span style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>' . $exams[$i] . '</strong></span></li>
        ';
}
$emailSubject = "Cotización de Exámenes";
$emailTo = "info@laboratorioscatacamas.hn";
$headers = "From: no-reply@laboratorioscatacamas.hn \r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
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
																			style="font-size: 24pt; font-family: helvetica, arial, sans-serif;"><strong>Solicitud
																				de Cotizaci&oacute;n</strong></span>
																	<p style="text-align: center;"><span
																			style="font-size: 18pt; font-family: helvetica, arial, sans-serif;"><strong><br>
																				Datos Personales</strong></span>
																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Nombre:
																				'.$fullName.'</strong></span></p>

																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Identidad:
																				'.$identidad.'</strong></span></p>

																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Edad:
																				'.$age.'</strong></span></p>

																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Correo:
																				'.$emailFrom.'</strong></span></p>

																	<p style="text-align: left;"><span
																			style="font-size: 14pt; font-family: helvetica, arial, sans-serif;"><strong>Teléfono:
																				<a
																					href="tel:'.$telefono.'">'.$telefono.'</a></strong></span>
																	</p>
																	<p style="text-align: center;"><span
																			style="font-size: 18pt; font-family: helvetica, arial, sans-serif;"><strong><br>
																				Cotización solicitada</strong></span>
																	<ul>
																		'.$examsAsHtml.'
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
mail($emailTo, $emailSubject, $emailBody, $headers);

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

	<link rel="icon" href="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/favicon_v.png" sizes="32x32">
	<link rel="alternate" type="application/rss+xml" title="Laboratorios Catacamas » Feed" href="https://laboratorioshosanna.com/feed/">
	<link rel="icon" href="https://laboratorioshosanna.com/wp-content/uploads/2020/10/cropped-Favicon2-Laboratorios_Hosanna_Honduras-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon" href="https://laboratorioshosanna.com/wp-content/uploads/2020/10/cropped-Favicon2-Laboratorios_Hosanna_Honduras-180x180.png">
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