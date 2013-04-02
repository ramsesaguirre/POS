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
	
	class NeuralScriptAdministrador {
		
		/**
		 * NeuralScriptAdmin::OrganizarScript($Persistencia = false, $Script = false, $Aplicacion = 'DEFAULT')
		 * 
		 * Regla: Organiza e implementa los diferentes archivos publicos y organiza script js
		 * @param $Persistencia: array asociativo con los archivos que deben ser persistentes
		 * @example array('JS' => array('JQUERY', 'VALIDATE'))
		 * @param $Script: array asociativo creado por los diferentes constructores NeuralJQuery....
		 * @param $Aplicacion: Aplicacion configurada en Aplicacion/Configuracion/ConfiguracionScripts.yaml
		 * 
		 * */
		public static function OrganizarScript($Persistencia = false, $Script = false, $Aplicacion = 'DEFAULT') {
			
			$Librerias = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionScripts.yaml');
			$AplicacionValidada = (array_key_exists($Aplicacion, $Librerias)) ? $Aplicacion : 'DEFAULT';
			
			if(is_array($Persistencia))
			{
				$Constructor[] = self::ConstructorPersistente($Persistencia, $Librerias[$AplicacionValidada]);
			}
			
			if(is_array($Script))
			{
				$Constructor[] = self::ConstructorScript($Script, $Librerias[$AplicacionValidada], $Persistencia);
			}
			
			unset($Librerias, $AplicacionValidada);
			
			if(is_array($Persistencia) == true OR is_array($Script) == true)
			{
				return implode("\n", $Constructor);
			}
		}
		
		private function ConstructorScript($Script, $Aplicacion, $Persistencia = false) {
			
			if(is_array($Persistencia))
			{
				$ScriptOrganizado = self::OrganizarDatosScript($Script);
				$ArrayPersistencia = self::OrganizarArray($Persistencia);
				
				foreach ($ScriptOrganizado AS $Llave => $Valor)
				{
					if($Llave == 'JS')
					{
						if(array_key_exists($Llave, $ArrayPersistencia))
						{
							foreach ($Valor AS $LlaveJS => $ValorJS)
							{
								if(!array_key_exists($ValorJS, $ArrayPersistencia['JS']))
								{
									$Datos[] = '<script type="text/javascript" src="'.NeuralRutasBase::RutaBase($Aplicacion['JS'][$ValorJS]).'"></script>';
								}
							}
						}
						else
						{
							foreach ($Valor AS $LlaveJS => $ValorJS)
							{
								$Datos[] = '<script type="text/javascript" src="'.NeuralRutasBase::RutaBase($Aplicacion['JS'][$ValorJS]).'"></script>';
							}
						}
					}
					elseif($Llave == 'CSS')
					{
						if(array_key_exists($Llave, $ArrayPersistencia))
						{
							foreach ($Valor AS $LlaveCSS => $ValorCSS)
							{
								if(!array_key_exists($ValorCSS, $ArrayPersistencia['CSS']))
								{
									$Datos[] = '<link href="'.NeuralRutasBase::RutaBase($Aplicacion['CSS'][$ValorCSS]).'" rel="stylesheet">';
								}
							}
						}
						else
						{
							foreach ($Valor AS $LlaveCSS => $ValorCSS)
							{
								$Datos[] = '<link href="'.NeuralRutasBase::RutaBase($Aplicacion['CSS'][$ValorCSS]).'" rel="stylesheet">';
							}
						}
					}
				}
				
				$Datos[] = implode("\n", $ScriptOrganizado['SCRIPT']);
				
				unset($Script, $ScriptOrganizado);
				
				return implode("\n", $Datos);
			}
			else
			{
				$ScriptOrganizado = self::OrganizarDatosScript($Script);
				
				foreach ($ScriptOrganizado AS $Llave => $Valor)
				{
					if($Llave == 'JS')
					{
						foreach ($Valor AS $LlaveJS => $ValorJS)
						{
							$Datos[] = '<script type="text/javascript" src="'.NeuralRutasBase::RutaBase($Aplicacion['JS'][$ValorJS]).'"></script>';
						}
					}
					elseif($Llave == 'CSS')
					{
						foreach ($Valor AS $LlaveCSS => $ValorCSS)
						{
							$Datos[] = '<link href="'.NeuralRutasBase::RutaBase($Aplicacion['CSS'][$ValorCSS]).'" rel="stylesheet">';
						}
					}
				}
				
				$Datos[] = implode("\n", $ScriptOrganizado['SCRIPT']);
				
				unset($Script, $ScriptOrganizado);
				
				return implode("\n", $Datos);
			}
		}
		
		
		private function OrganizarArray($Array) {
			
			if(is_array($Array))
			{
				foreach($Array AS $Llave => $Valor)
				{
					if($Llave == 'JS')
					{
						foreach($Valor AS $LlaveJS => $ValorJS)
						{
							$Datos['JS'][$ValorJS] = $ValorJS;
						}
					}
					elseif($Llave == 'CSS')
					{
						foreach($Valor AS $LlaveCSS => $ValorCSS)
						{
							$Datos['CSS'][$ValorCSS] = $ValorCSS;
						}
					}
					else
					{
						foreach($Valor AS $LlaveNV => $ValorNV)
						{
							$Datos['NO_VALIDO'][$ValorNV] = 'OPCIONES NO VALIDAS';
						}
					}
				}
				
				unset($Array);
				
				return $Datos;
			}
			else
			{
				unset($Array);
				
				return array();
			}
		}

		private function OrganizarDatosScript($Script) {
			
			$Cantidad = count($Script);
			for ($i=0; $i<$Cantidad; $i++)
			{
				foreach($Script[$i] AS $Llave => $Valor)
				{
					if($Llave == 'JS')
					{
						foreach($Valor AS $LlaveJS => $ValorJS)
						{
							$Datos['JS'][$LlaveJS] = $ValorJS;
						}
					}
					elseif($Llave == 'CSS')
					{
						foreach($Valor AS $LlaveCSS => $ValorCSS)
						{
							$Datos['CSS'][$LlaveCSS] = $ValorCSS;
						}
					}
					elseif($Llave == 'SCRIPT')
					{
						$Datos['SCRIPT'][] = $Valor;
					}
				}
			}
			
			unset($Cantidad, $Llave, $Valor);
			
			return $Datos;
		}
		
		private function ConstructorPersistente($Persistencia, $Librerias) {
			
			foreach ($Persistencia AS $Llave => $Valor)
			{
				if($Llave == 'JS')
				{
					foreach ($Valor AS $LlaveJS => $ValorJS)
					{
						if(array_key_exists($ValorJS, $Librerias['JS']))
						{
							$Datos[] = '<script type="text/javascript" src="'.NeuralRutasBase::RutaBase($Librerias['JS'][$ValorJS]).'"></script>';
						}
						else
						{
							$Datos[] = '<!-- Libreria JS '.$ValorJS.' No existe en la Configuracion de Scripts -->';
						}
					}
				}
				elseif($Llave == 'CSS')
				{
					foreach ($Valor AS $LlaveCSS => $ValorCSS)
					{
						if(array_key_exists($ValorCSS, $Librerias['CSS']))
						{
							$Datos[] = '<link href="'.NeuralRutasBase::RutaBase($Librerias['CSS'][$ValorCSS]).'" rel="stylesheet">';
						}
						else
						{
							$Datos[] = '<!-- Libreria CSS '.$ValorCSS.' No existe en la Configuracion de Scripts -->';
						}
					}
				}
			}
			
			unset($Persistencia, $Librerias);
			
			return implode("\n", $Datos);
		}
		
	}