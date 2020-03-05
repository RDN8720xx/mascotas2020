<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<style>
		  form label{
		      display: inline-block;
		      min-width: 100px;
		      padding: 5px;
		  }
		</style>
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Identificación");
		  (TEMPLATE)::nav();
		?>  
		<h2>Acceso a la aplicación</h2>
		
		<form method="post" action="/login/login">
			<label>Usuario o email</label>
			<input type="text" name="usuario" required>
			<br>
			<label>Clave</label>
			<input type="password" name="clave" required>
			
			<input type="submit" name="identificar" value="Identificarse">
		</form>
		<br>
		<a href="/forgotpassword">Olvidé mi clave</a>
		<br>
		<?php  (TEMPLATE)::footer(); ?>
	</body>
	
</html>








