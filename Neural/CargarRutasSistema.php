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
	
	//Cargo rutas base manualmente
	
	//Cargamos la ruta base de la aplicacion
	define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)) . '/'); 
	$tempPath1 = explode('/', str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME']))); 
	$tempPath2 = explode('/', substr(ABSPATH, 0, -1)); 
	$tempPath3 = explode('/', str_replace('\\', '/', dirname($_SERVER['PHP_SELF']))); 
	for ($i = count($tempPath2); $i<count($tempPath1); $i++)
		array_pop ($tempPath3);
	$urladdr = $_SERVER['HTTP_HOST'] . implode('/', $tempPath3); 
	if ($urladdr{strlen($urladdr) - 1}== '/')
		define('__NeuralUrlFileRoot__', 'http://' . $urladdr);
	else
		define('__NeuralUrlFileRoot__', 'http://' . $urladdr . '/');
	unset($tempPath1, $tempPath2, $tempPath3, $urladdr);
	
	//Generamos una clase abstracta de Accesos base
	abstract class NeuralRutasBase {
		
		public static function RutaBase($Ruta) {
			
			return __NeuralUrlFileRoot__.$Ruta;
		}
	}