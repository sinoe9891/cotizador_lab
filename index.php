<!DOCTYPE html>
<?php
include 'conexion.php';
?>
<!-- saved from url=(0045)https://laboratorioscatacamas.hn/cotizador/ -->
<html lang="es_US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-param" content="_csrf">
	<title>Cotizador de Exámenes</title>
	<meta property="og:description" content="Aquí encontrará exámenes especiales y de rutina, si desea cotizar un exámen que no se encuentra en esta lista, por favor comunicarse con nosotros enviando un correo electrónico a info@laboratorioscatacamas.hn o llamando al +504 2799-4495.">
	<meta property="og:url" content="https://laboratorioscatacamas.hn/cotizador/">
	<meta property="og:site_name" content="Cotizador de Exámenes - Laboratorios Catacamas">
	<meta property="og:image" content="https://laboratorioscatacamas.hn/wp-content/uploads/2022/05/Screenshot-2022-05-04-105424.jpg">
	<link href="fonts/fontawesome-webfont.woff2" rel="stylesheet">
	<link href="fonts/glyphicons-halflings-regular.woff2" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/all.css" rel="stylesheet">
	<link href="./index_files/bootstrap.css" rel="stylesheet">
	<link href="./index_files/site.css" rel="stylesheet">
	<script src="./index_files/jquery.js.descarga"></script>
	<script src="./index_files/yii.js.descarga"></script>
	<script src="./index_files/bootstrap.js.descarga"></script>
	<script src="./index_files/api.js.descarga"></script>
	<script src="assets/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" id="morriston-google-fonts-css" href="https://fonts.googleapis.com/css?family=Pacifico:400,400i,500,500i,600,600i,700,700i,800,800i%7CPoppins:400,400i,500,500i,600,600i,700,700i,800,800i&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese" type="text/css" media="all">
	<link rel="icon" href="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/favicon_v.png" sizes="32x32">
	<link rel="alternate" type="application/rss+xml" title="Laboratorios Catacamas » Feed" href="https://laboratorioscatacamas.hn/feed/">
	<link rel="alternate" type="application/rss+xml" title="Laboratorios Hosanna » Feed de los comentarios">
</head>

<body>
	<div class="main-wrapper">
		<div class="row" style="margin-right: 0 !important;margin-left: 0 !important;    display: flex;align-items: center;">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 titulo"><br>
				<img src="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/cropped-logo-02-1.png" alt="" class="img-responsive img-center img-logo" style="">
				<br>
				<h2 class="text-center big-title">Cotizador de Exámenes</h2>
			</div>
			<div class="col-sm-4">


			</div>
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav text-center">
						<li class=""><a href="https://laboratorioscatacamas.hn/">
								<p><i class="fa-solid fa-caret-right"></i>Volver al Inicio</p>
							</a></li>
						<li class=""><a href="https://laboratorioscatacamas.hn/cotizador" target="_blank">
								<p><i class="fa-solid fa-caret-right"></i>Nueva
									Cotización</p>
							</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>
		<div class="">
			<script>
				var chequeados = 0;
				var agregados = [];
				var ldl = false;
			</script>

			<form id="frm-cotizador" action="./form-to-email.php" method="POST">
				<div class="container">
					<div class="row">
						<br>
						<div id="errordiv" class="alert alert-danger hidden" role="alert">
							<div id="mensajeerror"></div>
						</div>
						<section>
							<div class="wizard">
								<div class="wizard-inner">

									<div class="connecting-line"></div>
									<ul class="nav nav-tabs" role="tablist">

										<li role="presentation" class="active">
											<a href="https://laboratorioscatacamas.hn/cotizador/#step1" data-toggle="tab" aria-controls="step1" role="tab" title="" data-original-title="Seleccionar Exámenes">
												<span class="round-tab">
													<i class="fa-solid fa-flask-vial"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="https://laboratorioscatacamas.hn/cotizador/#step2" data-toggle="tab" aria-controls="step2" role="tab" title="" data-original-title="Información de Contacto">
												<span class="round-tab">
													<i class="fa-regular fa-address-card"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="https://laboratorioscatacamas.hn/cotizador/#complete" data-toggle="tab" aria-controls="complete" role="tab" title="" data-original-title="Solicitar Cotización">
												<span class="round-tab">
													<i class="fa-solid fa-clipboard-check"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>


								<div class="tab-content">
									<div class="tab-pane active" role="tabpanel" id="step1">
										<div class="col-lg-12">
											<table class="table-responsive table borderless">
												<tbody>
													<tr>
														<td>
															<h4>Seleccionar Exámenes</h4>
														</td>
														<td>
															<button type="button" data-step="1" class="btn btn-lg btn-lb next-step pull-right">Continuar
															</button>
														</td>
													</tr>
												</tbody>
											</table>

											<div class="row">
												<div class="col-lg-12">
													<h5>Ha seleccionado <span id="examenes_seleccionados">0</span>
														exámenes</h5>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<div class="icon-addon addon-lg">
															<input type="text" placeholder="Búsqueda de Exámenes" class="form-control" id="filtrar_examen">
															<label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6 informacion">
													<p>Aquí encontrará exámenes especiales y de rutina, si desea cotizar un exámen que no se encuentra en esta lista, por favor comunicarse con nosotros enviando un correo electrónico a <a href="mailto:info@laboratorioscatacamas.hn">info@laboratorioscatacamas.hn</a>
														o llamando al <a href="tel:+50427994495">+504 2799-4495</a>.</p>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 table-parent">
													<table id="tabla-examenes" class="table table-hover table-striped table-responsive">
														<tbody>
															<?php
															$consulta = $conn->query("SELECT a.id, a.nombre, a.precio, b.nombre AS categoria FROM exa_rutina a, categoria b WHERE a.categoria = b.id ORDER BY a.nombre ASC");

															$numero = mysqli_num_rows($consulta);
															echo '<h4>Total exámenes disponibles: <b>' . $numero . '</b></h4><hr>';
															?>
															<?php
															while ($hola = $consulta->fetch_array()) {
															?>

																<tr data-name="<?php echo $hola['nombre'] ?>">
																	<td style="width:80%;">
																		<h4>
																			<b><?php echo $hola['nombre'] ?></b>
																		</h4>
																		<p><b>Tipo: </b><?php echo $hola['categoria'] ?></p>
																		<!-- <p><b>Condiciones: </b>Requiere ayuno</p>
																	<p><b>Tiempo de entrega: </b>Lunes a Viernes</p>
																	<p><b>Local de Toma de Muestra: </b>Todos los
																		locales </p> -->
																		<!--<p><b>Observaciones: </b>Preferiblemente presentar orden médica.</p>-->
																	</td>

																	<td style="vertical-align: middle">
																		<div class="toggle-button toggle-button--vesi">
																			<input onclick="return seleccionarExamen(this,true)" data-relaciones="" id="toggleButton<?php echo $hola['id'] ?>" type="checkbox" name="Examen[]" value="<?php echo $hola['nombre'] ?>">
																			<label for="toggleButton<?php echo $hola['id'] ?>" data-on-text="" data-off-text=""></label>
																			<div class="toggle-button__icon"></div>
																		</div>
																		<input type="hidden" name="Precio[]" value="<?php echo $hola['precio'] ?>">
																	</td>
																</tr>
															<?php
															}
															?>

															<!-- <tr data-name="Vitamina B12">
																<td style="width:80%;">
																	<h4>
																		<b>Vitamina B12</b>
																	</h4>
																	<p><b>Condiciones: </b>Requiere Ayuno
																	</p>
																	<p><b>Tiempo de entrega: </b>lunes a viernes
																	</p>
																	<p><b>Local de Toma de Muestra: </b>Todos los
																		locales
																	</p>
																</td>
																
																<td style="vertical-align: middle">
																	<div class="toggle-button toggle-button--vesi">
																		<input onclick="return seleccionarExamen(this,true)" data-relaciones="" id="toggleButton161" type="checkbox" name="Examen[]" value="Vitamina B12">
																		<label for="toggleButton161" data-on-text="" data-off-text=""></label>
																		<div class="toggle-button__icon"></div>
																	</div>
																</td>
															</tr> -->
														</tbody>
													</table>
												</div>


											</div>
										</div>
									</div>
									<div class="tab-pane" role="tabpanel" id="step2">
										<div class="col-lg-8 col-lg-offset-2">
											<table class="table-responsive table borderless">
												<tbody>
													<tr>
														<td>
															<h4>Información de Contacto</h4>
														</td>

														<td>
														</td>
													</tr>
												</tbody>
											</table>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-nombres required">
														<label class="control-label" for="cotizacion-nombres">Nombres</label>
														<input type="text" id="cotizacion-nombres" class="form-control" name="Cotizacion[nombres]" maxlength="128" aria-required="true">

														<div class="help-block"></div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-apellidos required">
														<label class="control-label" for="cotizacion-apellidos">Apellidos</label>
														<input type="text" id="cotizacion-apellidos" class="form-control" name="Cotizacion[apellidos]" maxlength="128" aria-required="true">

														<div class="help-block"></div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-correo required">
														<label class="control-label" for="Cotizacion[genero]">Género</label>
														<select class="form-control" name="Cotizacion[genero]" id="cotizacion-genero">
															<option value="Masculino">Masculino</option>
															<option value="Femenino">Femenino</option>
														</select>
														<div class="help-block"></div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-correo required">
														<label class="control-label" for="cotizacion-correo">Correo</label>
														<input type="text" id="cotizacion-correo" class="form-control" name="Cotizacion[correo]" maxlength="128" aria-required="true">

														<div class="help-block"></div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-telefono">
														<label class="control-label" for="cotizacion-telefono">Teléfono</label>
														<input type="text" id="cotizacion-telefono" class="form-control" name="Cotizacion[telefono]">

														<div class="help-block"></div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-identificacion">
														<label class="control-label" for="cotizacion-identificacion">Número de ID</label>
														<input type="text" id="cotizacion-identificacion" class="form-control" name="Cotizacion[identificacion]" minlength="13" maxlength="128" placeholder="080119980280">

														<div class="help-block"></div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group field-cotizacion-edad">
														<label class="control-label" for="cotizacion-edad">Edad</label>
														<input type="text" id="cotizacion-edad" class="form-control" name="Cotizacion[edad]">

														<div class="help-block"></div>
													</div>
												</div>
											</div>
											<table class="table-responsive table borderless">
												<tbody>
													<tr>
														<!-- <td>
															<h4>Información de Contacto</h4>
														</td> -->

														<td>
															<ul class="list-inline pull-right">

																<li>
																	<button type="button" class="btn  btn-lg btn-lb next-step" data-step="2">Continuar
																	</button>
																</li>
															</ul>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" role="tabpanel" id="complete">
										<div class="col-lg-4 col-lg-offset-4">
											<!-- <div class="g-recaptcha"
												data-sitekey="6Lc2JU4UAAAAANMsOT5SbnQrAOqH3leI5zvMDBmj"
												data-theme="light"
												style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
												<div style="width: 304px; height: 78px;">
													<div><iframe src="./index_files/anchor.html" width="304" height="78"
															role="presentation" name="a-qtspqhsrupww" frameborder="0"
															scrolling="no"
															sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
													</div><textarea id="g-recaptcha-response"
														name="g-recaptcha-response" class="g-recaptcha-response"
														style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
												</div><iframe style="display: none;"
													src="./index_files/saved_resource(1).html"></iframe>
											</div> -->
											<ol style="font-size:13px;">
												<li>Los precios de esta cotización estan sujetos a cambio sin previo
													aviso.</li>
												<li>Laboratorios Catacamas le recomienda consultar con su médico sobre los
													exámenes que
													desea realizarse.
												</li>
											</ol>
											<div class="checkbox">
												<label>
													<input type="checkbox" id="politics1"> Estoy de acuerdo con los <a href="#">términos
														y
														condiciones.</a>
												</label>
											</div>
											<div class="form-group text-center hidden" id="final-step">

												<a class="btn btn-lb btn-lg btn-block" id="cotizar-btn-final" onclick="return procesarCotizacion()">Cotizar</a>
											</div>
											<table class="table-responsive table borderless">
												<tbody>
													<tr class="text-center">

													</tr>


													<tr class="text-center" style="vertical-align: middle">

													</tr>
												</tbody>
											</table>
										</div>

									</div>
									<div class="clearfix"></div>
								</div>

							</div>
						</section>
					</div>
				</div>
			</form>
			<script>
				function procesarCotizacion() {
					// 	var response = grecaptcha.getResponse();

					// 	if (response.length == 0) {
					// 		/*alert("Por favor compruebe que no es un robot");*/
					// 		$("#mensajeerror").html('Por favor compruebe que no es un robot');
					// 		$("#errordiv").toggleClass('hidden');
					// 		return false;
					// 	}
					// 	else {
					$("#frm-cotizador").submit();
					// 	}

				}

				function seleccionarExamen(element, next) {
					var es = $(element).val();
					if (ldl && (es == "Colesterol HDL" || es == "Colesterol Total" || es == "Trigliceridos")) {
						/*alert("Usted ha seleccionado Colesterol LDL, este examen debe ir incluido.");*/
						$("#mensajeerror").html('Usted ha seleccionado Colesterol LDL, este examen debe ir incluido.');
						$("#errordiv").toggleClass('hidden');
						return false;
					}
					console.log(element);
					var add = false;
					if ($(element).is(':checked')) {
						chequeados++;
						add = true;
					} else {
						chequeados--;
						add = false;
					}
					$("#examenes_seleccionados").html($("input:checked").length);
					if (next) {
						var relaciones = $(element).attr("data-relaciones");
						if (relaciones != "") {
							ldl = !ldl;
							var array = relaciones.split(',');
							$.each(array, function(index, value) {
								if ($(element).val() != value) {
									activarRelacion("#toggleButton" + value, add);
								}
							});
						}
					}
					return true;
				}

				function activarRelacion(element, add) {
					if (add) {
						$(element).prop('checked', true);
						chequeados++;
					} else {
						$(element).prop('checked', false);
						chequeados--;
					}
					$("#examenes_seleccionados").html($("input:checked").length);
				}

				$("#filtrar_examen").on("keyup", function() {
					var value = $(this).val();

					$("#tabla-examenes tr").each(function(index) {
						var row = $(this);
						if (row.attr('data-name').toUpperCase().indexOf(value.toUpperCase()) > -1) {
							row.show();
						} else {
							row.hide();
						}
					});
				});

				$("#cotizacion-telefono").keydown(function(e) {

					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
						// Allow: Ctrl+A, Command+A
						(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
						// Allow: home, end, left, right, down, up
						(e.keyCode >= 35 && e.keyCode <= 40)) {
						// let it happen, don't do anything
						return;
					}
					// Ensure that it is a number and stop the keypress
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
					if ($(this).val().length >= 8) {
						e.preventDefault();
						return;
					}
				});

				$("#cotizacion-edad").keydown(function(e) {

					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
						// Allow: Ctrl+A, Command+A
						(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
						// Allow: home, end, left, right, down, up
						(e.keyCode >= 35 && e.keyCode <= 40)) {
						// let it happen, don't do anything
						return;
					}
					// Ensure that it is a number and stop the keypress
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
					if ($(this).val().length >= 3) {
						e.preventDefault();
						return;
					}
				});

				$(document).ready(function() {
					//Initialize tooltips
					$('.nav-tabs > li a[title]').tooltip();

					//Wizard
					$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

						var $target = $(e.target);

						if ($target.parent().hasClass('disabled')) {
							return false;
						}
					});

					$(".next-step").click(function(e) {
						var valid = true;
						var error = "";
						if ($(this).attr('data-step') == "1") {
							if ($("input:checked").length < 1) {
								/*alert("Deberá agregar al menos 1 examen");*/
								$("#mensajeerror").html('Deberá agregar al menos 1 examen');
								$("#errordiv").removeClass('hidden');
								valid = false;
							}
						}
						if ($(this).attr('data-step') == "2") {
							if ($("#cotizacion-nombres").val() == "" || $("#cotizacion-apellidos").val() == "" || $("#cotizacion-correo").val() == "" || $("#cotizacion-identificacion").val() == "" || $("#cotizacion-edad").val() == "") {
								valid = false;
								// error += "Debe de llenar todos los campos. \n";
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Debe de llenar todos los campos'

								})
							}
							if ($("#cotizacion-identificacion").val() != "") {
								if ($("#cotizacion-identificacion").val().length < 13) {
									console.log("Error");
									valid = false;
									Swal.fire({
										icon: 'error',
										title: 'Oops...',
										text: 'La identidad no puede ser menor a 13 dígitos'

									})
								}
							}



							if ($("#cotizacion-edad").val() > 100) {
								valid = false;
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'La edad no puede ser mayor a 100'

								})
							}


							if (error != "") {
								//alert(error);
								$("#errordiv").removeClass('hidden');
								$("#mensajeerror").html(error);
							}

						}
						if (valid) {
							var $active = $('.wizard .nav-tabs li.active');
							$active.next().removeClass('disabled');
							$("#errordiv").addClass('hidden');
							nextTab($active);
						} else {
							var $active = $('.wizard .nav-tabs li.active');
							$active.next().addClass('disabled');
							nextTab($active);
							return false;
						}


					});
					$(".prev-step").click(function(e) {

						var $active = $('.wizard .nav-tabs li.active');
						prevTab($active);

					});
				});

				function nextTab(elem) {
					$(elem).next().find('a[data-toggle="tab"]').click();
				}

				function prevTab(elem) {
					$(elem).prev().find('a[data-toggle="tab"]').click();
				}

				$(document).on('change', '#politics1', function() {
					$("#final-step").toggleClass('hidden');
				});
			</script>
		</div>
		<!--<htmlpagefooter name="MyCustomFooter">
        <table style="vertical-align: bottom; padding: 0px; margin: 0px; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;" width="100%">
            <tbody>
            <tr>
                <td width="100%"><img class="img-responsive" src="https://www.laboratoriosmedicos.hn/cotizador/img/footer.png" alt=""></td>
            </tr>
            </tbody>
        </table>
    </htmlpagefooter>-->
	</div>
	<script src="./index_files/yii.validation.js.descarga"></script>
	<script src="./index_files/yii.activeForm.js.descarga"></script>
	<!-- <script>jQuery(function ($) {
			jQuery('#frm-cotizador').yiiActiveForm([{ "id": "cotizacion-nombres", "name": "nombres", "container": ".field-cotizacion-nombres", "input": "#cotizacion-nombres", "validate": function (attribute, value, messages, deferred, $form) { yii.validation.required(value, messages, { "message": "Nombres no puede estar vacío." }); yii.validation.string(value, messages, { "message": "Nombres debe ser una cadena de caracteres.", "max": 128, "tooLong": "Nombres debería contener como máximo 128 letras.", "skipOnEmpty": 1 }); } }, { "id": "cotizacion-apellidos", "name": "apellidos", "container": ".field-cotizacion-apellidos", "input": "#cotizacion-apellidos", "validate": function (attribute, value, messages, deferred, $form) { yii.validation.required(value, messages, { "message": "Apellidos no puede estar vacío." }); yii.validation.string(value, messages, { "message": "Apellidos debe ser una cadena de caracteres.", "max": 128, "tooLong": "Apellidos debería contener como máximo 128 letras.", "skipOnEmpty": 1 }); } }, { "id": "cotizacion-correo", "name": "correo", "container": ".field-cotizacion-correo", "input": "#cotizacion-correo", "validate": function (attribute, value, messages, deferred, $form) { yii.validation.required(value, messages, { "message": "Correo no puede estar vacío." }); yii.validation.email(value, messages, { "pattern": /^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/, "fullPattern": /^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/, "allowName": false, "message": "Correo no es una dirección de correo válida.", "enableIDN": false, "skipOnEmpty": 1 }); yii.validation.string(value, messages, { "message": "Correo debe ser una cadena de caracteres.", "max": 128, "tooLong": "Correo debería contener como máximo 128 letras.", "skipOnEmpty": 1 }); } }, { "id": "cotizacion-telefono", "name": "telefono", "container": ".field-cotizacion-telefono", "input": "#cotizacion-telefono", "validate": function (attribute, value, messages, deferred, $form) { yii.validation.number(value, messages, { "pattern": /^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/, "message": "Teléfono debe ser un número.", "skipOnEmpty": 1 }); } }, { "id": "cotizacion-identificacion", "name": "identificacion", "container": ".field-cotizacion-identificacion", "input": "#cotizacion-identificacion", "validate": function (attribute, value, messages, deferred, $form) { yii.validation.string(value, messages, { "message": "Número de ID debe ser una cadena de caracteres.", "max": 128, "tooLong": "Número de ID debería contener como máximo 128 letras.", "skipOnEmpty": 1 }); } }, { "id": "cotizacion-edad", "name": "edad", "container": ".field-cotizacion-edad", "input": "#cotizacion-edad", "validate": function (attribute, value, messages, deferred, $form) { yii.validation.number(value, messages, { "pattern": /^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/, "message": "Edad debe ser un número.", "skipOnEmpty": 1 }); yii.validation.number(value, messages, { "pattern": /^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/, "message": "Edad debe ser un número.", "min": 1, "tooSmall": "Edad no debe ser menor a 1.", "max": 100, "tooBig": "Edad no debe ser mayor a 100.", "skipOnEmpty": 1 }); } }], []);
		});</script> -->

	<div style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
		<div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;">
		</div>
		<div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;">
		</div>
		<div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;">
		</div>
		<div style="z-index: 2000000000; position: relative;"><iframe title="recaptcha challenge" src="./index_files/bframe.html" name="c-qtspqhsrupww" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" style="width: 100%; height: 100%;"></iframe></div>
	</div>
</body>

</html>