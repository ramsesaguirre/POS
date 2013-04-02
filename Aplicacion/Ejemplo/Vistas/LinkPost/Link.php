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
			<p>Los Datos son Framework: Neural, Version: 1.0</p>
			<br />
			<a href="#" id="link">Envias Datos</a>
			<br />
			<br />
			<fieldset>
				<div id="respuesta">
					Aqui se cargara la informacion
				</div>
			</fieldset>
		</body>
	</html>