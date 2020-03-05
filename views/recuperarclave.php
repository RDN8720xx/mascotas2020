<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Recuperar clave</title>
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
		  (TEMPLATE)::login();
		?>  
		
		<h2>Recuperar clave</h2>
		
		<form method="post" action="/forgotpassword/send">
			<label>Usuario</label>
			<input type="text" name="usuario" required>
			<br>
			<label>Email</label>
			<input type="email" name="email" required>
			<br>
			<input type="submit" name="generar" value="Generar nueva clave">
		</form>
		<br>
		
		<?php  (TEMPLATE)::footer(); ?>
	</body>
	
</html>








