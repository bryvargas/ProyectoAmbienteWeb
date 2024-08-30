<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="container mx-auto">
		<form action="php/Login/ProcesarLogin.php" method="post">
			<div class="row">
				<div class=" px-4 py-4">
					<h3 class="card-tittle text-primary mb-4">Login</h3>
					<div class="mb-3">
						<label class="form-label" for="txtUsuario">Usuario</label>
						<input id="txtUsuario" name="usuario" class="form-control" type="text" required>
					</div>					
					<div class="mb-3">
						<label class="form-label" for="txtPassword">Contraseña</label>
						<input id="txtPassword" name="password" class="form-control" type="password" required>
					</div>
					<div class="mb-3">
						<div class="col col-6 mb-2">
							<button class="btn btn-primary btn-sm" type="submit">Login</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>