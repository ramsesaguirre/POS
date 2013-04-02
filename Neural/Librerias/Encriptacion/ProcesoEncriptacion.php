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
	
	abstract class NeuralEncriptacion
	{
		/**
		 * NeuralEncriptacion::EncriptarDatos($Cadena)
		 * 
		 * Sistema de Encriptación de datos
		 * @param $Cadena: Cadena para Encriptacion
		 * 
		 **/
		public static function EncriptarDatos($Cadena, $Aplicacion = 'DEFAULT') {
			
			$Acceso = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionAcceso.yaml');
			
			if(array_key_exists($Aplicacion, $Acceso['APLICACIONES']))
			{
				$Clave = $Acceso['APLICACIONES'][$Aplicacion]['LLAVE_ENCRIPTACION'];
				$Cifrado = MCRYPT_RIJNDAEL_256;
				$Modo = MCRYPT_MODE_ECB;
				
				$Encript=mcrypt_encrypt($Cifrado, $Clave, $Cadena, $Modo, mcrypt_create_iv(mcrypt_get_iv_size($Cifrado, $Modo), MCRYPT_RAND));
				
				return base64_encode($Encript);
			}
			else
			{
				return '<strong>Sistema de Encriptación:</strong> No Existe Aplicación';
			}
		}
		
		/**
		 * NeuralEncriptacion::DesencriptarDatos($Cadena)
		 * 
		 * Sistema de Des-Encriptación de datos
		 * @param $Cadena: Cadena para Des-Encriptacion
		 * 
		 **/
		public static function DesencriptarDatos($Cadena, $Aplicacion = 'DEFAULT') {
			
			$Acceso = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionAcceso.yaml');
			
			if(array_key_exists($Aplicacion, $Acceso['APLICACIONES']))
			{
				$Desencriptar_Cadena = base64_decode($Cadena);
				$Clave = $Acceso['APLICACIONES'][$Aplicacion]['LLAVE_ENCRIPTACION'];
				$Cifrado = MCRYPT_RIJNDAEL_256;
				$Modo = MCRYPT_MODE_ECB;
				
				$Datos = mcrypt_decrypt($Cifrado, $Clave, $Desencriptar_Cadena, $Modo, mcrypt_create_iv(mcrypt_get_iv_size($Cifrado, $Modo), MCRYPT_RAND));
				
				return trim($Datos);
			}
			else
			{
				return '<strong>Sistema de Encriptación:</strong> No Existe Aplicación';
			}
		}
	}