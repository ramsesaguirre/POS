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
	
	class NeuralConexionBaseDatos {
		
		/**
		 * NeuralConexionBaseDatos($Base)
		 * 
		 * Genera la conexión a la base de datos previamente configurada
		 * Este metodo utiliza Doctrine 2 DBAL para el crud correspondiente 
		 * 
		 * $Aplicacion: nombre en mayusculas de la aplicacion correspondiente
		 * en caso de no seleccionar aplicacion tomara el valor de la aplicacion actual
		 * si no se reconoce configuracion de la aplicacion o no existe envia valores null
		 * generando error en doctrine
		 */
		public static function ObtenerConexionBase($Aplicacion = 'DEFAULT') {
			
			//Leemos el archivo de configuraciones de bases de datos
			$DatosBaseDatos = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion\BasesDatos.yaml');
			
			//Validamos si existe la base de datos
			if(array_key_exists(mb_strtoupper($Aplicacion), $DatosBaseDatos['BASEDATOS']))
			{
				foreach ($DatosBaseDatos['BASEDATOS'][trim(mb_strtoupper($Aplicacion))] as $key => $value)
				{
					$ParametrosConexion[trim($key)] = trim($value);
				}
			}
			else 
			{
				//Tomamos la variable del Mod_Rewrite y validamos el url para determinar el path correspondiente
				$Url = SysMisNeural::LeerURLModReWrite();
				
				if(!empty($Url[0]))
				{
					//Leemos el archivo de configuracion de accesos y lo convertimos en un array
					$AplicacionActiva = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion\ConfiguracionAcceso.yaml');
					
					//Validamos si se encuentra la aplicacion correspondiente
					if(array_key_exists(mb_strtoupper($Url[0]), $AplicacionActiva['APLICACIONES']))
					{
						//Cargamos los parametros de la aplicacion correspondiente
						if(array_key_exists(trim(mb_strtoupper($Url[0])), $DatosBaseDatos['BASEDATOS']))
						{
							foreach ($DatosBaseDatos['BASEDATOS'][trim(mb_strtoupper($Url[0]))] as $key => $value)
							{
								$ParametrosConexion[trim($key)] = trim($value);
							}
						}
						else
						{
							$ParametrosConexion = array();
						}
					}
					else
					{
						$ParametrosConexion = array();
					}
				}
				else
				{
					$ParametrosConexion = array();
				}
			}
			
			require_once __SysNeuralFileRootVendors__.'Doctrine\Common\ClassLoader.php';
			
        	$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
        	$classLoader->register();
			
	        return \Doctrine\DBAL\DriverManager::getConnection($ParametrosConexion);
		}
	}