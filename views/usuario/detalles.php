<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Detalles del usuario <?=$usuario->usuario?></title>
	</head>
	<body>
	
		<?php 
		  (TEMPLATE)::header("Detalles");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Detalles del usuario</h2>
		<h3><?="$usuario->usuario ($usuario->email)"?></h3>
		
		<p><b>Usuario:</b> <?=$usuario->usuario?></p>
		<p><b>Nombre:</b> <?=$usuario->nombre?></p>
		<p><b>Apellidos:</b> <?="$usuario->apellido1 $usuario->apellido2"?></p>
		<p><b>Privilegio:</b> <?=$usuario->privilegio?></p>
		<p><?=$usuario->administrador? "Administrador":"No administrador"?></p>
		<p><b>Email:</b> <?=$usuario->email?></p>
	
	
		<a href="/usuario/edit/<?=$usuario->id?>">Editar usuario</a> - 
		<a href="/usuario/delete/<?=$usuario->id?>">Borrar usuario</a> - 
		<a href="/usuario/list">Lista de usuarios</a> 
	
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
</html>