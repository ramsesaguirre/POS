<?php
	
	# #####################################################################################
	#
	#	Neural Framework (Framework en PHP)
	#
	#	@author: 	Zyos Ilusionista <neural.framework@gmail.com> <Zyos_Ilusionista@hotmail.com>
	#	@license: 	Licencia GNU/GPL (http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt)
	#
	#	Edicion Beta de Lanzamiento de Neural Framework.
	#
	#	http://github.com/neuralframework/
	#
	# #####################################################################################
	
	//Mostramos los errores correspondientes
	error_reporting(E_ALL ^ E_STRICT);

	//Comparamos la Version Requerida con la Instalada en el Servidor
	$Validacion[] = (version_compare(phpversion(), '5.3.2', '>=')) ? 1 : 0;
	//array('Validacion' => 1, 'Texto'=> 'Actualmente la Versión de PHP Instalada es Menor a la versión 5.3.2, es necesario realizar la actualización correspondiente.')
	
	//Validamos que ests instalada las librerias de ctype_alpha
	$Validacion[] = (function_exists('ctype_alpha')) ? 1 : 0;
	//array('Validacion' => 1, 'Texto'=> 'Las librerias de ctype_alpha no esta instalada y es necesario instalarla para el funcionamiento del framework')
	
	//Generamos la validacion inicial para cargar la aplicacion
	if($Validacion[0]==1 AND $Validacion[1]==1)
	{
		//Incluimos las Librerias del Core del Framework
		require 'Neural/CargarNucleo.php';
		
		//Generamos la aplicacion del Boot
		$Boot = new Bootstrap();
	}
	else
	{
		//Generamos las validaciones y los textos correspondientes
		$VersionPHP = ($Validacion[0]==1) ? 'Actualmente la Versión de PHP Instalada corresponde a las necesidades del Framework' : 'Actualmente la Versión de PHP Instalada es Menor a la versión 5.3.2, es necesario realizar la actualización correspondiente. <br /><br />Su versión actual de PHP es '.phpversion();
		$LibreriaCtype = ($Validacion[1]==1) ? 'Actualmente se encuentra instaladas las librerias ctype_alpha' : 'Las librerias de ctype_alpha no esta instalada y es necesario instalarla para el funcionamiento del framework';
		
		//Se imprime la validaciones
		echo "
			<html>
				<head>
					<title>.:: Neural Framework ::.</title>
					<style>
						body {
							font-family: verdana;
							font-size: 10px;
							margin-top: 35px;
							margin-left: 35px;	
						}
						
						h1 {
							font-family: verdana;
						}
						
						fieldset {
							padding: 20px;
							width: 600px;
						}
						
						legend {
							font-family: verdana;
							font-size: 12px;
							font-weight: bold;
							margin-left: 35px;
							padding-left: 10px;
							padding-right: 10px;
						}
						li {
							margin-top: 15px;
						}
					</style>
				</head>
				<body>
					<h1>Requerimientos de Neural Framework</h1>
					<p>Actualmente no se encuentran opciones necesarias para su funcionamiento:</p>
					<fieldset>
						<legend>Opciones de Funcionamiento</legend>
						<ul>
							<li><strong>Versión de PHP</strong>: $VersionPHP</li>
							<li><strong>Librerias ctype_alpha</strong>: $LibreriaCtype</li>
						</ul>
					</fieldset>
				</body>
			</html>
		";
	}