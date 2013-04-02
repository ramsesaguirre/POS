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
	
	class Vista {
		
		function __Construct() {
			
			//Cargamos una Codificacion Basica
			header('Content-Type: text/html; charset=iso-8859-1');
		}
		
		/**
		 * GenerarVista($Archivo, $Tipo = 0)
		 * 
		 * General las vistas correspondientes segun el mapa cargado
		 * $Archivo: ruta del archivo sin extension .php dentro de vistas
		 * $Tipo: es el mapa que se ha creado, por defecto ya esta uno creado pero se pueden agregar mas
		 */
		public function GenerarVista($Archivo, $Tipo = 0) {
			
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
					$Vistas = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['VISTAS'];
					
					//Convertimos el array en una variable para su manupulacion
					$ArrayVistas = NeuralAsignacionVistas::SeleccionVista($Tipo);
					foreach ($ArrayVistas AS $Llave => $Valor)
					{
						if($Valor == 'NOMBREARCHIVO')
						{
							$File = __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Archivo.'.php';
							
							if(file_exists($File))
							{
								//Generamos el require para incluir la vista correspondiente
								require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Archivo.'.php';
							}
							else
							{
								require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/Error/NoExisteArchivo.php';
							}
						}
						else
						{
							//Generamos el require para incluir la vista correspondiente
							require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Valor;
						}
					}
				}
				else
				{
					//Generamos las rutas de accesos
					$Carpeta = $Array['APLICACIONES']['DEFAULT']['CARPETA'];
					$Vistas = $Array['APLICACIONES']['DEFAULT']['VISTAS'];
					
					//Convertimos el array en una variable para su manupulacion
					$ArrayVistas = NeuralAsignacionVistas::SeleccionVista($Tipo);
					foreach ($ArrayVistas AS $Llave => $Valor)
					{
						if($Valor == 'NOMBREARCHIVO')
						{
							$File = __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Archivo.'.php';
							
							if(file_exists($File))
							{
								//Generamos el require para incluir la vista correspondiente
								require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Archivo.'.php';
							}
							else
							{
								require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/Error/NoExisteArchivo.php';
							}
						}
						else
						{
							//Generamos el require para incluir la vista correspondiente
							require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Valor;
						}
					}
				}
			}
			else
			{
				//Generamos las rutas de accesos
				$Carpeta = $Array['APLICACIONES']['DEFAULT']['CARPETA'];
				$Vistas = $Array['APLICACIONES']['DEFAULT']['VISTAS'];
				
				//Convertimos el array en una variable para su manupulacion
				$ArrayVistas = NeuralAsignacionVistas::SeleccionVista($Tipo);
				foreach ($ArrayVistas AS $Llave => $Valor)
				{
					if($Valor == 'NOMBREARCHIVO')
					{
						$File = __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Archivo.'.php';
						
						if(file_exists($File))
						{
							//Generamos el require para incluir la vista correspondiente
							require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Archivo.'.php';
						}
						else
						{
							require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/Error/NoExisteArchivo.php';
						}
					}
					else
					{
						//Generamos el require para incluir la vista correspondiente
						require __SysNeuralFileRootAplicacion__.'/'.$Carpeta.'/'.$Vistas.'/'.$Valor;
					}
				}
			}
		}
	}