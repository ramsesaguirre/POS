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
	
	class NeuralCacheSimple {
		
		/**
		 * private $DireccionCache
		 * Direccion generada por Defecto donde se Encuentra la Cache
		 * */
		private $DireccionCache = __SysNeuralFileRootCache__;
		
		/**
		 * private $TiempoExpiracionInterna
		 * Tiempo de vencimiento de la cache, por defecto se encuentra valor 60 segundos
		 * Valor 30*24*60*60 = 2592000: 30 Dias
		 * */
		private $TiempoExpiracionInterna = 60;
		
		/**
		 * __Construct($Aplicacion = false, $Carpeta = false)
		 * 
		 * Constructor de Direccion
		 * */
		function __Construct($Aplicacion = false, $Carpeta = false) {
			
			if($Aplicacion == true) {
				$AplicacionCache = $Aplicacion.'/';
			}
			else {
				$URL = SysMisNeural::LeerURLModReWrite();
				$this->AplicacionCache = $AplicacionCache = ($URL[0]!=='') ? $URL[0].'/' : 'Default/';
			}
			
			if($Carpeta == true) {
				$this->CacheCarpeta = $Carpeta.'/';
			}
			
			$this->PathCache = $this->DireccionCache.$AplicacionCache;
			
			if(isset($this->CacheCarpeta)){
				$this->RutaFinalArchivo = $this->PathCache.$this->CacheCarpeta;
			}
			else{
				$this->RutaFinalArchivo = $this->PathCache;
			}
		}
		
		private function ConstructorDirectorio() {
			
			if(isset($this->PathCache))
			{
				mkdir($this->PathCache);
				
				if(isset($this->CacheCarpeta))
				{
					mkdir($this->PathCache.$this->CacheCarpeta);
				}
			}
		}
		
		/**
		 * DefinirTiempoExpiracion($TiempoEnSegundos)
		 * 
		 * Redefine el tiempo de expiracion de la cache correspondiente
		 * @param $TiempoEnSegundos: Tiempo dado en segundos de expiracion de la cache
		 * */
		public function DefinirTiempoExpiracion($TiempoEnSegundos) {  $this->TiempoExpiracionInterna = $TiempoEnSegundos; }
		
		/**
		 * ExistenciaCache($LlaveUnica)
		 * 
		 * Determina si existe la cache correspondiente devuelve valor booleano
		 * @param $LlaveUnica: Valor que se le asignara a la cache como identificador interno.
		 * 
		 * */
		public function ExistenciaCache($LlaveUnica) {
			
			$LlaveUnica = md5($LlaveUnica);
			$NombreArchivoCacheContenedor = $this->RutaFinalArchivo.$LlaveUnica.'.cache';
			$NombreArchivoCacheInformacion = $this->RutaFinalArchivo.$LlaveUnica.'.info';
			
			if(file_exists($NombreArchivoCacheContenedor) && file_exists($NombreArchivoCacheInformacion))
			{
				$TiempoCache = file_get_contents($NombreArchivoCacheInformacion) + (int)$this->TiempoExpiracionInterna;
				$TiempoActual = time(); 
				$TiempoExpiracion = (int)$TiempoActual;
	 
				if((int)$TiempoCache >= (int)$TiempoExpiracion)
				{
					return true;
				}
			}
			
			return false;
		}
		
		/**
		 * ObtenerCache($LlaveUnica)
		 * 
		 * Obtiene los datos almacenados en la cache segun su identificador
		 * @param $LlaveUnica: Valor que se le asignara a la cache como identificador interno.
		 * 
		 * */
		public function ObtenerCache($LlaveUnica) {
			
			$LlaveUnica = md5($LlaveUnica);
			$NombreArchivoCacheContenedor = $this->RutaFinalArchivo.$LlaveUnica.'.cache';
			$NombreArchivoCacheInformacion = $this->RutaFinalArchivo.$LlaveUnica.'.info';
			
			if (file_exists($NombreArchivoCacheContenedor) && file_exists($NombreArchivoCacheInformacion))
			{
				$TiempoCache = file_get_contents($NombreArchivoCacheInformacion) + (int)$this->TiempoExpiracionInterna;
				$TiempoActual = time(); 
				$TiempoExpiracion = (int)$TiempoActual;
	 
				if ((int)$TiempoCache >= (int)$TiempoExpiracion)
				{
					return json_decode(file_get_contents($NombreArchivoCacheContenedor), true);
				}
			}
	 
			return null;
		}
		
		/**
		 * GuardarCache($LlaveUnica, $Contenido)
		 * 
		 * General el procedimiento de crear los archivos necesarios de cache
		 * @param $LlaveUnica: Valor que se le asignara a la cache como identificador interno.
		 * @param $Contenido: informacion que se guardara en la cache.
		 * 
		 * */
		public function GuardarCache($LlaveUnica, $Contenido) {
			
			$LlaveUnica = md5($LlaveUnica);
			$NombreArchivoCacheContenedor = $this->RutaFinalArchivo.$LlaveUnica.'.cache';
			$NombreArchivoCacheInformacion = $this->RutaFinalArchivo.$LlaveUnica.'.info';
			$TiempoActual = time();
			
			if(!file_exists($this->PathCache))
			{
				self::ConstructorDirectorio();
			}
			
			file_put_contents ($NombreArchivoCacheContenedor ,  json_encode($Contenido)); 
			file_put_contents ($NombreArchivoCacheInformacion , $TiempoActual);
		}
	}