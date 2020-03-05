<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Baja de usuario</title>
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Baja de usuario");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Confirmar baja de usuario</h2>
		<p><?="$usuario->usuario ($usuario->email)"?></p>
		
		<form method="post" action="/usuario/destroy">
			<p>Confirmar el borrado del usuario <?=$usuario->usuario?>.</p>
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="submit" name="borrar" value="Borrar">
		</form>
		<br>
		<a href="/usuario/show/<?=$usuario->id?>">Detalles</a> -
		<a href="/usuario/list">Volver al listado de usuarios</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
	
</html>








