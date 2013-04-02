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
	
	abstract class NeuralRutasApp {
		
		protected static $APLICACION = 'Ejemplo/';
		protected static $PUBLICO = 'Neural/';
		protected static $IMAGENES = 'images/';
		protected static $CSS = 'css/';
		protected static $JS = 'js/';
		
		public static function RutaURL($Ruta) {
			
			return NeuralRutasBase::RutaBase(self::$APLICACION.$Ruta);
		}
		
		public static function RutaPublico($Ruta) {
			
			return NeuralRutasBase::RutaBase('Public/'.self::$PUBLICO.$Ruta);
		}
		
		public static function RutaImagenes($Ruta) {
			
			return NeuralRutasBase::RutaBase('Public/'.self::$PUBLICO.self::$IMAGENES.$Ruta);
		}
		
		public static function RutaCss($Ruta) {
			
			return NeuralRutasBase::RutaBase('Public/'.self::$PUBLICO.self::$CSS.$Ruta);
		}
		
		public static function RutaJs($Ruta) {
			
			return NeuralRutasBase::RutaBase('Public/'.self::$PUBLICO.self::$JS.$Ruta);
		}
	}
