<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Detalles de ejemplares</title>
	</head>
	<body>
		<?php 
		// si hay ejemplares
		if(sizeof($fotos)){
		    
		    echo "<ul>";
		    
		    // muestra cada una de las fotos en una lsta HTML
		    foreach($fotos as $f)
		        echo "<li>Foto $f</li>";
		        
		    echo "</ul>";
		    
		// si no hay fotos
		}else 
		    echo "<p>No tenemos fotos de esta mascota.</p>";
		
		?>

		<a href="/foto/create/<?=$mascota->id?>">Añadir foto</a>
		
		<a href="/mascota/edit/<?=$mascota->id?>"Editar mascota</a>
		<a href="/mascota/delete/<?=$mascota->id?>">Borrar mascota</a>
		<a href="/mascota/list">Lista de mascotas</a>

	</body>
</html>