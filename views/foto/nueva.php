<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Insert title here</title>
	</head>
	<body>
		<h2>Nueva foto</h2>
		<h3><?=$mascota->nombre?></h3>
		
		<form method="post" action="/foto/store">
			<input type="hidden" name="idmascota" value="<?=$mascota->id?>">
			
			<label>Fichero</label>
			<input type="file" name="fichero"><br>
			<input type="submit" name="examinar" value="Examinar"><br>
			
			<label>Ubicacion</label>
			<input type="text" name="ubicacion" value="ubicacion"><br>
			
			<input type="submit" name="guardar" value="Guardar">
		</form>
		<br>
		<a href="/foto/show/<?=$mascota->id?>">Volver a detalles</a>
	</body>
</html>