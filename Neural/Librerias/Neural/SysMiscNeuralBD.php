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
	
	abstract class SysMiscNeuralBD {
		
		public static function OrganizarCondiciones($Array) {
			
			foreach ($Array AS $Llave => $Valor)
			{
				$Datos[] = $Valor."='{Datos_$Llave}'";
			}
			
			return implode(' AND ', $Datos);
		}
		
		public static function CambiarDatos($SQL, $Key, $ArrayNombres, $Array) {
			
			for ($i=0; $i<count($Array[$Key][$ArrayNombres]); $i++)
			{
				$Datos[] = str_replace("{Datos_$Key}", $Array[$Key][$ArrayNombres][$i], $SQL);
			}
			
			return $Datos;
		}
	}