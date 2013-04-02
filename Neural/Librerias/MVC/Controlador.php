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
	
	class Controlador {
		
		function __Construct() {
			$this->Vista = new Vista();
		}
		
		public function CargarModelo($Nombre) {
			
			//Tomamos la variable del Mod_Rewrite y validamos el url para determinar el path correspondiente
			$Url = SysMisNeural::LeerURLModReWrite();
			
			//Leemos el archivo de configuracion de accesos y lo convertimos en un array
			$Array = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionAcceso.yaml');
			
			//Validamos si cargamos el default o la aplicación seleccionada
			if(!empty($Url[0]))
			{
				//Validamos si existe la aplicacion correspondiente
				if(array_key_exists(mb_strtoupper($Url[0]), $Array['APLICACIONES']))
				{
					//Generamos las rutas de accesos
					$Carpeta = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['CARPETA'];
					$Modelos = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['MODELOS'];
					
					//Definimos el Nombre del controlador
					$Controlador = (isset($Url[1]) == true AND empty($Url[1]) != true) ? $Url[1] : 'Index';
					
					//Generamos el Nombre del Modelo y la Ruta correspondiente
					$Archivo = SysMisNeural::GenerarNombreModeloRuta($Carpeta, $Modelos, $Controlador);
					
					//validamos si existe el archivo, si existe lo cargamos de lo contrario lo omitimos
					if(file_exists($Archivo['Archivo']))
					{
						//Incluimos el modelo correspondiente
						require $Archivo['Archivo'];
						
						$this->Modelo = new $Archivo['Nombre'];
					}
				}
			}
			else
			{
				//Generamos las rutas de accesos
				$Carpeta = $Array['APLICACIONES']['DEFAULT']['CARPETA'];
				$Modelos = $Array['APLICACIONES']['DEFAULT']['MODELOS'];
				
				//Generamos la ruta del archivo correspondiente
				$Archivo = SysMisNeural::GenerarNombreModeloRuta($Carpeta, $Modelos, 'Index');
				
				//validamos si existe el archivo, si existe lo cargamos de lo contrario lo omitimos
				if(file_exists($Archivo['Archivo']))
				{
					//Incluimos el modelo correspondiente
					require $Archivo['Archivo'];
					
					$this->Modelo = new $Archivo['Nombre'];
				}
			}
		}
	}