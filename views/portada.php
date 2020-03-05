
    <!DOCTYPE html>
    <html>
    	<head>
    		<meta charset="UTF-8">
    		<title>Portada</title>
    	</head>
    	
    	<body>
    		<?php 
    		  (TEMPLATE)::header("Portada");
    		  (TEMPLATE)::nav();
    		  (TEMPLATE)::login();
    		?>  
    		
    		<h2>Bienvenido a nuestra biblioteca</h2>
    		<?php 
    		  echo Login::get()? 
    		          "<p>Identificado como ".Login::get()->usuario."</p>":
    		          "<p>No estás identificado</p>";
    		  
    		  echo Login::isAdmin()?
        		  "<p>Eres administrador todopoderoso</p>":
        		  "<p>No eres admin</p>";
    		  
    		  echo Login::hasPrivilege(500)?
        		  "<p>Tienes nivel de privilegio 500 o más</p>":
        		  "<p>Tienes menos de 500 de nivel de privilegio</p>";
    		
    		?>
    		<p>Esta es una aplicación de prueba para comprender el MVC.</p>
    		
    		<?php 
    		  (TEMPLATE)::footer();
    		?>
    	</body>
    	
    </html>

