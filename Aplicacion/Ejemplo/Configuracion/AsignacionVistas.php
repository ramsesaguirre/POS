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
	
	abstract class NeuralAsignacionVistas {
		
		/**
		 * SeleccionVista($Vista)
		 * 
		 * Se ingresan el orden de las vistas en un array no asociativo 
		 * Ejemplo: $Array[]=array('archivo.php', 'carpeta/archivo.php', 'NOMBREARCHIVO');
		 * el termino "NOMBREARCHIVO": es el nombre asignado para añadir el archivo creado para agregar la informacion
		 * Recordar: estos archivos se crearan dentro de la ruta de la siguiente ruta:
		 * Aplicacion/Nombre de la Aplicacion/vistas/
		 */
		public static function SeleccionVista($Vista = 0) {
			
			$Array[0] = array(
					'NOMBREARCHIVO'
			);
			
			/**********************NO EDITAR**************************/
			
			
			return SysMisNeural::ValidarAsignacionVista($Array, $Vista);
		}
	}