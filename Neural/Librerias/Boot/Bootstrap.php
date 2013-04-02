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
	
	class Bootstrap {
		
		//construimos el Nucleo base
		public function __Construct() {
			
			//Tomamos la variable del Mod_Rewrite y validamos el url para determinar el path correspondiente
			$Url = SysMisNeural::LeerURLModReWrite();
			
			//Leemos el archivo de configuracion de accesos y lo convertimos en un array
			$Array = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionAcceso.yaml');
			
			//Validamos si hay una aplicacion seleccionada
			if(!empty($Url[0]))
			{
				//Validamos si la aplicacion existe
				if(array_key_exists(mb_strtoupper($Url[0]), $Array['APLICACIONES']))
				{
					//Generamos las rutas de accesos
					$Carpeta = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['CARPETA'];
					$Configuraciones = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['CONFIGURACION'];
					$Ayudas = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['AYUDAS'];
					$Controladores = $Array['APLICACIONES'][mb_strtoupper($Url[0])]['CONTROLADORES'];
					
					//Validamos que exista la carpeta correspondiente
					if(is_dir(__SysNeuralFileRootAplicacion__.$Carpeta))
					{
						//Cargamos las Configuraciones de las ayudas y configuraciones aplicacion
						SysMisNeural::IncluirAyudasConfiguracionesAplicacion($Carpeta, $Configuraciones, $Ayudas);
						
						//Validamos si se ha ingresado un Controlador
						if(isset($Url[1]) == true AND empty($Url[1]) != true)
						{
							//Generamos la ruta del Controlador
							$Archivo = SysMisNeural::GenerarRutasArchivoAplicacion($Carpeta, $Controladores, $Url[1].'.php');
							
							//Validamos si existe el controlador correspondiente
							if(file_exists($Archivo))
							{
								//Incluimos el archivo controlador correspondiente
								require $Archivo;
								
								//Validamos si tenemos un metodo
								if(isset($Url[2]) == true AND empty($Url[2]) != true)
								{
									//Validamos si Existe el Metodo correspondiente
									if(method_exists($Url[1], $Url[2]))
									{
										//Validamos que el metodo exista y sea publico
										if(array_key_exists($Url[2], SysMisNeural::ListarOrganizarMetodosClase($Url[1])))
										{
											//Validamos que se haya enviado un parametro
											if(isset($Url[3]) == true AND empty($Url[3]) != true)
											{
												//Cargamos el Controlador correspondiente
												$Controlador = new $Url[1];
												$Controlador->CargarModelo($Url[1]);
												
												$Cantidad = count($Url)-1;
												
												for ($i=3; $i<=$Cantidad; $i++)
												{
													$Datos[] = '$Url['.$i.']';
												}
												
												$Lista = implode(', ', $Datos);
												
												eval("\$Controlador->\$Url[2](".$Lista.");");
												
												unset($Cantidad, $Datos, $Lista);
											}
											else
											{
												//Cargamos el Controlador correspondiente
												$Controlador = new $Url[1];
												$Controlador->CargarModelo($Url[1]);
												$Controlador->$Url[2](false);
											}
										}
										else
										{
											//Indicamos el error de no encontrarse el Metodo correspondiente
											require __SysNeuralFileRootNeuralMensajesError__.'NoMetodo.php';
										}
									}
									else
									{
										//Generamos el require para incluir el controlador correspondiente
										require SysMisNeural::GenerarRutasArchivoAplicacion($Carpeta, $Controladores, 'Error.php');
										
										//No existe el metodo generamos el error correspondiente
										$Controlador = new Error;
										$Controlador->CargarModelo('Error');
										$Controlador->Index(false);
									}
									
								}
								else
								{
									//Instanciamos y procesamos los procedimientos correspondientes
									$Controlador = new $Url[1];
									$Controlador->CargarModelo('Index');
									$Controlador->Index(false);
								}
							}
							else
							{
								//Indicamos el error de no encontrarse el controlador
								require __SysNeuralFileRootNeuralMensajesError__.'NoControlador.php';
							}
						}
						else
						{
							//Generamos el nombre del controlador correspondiente
							$Archivo = SysMisNeural::GenerarRutasArchivoAplicacion($Carpeta, $Controladores, 'Index.php');
							
							//Validamos si existe el controlador correspondiente
							if(file_exists($Archivo))
							{
								//Incluimos el controlador correspondiente
								require $Archivo;
								
								//Instanciamos y procesamos los procedimientos correspondientes
								$Controlador = new Index;
								$Controlador->CargarModelo('Index');
								$Controlador->Index(false);
							}
							else
							{
								//Indicamos el error de no existencia de controlador Index
								require __SysNeuralFileRootNeuralMensajesError__.'NoIndex.php';
							}
						}
					}
					else
					{
						//Generamos un Mensaje de Error de problema de la aplicacion configurada
						require __SysNeuralFileRootNeuralMensajesError__.'AplicacionNoConfigurada.php';
					}
				}
				else
				{
					//Generamos error 404
					require __SysNeuralFileRootNeuralMensajesError__.'404.php';
				}
			}
			else
			{
				//Generamos las rutas de accesos
				$Carpeta = $Array['APLICACIONES']['DEFAULT']['CARPETA'];
				$Configuraciones = $Array['APLICACIONES']['DEFAULT']['CONFIGURACION'];
				$Ayudas = $Array['APLICACIONES']['DEFAULT']['AYUDAS'];
				$Controladores = $Array['APLICACIONES']['DEFAULT']['CONTROLADORES'];
				
				//Validamos que la aplicacion se encuentre configurada y exista la carpeta de la aplicacion
				if(is_dir(__SysNeuralFileRootAplicacion__.$Carpeta))
				{
					//Cargamos las Configuraciones de las ayudas y configuraciones aplicacion
					SysMisNeural::IncluirAyudasConfiguracionesAplicacion($Carpeta, $Configuraciones, $Ayudas);
					
					//Generamos el require para incluir el controlador correspondiente
					require SysMisNeural::GenerarRutasArchivoAplicacion($Carpeta, $Controladores, 'Index.php');
					
					//Instanciamos y procesamos los procedimientos correspondientes
					$Controlador = new Index;
					$Controlador->CargarModelo('Index');
					$Controlador->Index(false);
				}
				else
				{
					require __SysNeuralFileRootNeuralMensajesError__.'AplicacionNoConfigurada.php';
				}
			}
		}
	}