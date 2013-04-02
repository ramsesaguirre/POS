<!DOCTYPE HTML>
	<html>
		<head>
			<title>AJAX Formulario</title>
			<style>
				body, input {font-family: verdana; font-size: 10px;}
			</style>
			<?php echo NeuralScriptAdministrador::OrganizarScript(false, $this->Script); ?>
		</head>
		<body>
			<fieldset>
				<legend>Envio de Datos POST Ajax</legend>
				<form action="#" method="POST" id="formulario" name="formulario">
					<label>Nombre</label>: 
					<input type="text" name="nombre" id="nombre" placeholder="Escribir Nombre" />
					<br /><br />
					<input type="submit" name="procesar" id="procesar" value="Enviar Datos" />
				</form>
			</fieldset>
			
			<br /><br /><br />
			
			<fieldset>
				
				<div id="respuesta">
					Aqui se Cargara la Informacion
				</div>
				
			</fieldset>
		</body>
	</html>