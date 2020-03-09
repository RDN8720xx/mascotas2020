<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario Nuevo Anuncio</title>
	</head>
	<body>
		<h1>Seccion de anuncios</h1>
		<?php if(!$usuario){?>
			<form method="post">
				<label>user</label>
				<input type="text" name="user">
				<label>password</label>
				<input type="password" name="password">
				<input type="submit" name="login" value="Login">
			</form>
		<?php }else{?>
			<form method="post">
				<label>Bienvenido <?=$usuario->user?></label>
				<input type="submit" name="logout" value="Logout">
			</form>	
		<?php }?>	
			<ul>
				<li><a href="/">Inicio</a></li>
				<li><a href="/ad">Lista de anuncios</a></li>
				<li><a href="/ad/create">Nuevo anuncio</a></li>
			</ul>
		<h2>Formulario nuevo anuncio</h2>
		<form method="post" action="ad/store" enctype="multipart/form-data">
			
			
			<label>Titulo</label>
			<input type="text" name="titol" required="required" maxlength="32"><br>
			<label>Descripcion</label>
			<input type="text" name="descripcio" required="required" maxlength="64"><br>
			<label>Preu</label>
			<input type="text" name="preu" required="required"><br>
			<label>Imagen</label>
			<input type="file" name="imatge"><br>
			
						
			<input type="submit" name="guardar" value="Guardar">
		</form>
		
		<a href="/anunci/list">Volver al listado</a>
	</body>
</html>