<?php
session_start();

if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Edición de Precios | Laboratorio Clínico Catacamas</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		.hidden {
			display: none;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<div id="saludo"></div>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="https://laboratorioscatacamas.hn/" id="horario">Ir a Sitio web</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php" id="cerrar-sesion-link"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-sm-6 text-center">
				<img src="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/cropped-logo-02-1.png" alt="" class="img-responsive img-center img-logo">
				<h2 class="mt-3">Edición de Precios Laboratorio Clínico Catacamas</h2>
			</div>
		</div>

		<table id="exa_rutina_table" class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<script>
		document.querySelector('#cerrar-sesion-link').addEventListener('click', function(event) {
			event.preventDefault();

			Swal.fire({
				title: '¿Estás seguro de cerrar sesión?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = 'logout.php';
				}
			});
		});

		function loadExaRutina() {
			fetch('fetch_exa_rutina.php')
				.then(response => response.json())
				.then(data => {
					const tbody = document.querySelector('#exa_rutina_table tbody');
					tbody.innerHTML = '';

					data.forEach(exa => {
						const tr = document.createElement('tr');
						tr.innerHTML = `
                    <td>${exa.id}</td>
                    <td>${exa.nombre}</td>
                    <td><input type="text" class="precio" value="${exa.precio}" disabled></td>
                    <td>
						<button class="editar btn btn-primary">Editar</button>
						<button class="guardar hidden btn btn-success">Guardar</button>
						<button class="cancelar hidden btn btn-danger">Cancelar</button>
                    </td>
                `;
						tbody.appendChild(tr);
					});

					const editButtons = document.querySelectorAll('.editar');
					editButtons.forEach(button => {
						button.addEventListener('click', function() {
							const tr = this.closest('tr');
							const precioInput = tr.querySelector('.precio');
							const buttons = tr.querySelectorAll('.editar, .guardar, .cancelar');

							// Guarda el valor original del precio antes de habilitar el input
							precioInput.dataset.originalValue = precioInput.value;
							precioInput.disabled = false;
							buttons.forEach(btn => btn.classList.toggle('hidden'));
						});
					});

					const saveButtons = document.querySelectorAll('.guardar');
					saveButtons.forEach(button => {
						button.addEventListener('click', function() {
							const tr = this.closest('tr');
							const id = tr.querySelector('td:first-child').innerText;
							const precioInput = tr.querySelector('.precio');
							const precio = precioInput.value;

							Swal.fire({
								title: '¿Estás seguro de guardar los cambios?',
								icon: 'warning',
								showCancelButton: true,
								confirmButtonText: 'Sí, guardar',
								cancelButtonText: 'Cancelar',
							}).then(result => {
								if (result.isConfirmed) {
									fetch('update_exa_rutina.php', {
										method: 'POST',
										body: new URLSearchParams({
											id: id,
											precio: precio
										}),
										headers: {
											'Content-Type': 'application/x-www-form-urlencoded'
										}
									}).then(() => {
										precioInput.disabled = true;
										const buttons = tr.querySelectorAll('.editar, .guardar, .cancelar');
										buttons.forEach(btn => btn.classList.toggle('hidden'));
									});
								}
							});
						});
					});

					const cancelButton = document.querySelectorAll('.cancelar');
					cancelButton.forEach(button => {
						button.addEventListener('click', function() {
							const tr = this.closest('tr');
							const precioInput = tr.querySelector('.precio');
							const buttons = tr.querySelectorAll('.editar, .guardar, .cancelar');

							// Restaura el valor original del precio al presionar "Cancelar"
							precioInput.value = precioInput.dataset.originalValue;

							precioInput.disabled = true;
							buttons.forEach(btn => btn.classList.toggle('hidden'));
						});
					});
				});
		}

		document.addEventListener('DOMContentLoaded', function() {
			loadExaRutina();
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script>
		function showGreetings() {
			const now = new Date();
			const hours = now.getHours();
			let greeting;

			if (hours >= 6 && hours < 12) {
				greeting = 'Bievenido, ☀️ Buenos días ';
			} else if (hours >= 12 && hours < 18) {
				greeting = 'Bievenido, 🌤️ Buenas tardes ';
			} else {
				greeting = 'Bievenido, 🌙 Buenas noches ';
			}

			const saludoElement = document.getElementById('saludo');
			saludoElement.textContent = greeting;
		}

		document.addEventListener('DOMContentLoaded', function() {
			showGreetings();
		});
	</script>
</body>

</html>