<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de contacto</title>
		
		<script src="https://www.google.com/recaptcha/api.js"></script>
		
		<style>
		  form label{
		      display: inline-block;
		      min-width: 120px;
		      padding: 5px;
		  }
		  form textarea{
		      vertical-align: text-top;
		      height: 100px;
		      width: 30%;
		      min-width: 200px;
		      resize:none;
		  }
		</style>
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Formulario de contacto");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Contactar</h2>
		
		<form method="post" action="/contacto/send">
			<label>Email</label>
			<input type="email" name="email" required><br>
			<label>Nombre</label>
			<input type="text" name="nombre" required><br>
			<label>Asunto</label>
			<input type="text" name="asunto" required><br>
			<label>Mensaje</label>
			<textarea name="mensaje" required></textarea>
			<br><br>
			<div class="g-recaptcha"
				data-sitekey="6LfHIt0UAAAAAFtWr9E4EMA-NOdY4uyUasqmzrNi">
			</div>
			<br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<br>		
	
		<?php 
		  (TEMPLATE)::footer();
		?>
		
	</body>
</html>








