<?php
	
	class NeuralSesiones {
		
		/**
		 * NeuralSesiones::Inicializacion();
		 * 
		 * Genera la inicializacion de las opciones de Session
		 * 
		 * */
		public static function Inicializacion() {
			
			session_start();
		}
		
		/**
		 * NeuralSesiones::AgregarArray($Array);
		 * 
		 * Agrega información como array asociativo o incremental
		 * @param $Array: Array asociativo 
		 * @example array('Llave' => 'Valor')
		 * 
		 * */
		public function AgregarArray($Array) {
			
			if(isset($_SESSION)) {
				
				$_SESSION = array_merge($_SESSION, $Array);
			}
			else {
				
				$_SESSION = array_merge($_SESSION, $Array);
			}
		}
		
		/**
		 * NeuralSesiones::AgregarLlave($Llave, $Valor);
		 * 
		 * Agrega informacion como Llave => Valor
		 * @param $Llave: apuntador de array
		 * @param $Valor: Valor del apuntador correspondiente
		 * 
		 * */
		public function AgregarLlave($Llave, $Valor) {
			
			if(isset($_SESSION)) {
				
				if(array_key_exists($Llave, $_SESSION)) {
					
					unset($_SESSION[$Llave]);
					
					$_SESSION[$Llave] = $Valor;
				}
				else {
					$_SESSION[$Llave] = $Valor;
				}
			}
			else {
				
				$_SESSION[$Llave] = $Valor;
			}
		}
		
		/**
		 * NeuralSesiones::EliminarValor($Llave);
		 * 
		 * Elimina el valor de primer nivel de datos
		 * @param $Llave: apuntador del valor a eliminar
		 * 
		 * */
		public function EliminarValor($Llave) {
			
			if(isset($_SESSION)) {
				
				if(array_key_exists($Llave, $_SESSION)) {
					
					unset($_SESSION[$Llave]);
				}
			}
		}
		
		/**
		 * NeuralSesiones::Finalizacion();
		 * 
		 * Elimina y destruye la sesion correspondiente
		 * 
		 * */
		public function Finalizacion() {
			
			session_destroy();
			
			unset($_SESSION);
		}
	}