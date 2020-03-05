<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registro de usuarios</title>
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
		  (TEMPLATE)::header("Registro de usuarios");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Nuevo usuario</h2>
		
		<form method="post" action="/usuario/store">
			<label>Usuario</label>
			<input type="text" name="usuario">
			<br>
			<label>Clave</label>
			<input type="password" name="clave">
			<br>
			<label>Nombre</label>
			<input type="text" name="nombre">
			<br>
			<label>Primer apellido</label>
			<input type="text" name="apellido1">
			<br>
			<label>Segundo apellido</label>
			<input type="text" name="apellido2">
			<br>
			<label>Email</label>
			<input type="email" name="email">
			<br>
			
			 <?php if(Login::isAdmin()){ ?>
			<h4>Operaciones solo para el admin</h4>
			<label>Privilegio</label>
			<input type="number" value="0" min="0" max="9999" name="privilegio">
			<br>
			<input type="checkbox" name="administrador" value="1">
			<label>Conceder privilegio de administrador</label>
			<br>
         <?php } ?>

			<input type="submit" name="guardar" value="Guardar">
		</form>
		<br>
		<a href="/usuario/list">Volver al listado de usuarios</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
    		
	</body>
</html>








