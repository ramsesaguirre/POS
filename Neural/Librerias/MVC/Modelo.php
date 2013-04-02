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
	
	class Modelo {
		
		function __Construct() {
			
		}
		
		/**
		 * TiempoMaximoEjecucion($Valor = 0)
		 * 
		 * Se aumenta el tiempo maximo del script
		 * por defecto su tiempo es de 30
		 * @param $Valor: Valor por defecto 0 (Infinito)
		 * 
		 * */
		public function TiempoMaximoEjecucion($Valor) {
			
			ini_set('max_execution_time', $Valor);
		}
	}