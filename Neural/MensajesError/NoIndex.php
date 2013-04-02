<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>.:: Error: Controlador Principal No Encontrado ::.</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<?php echo NeuralScriptAdministrador::OrganizarScript(array('CSS' => array('BOOSTRAP', 'RESPONSIVE', 'DOCS'))); ?>
		</head>
		<body data-spy="scroll" data-target=".bs-docs-sidebar">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="brand" style="color: white;">Error de Aplicación</a>
						<div class="nav-collapse collapse"></div>
					</div>
				</div>
				<header class="jumbotron subhead" id="overview">
  					<div class="container">
						<h2>Controlador Principal No Encontrado</h2>
						<p class="lead">Aplicación: <?php echo rtrim($Carpeta, '/'); ?><br />Controlador: Index.php</p>
					</div>
				</header>
				


				<div class="container">
					<div class="row">
						<div class="span9">
							<section id="Inicio">
							<div class="alert alert-error">
								<p class="lead">
									Actualmente no se encuentran el controlador principal, recuerde que el Controlador <strong>Index.php</strong> siempre debe estar creado dentro de la carpeta de controladores.<br />
									Recuerde que debe estar generada la clase <code>class Index extends Controlador {} </code>junto con su Metodo <code>public function Index() {}</code> para su visualización.
								</p>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>