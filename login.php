<?php
session_start();
include 'conexion.php';
// $password = "LabCatacamas2023";
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="row">
			<div class="col-md-12 text-center">
				<img src="https://laboratorioscatacamas.hn/wp-content/uploads/2022/04/cropped-logo-02-1.png" alt="" class="img-responsive img-center img-logo">
				<br>
				<br>
				<h4 class="mb-4">Iniciar sesión</h4>
				<form action="login.php" method="post">
					<div class="mb-3">
						<label for="username" class="form-label">Usuario:</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Contraseña:</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div class="mb-3">
						<input type="submit" name="submit" value="Iniciar sesión" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		document.querySelector('form').addEventListener('submit', function(event) {
			event.preventDefault();

			const username = document.querySelector('#username').value;
			const password = document.querySelector('#password').value;

			fetch('login_process.php', {
					method: 'POST',
					body: new URLSearchParams({
						username: username,
						password: password,
					}),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
				})
				.then((response) => response.json())
				.then((data) => {
					if (data.success) {
						location.href = 'editorlab.php';
					} else {
						Swal.fire({
							title: 'Error',
							text: data.message,
							icon: 'error',
							confirmButtonText: 'Aceptar',
						});
					}
				});
		});
	</script>

</body>

</html>