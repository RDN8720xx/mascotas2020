
    <!DOCTYPE html>
    <html>
    	<head>
    		<meta charset="UTF-8">
    		<title>Éxito</title>
    	</head>
    	<body>
    		<?php 
    		  (TEMPLATE)::header("Éxito");
    		  (TEMPLATE)::nav();
    		  (TEMPLATE)::login();
    		?>  
    		
    		<h2>Éxito en la operación solicitada</h2>
    
    		<p class='exito'><?=$mensaje?></p>
    		
    		<?php 
    		  (TEMPLATE)::footer();
    		?>
    		
    	</body>
    </html>

