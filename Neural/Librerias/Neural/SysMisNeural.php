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
	
	abstract class SysMisNeural {
		
		/**
		 * SysMisNeural::LeerURLModReWrite();
		 * 
		 * Metodo para regresar un array con los datos de URL generados por el Mod_ReWrite
		 **/
		public static function LeerURLModReWrite() {
			
			//Tomamos la variable del Mod_Rewrite y validamos el url para determinar el path correspondiente
			$Url = isset($_GET['url']) ? $_GET['url'] : null;
			$Url = rtrim($Url, '/');
			$Url = explode('/', $Url);
			
			return $Url;
		}
		
		/**
		 * SysMisNeural::CargarArchivoYAMLAplicacion($Ruta);
		 * 
		 * Metodo para cargar los archivos YAML que se encuentran dentro de la carpeta Aplicacion
		 * @param $Ruta: se utilliza la el nombre de la caperta / archivo
		 * Ejemplo: SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/Archivo.yaml');
		 * 
		 **/
		public static function CargarArchivoYAMLAplicacion($Ruta) {
			
			//Validacion de Activacion de Cache
			if(__SysNeuralCoreCache__ == 'HABILITADO')
			{
				$RutaArray = explode('/', $Ruta);
				$AplicacionArray = explode('.', $RutaArray[1]);
				$Llave = md5($AplicacionArray[0]);
				
				$Cache = new NeuralCacheSimple('NeuralNFZyosSetUp', $Llave);
				$Cache->DefinirTiempoExpiracion(__SysNeuralCoreCacheExpiracion__);
				
				if($Cache->ExistenciaCache(base64_encode($Llave)))
				{
					return $Cache->ObtenerCache(base64_encode($Llave));
				}
				else
				{
					//Leemos el archivo de configuracion de accesos y lo convertimos en un array
					$YML = new Spyc;
					$Array = $YML->YAMLLoad(__SysNeuralFileRootAplicacion__.$Ruta);
					$Cache->GuardarCache($Llave,$Array);
					
					return $Array;
				}
			}
			else
			{
				//Leemos el archivo de configuracion de accesos y lo convertimos en un array
				$YML = new Spyc;
				$Array = $YML->YAMLLoad(__SysNeuralFileRootAplicacion__.$Ruta);
				
				return $Array;
			}
		}
		
		/**
		 * SysMisNeural::IncluirArchivosVista($Array, $Aplicacion, $Carpeta);
		 * 
		 * Metodo para cargar e imprimir en pantalla los archivos html
		 * @param $Array: array donde se encuentra el acceso a los archivos
		 * @param $Aplicacion: Nombre de la Aplicacion Cargada
		 * @param $Carpeta: donde se Encuentran las Vistas
		 * @param $Archivo: Archivo a Cargar en la Vista
		 **/
		public static function IncluirArchivosVista($Array, $Aplicacion, $Carpeta, $Archivo) {
			
			foreach ($Array AS $Llave => $Valor)
			{
				if($Valor == 'NOMBREARCHIVO')
				{
					$File = __SysNeuralFileRootAplicacion__.'/'.$Aplicacion.'/'.$Carpeta.'/'.$Archivo.'.php';
					
					if(file_exists($File))
					{
						//Generamos el require para incluir la vista correspondiente
						require __SysNeuralFileRootAplicacion__.'/'.$Aplicacion.'/'.$Carpeta.'/'.$Archivo.'.php';
					}
					else
					{
						require __SysNeuralFileRootAplicacion__.'/'.$Aplicacion.'/'.$Carpeta.'/Error/NoExisteArchivo.php';
					}
				}
				else
				{
					//Generamos el require para incluir la vista correspondiente
					require __SysNeuralFileRootAplicacion__.'/'.$Aplicacion.'/'.$Carpeta.'/'.$Valor;
				}
			}
		}
		
		/**
		 * SysMisNeural::GenerarNombreModeloRuta($Carpeta, $Modelos, $Nombre);
		 * 
		 * Metodo que genera un array construyendo la ruta del modelo y el nombre del archivo
		 * @param $Carpeta: Nombre de la aplicacion carpeta de la aplicacion correspondiente
		 * @param $Modelos: Nombre de la Carpeta asignada a los modelos
		 * @param $Nombre: Nombre del controlador para darle el nombre al modelo correspondiente
		 **/
		public static function GenerarNombreModeloRuta($Carpeta, $Modelos, $Nombre) {
			
			//Generamos el nombre del Modelo a Cargar
			$NombreModelo = $Nombre.'_Modelo';
			
			//Generamos la ruta del archivo correspondiente
			$Archivo = __SysNeuralFileRootAplicacion__.$Carpeta.$Modelos.$NombreModelo.'.php';
			
			return array(
					'Nombre' => $NombreModelo, 
					'Archivo' => $Archivo
				);
		}
		
		/**
		 * SysMisNeural::IncluirAyudasConfiguracionesAplicacion($Aplicacion, $Config, $Ayudas);
		 * 
		 * Metodo que ayuda a cargar los archivos de configuracion y de ayudas de la aplicacion
		 * @param $Aplicacion: Nombre de la Carpeta de la Aplicacion
		 * @param $Config: Nombre de la Carpeta de las Configuraciones
		 * @param $Ayudas: Nombre de la Carpeta de las Ayudas
		 **/
		public static function IncluirAyudasConfiguracionesAplicacion($Aplicacion, $Config, $Ayudas) {
			
			//Configuramos las rutas de acceso
			$Directorio_Conf = __SysNeuralFileRootAplicacion__.$Aplicacion.$Config;
			$Directorio_Ayudas = __SysNeuralFileRootAplicacion__.$Aplicacion.$Ayudas;
			
			//Validamos si es un directorio
			if(is_dir($Directorio_Conf))
			{
				if ($DirConfig = opendir($Directorio_Conf))
				{
					//Listamos los archivos
		        	while (($ListFile = readdir($DirConfig)) !== false)
		        	{
		        		//Omitimos los punteros de carpeta oculta y regreso a carpeta anterior como a la carga de configuraciones
		        		if($ListFile <> '.' AND $ListFile <> '..' AND $ListFile <> '.htaccess')
						{
							//Incluimos los archivos correspondientes
							require $Directorio_Conf.$ListFile;
						}
		        	}
		        	closedir($DirConfig);
				}
			}
			
			if(is_dir($Directorio_Ayudas))
			{
				if ($DirAyudas = opendir($Directorio_Ayudas))
				{
					//Listamos los archivos
		        	while (($ListFileAyudas = readdir($DirAyudas)) !== false)
		        	{
		        		//Omitimos los punteros de carpeta oculta y regreso a carpeta anterior como a la carga de configuraciones
		        		if($ListFileAyudas <> '.' AND $ListFileAyudas <> '..' AND $ListFileAyudas <> '.htaccess')
						{
							//Incluimos los archivos correspondientes
							require $Directorio_Ayudas.$ListFileAyudas;
						}
		        	}
		        	closedir($DirAyudas);
				}
			}
		}
		
		/**
		 * SysMisNeural
		**/
		public static function GenerarRutasArchivoAplicacion($Aplicacion, $Carpeta, $Archivo) {
			
			return __SysNeuralFileRootAplicacion__.$Aplicacion.$Carpeta.$Archivo;
		}
		
		/**
		 * SysMisNeural::ValidarAsignacionVista($Vistas, $Opcion);
		 * 
		 * valida si es un dato vacio y regresa el array correspondiente
		**/
		public static function ValidarAsignacionVista($Vistas, $Opcion) {
			
			$Dato = mb_strtoupper(trim($Opcion));
			
			if(!empty($Dato)) {
				if(array_key_exists($Dato, $Vistas)) {
					return $Vistas[$Dato];
				}
				else {
					return $Info[0] = array('NOMBREARCHIVO');
				}
			}
			else {
				return $Info[0] = array('NOMBREARCHIVO');
			}
		}
		
		/**
		 * SysMisNeural::ListarOrganizarMetodosClase($Clase);
		 * 
		 * Lista y organiza llave valor un array con los metodos publicos de la clase
		**/
		public static function ListarOrganizarMetodosClase($Clase) {
			
			$Array = get_class_methods($Clase);
			
			foreach ($Array AS $Llave => $Valor) {
				
				$Datos[$Valor] = $Valor;
			}
			
			return $Datos;
		}
		
		/**
		 * SysMisNeural
		**/
	}