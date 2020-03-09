<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista de mascotas</title>
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Mascotas");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Lista de mascotas</h2>
			
		<table border="1">
			<tr>
				<th>Nombre</th>
				<th>Sexo</th>
				<th>Biografia</th>
				<th>FechaNac</th>
				<th>Operaciones</th>
			</tr>
    		<?php foreach($mascotas as $mascota){
    			   echo "<tr>";
    			   echo "<td>$mascota->nombre</td>";
    			   echo "<td>$mascota->sexo</td>";
    			   echo "<td>$mascota->biografia"; 
                   echo "<td>$mascota->fechadenacimiento</td>";
    			   echo "<td>";
    			   echo " <a href='/mascota/show/$mascota->id'>Ver</a>";
    			   if(Login::getUsuario() && Login::getUsuario()->id==$anunci->idusuario){
         			   echo "-<a href='/mascota/edit/$mascota->id'>Actualizar</a>";
    	       		   echo "-<a href='/mascota/delete/$mascota->id'>Borrar</a>";
    			   }
    			   
    			   echo "</td>";
    			   echo "</tr>";
    		}?>
		</table>
		<br>
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
</html>

