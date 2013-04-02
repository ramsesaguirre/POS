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
	
	//Cargamos las Configuraciones Generales del Framework
	require 'Configuracion.php';
	
	//Cargamos las rutas del sistema
	require 'CargarRutasSistema.php';
	
	//Cargamos el Sistema de Inclusion de las clases
	require 'Autoload/SysAutoload.php';
	
	//Instanciamos la clase para cargar las diferentes librerias base del framework
	$CargarNucleo = new NeuralSysAutoload;
	
	//Cargamos las librerias externas
	$CargarNucleo->ObtenerLibreria('VENDORS', 'SPYC/spyc');
	$CargarNucleo->ObtenerLibreria('VENDORS', 'PHPMailer/class.phpmailer');
	
	//Cargamos las librerias de encriptacion
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Encriptacion/ProcesoEncriptacion');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Cache/NeuralCacheSimple');
	
	//Cargamos las Librerias del Framework
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Neural/SysMisNeural');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Neural/SysMiscNeuralBD');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Neural/SysMiscNeuralForm');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Boot/Bootstrap');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'BD/NeuralConexionBaseDatos');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'BD/NeuralBDConsultas');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'BD/NeuralBDConsultasArray');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'BD/NeuralBDGab');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'BD/NeuralBDGabArray');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Correo/NeuralEnviarCorreo');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Exportar/ExportarArchivoExcel');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Formularios/NeuralFormularios');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'HTML/NeuralTagFormulario');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'HTML/NeuralTagHTML');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'JQuery/NeuralJQueryAjax');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'JQuery/NeuralJQueryValidacionFormulario');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'ScriptAdmin/ScriptAdmin');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'MVC/Controlador');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'MVC/Modelo');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'MVC/Vista');
	$CargarNucleo->ObtenerLibreria('LIBRERIAS', 'Sesiones/NeuralSesiones');
	
	//Generamos la carga de las librerias
	$CargarNucleo->CargarLibrerias();