<?php
	class NeuralSysAutoload {
		
		/**
		 * ObtenerLibreria($Tipo, $RutaArchivo)
		 * 
		 * Carga las librerias dependiendo del tipo
		 * $Tipo: segun la ruta estas son
		 * LIBRERIA: aquellas librerias del framework dentro de la Carpeta Root Neural
		 * VENDORS: Aquellas librerias de creacion externos al framework
		 */
		public function ObtenerLibreria($Tipo, $RutaArchivo) {
			
			$this->TipoLibreria[]=$Tipo;
			$this->RutaArchivo[]=$RutaArchivo;
		}
		
		public function CargarLibrerias() {
			
			if(isset($this->TipoLibreria))
			{
				$Cantidad = count($this->TipoLibreria);
				
				for ($i=0; $i<$Cantidad; $i++)
				{
					if($this->TipoLibreria[$i]=='LIBRERIAS')
					{
						require __SysNeuralFileRootNeuralLibrerias__.$this->RutaArchivo[$i].'.php';
					}
					elseif($this->TipoLibreria[$i]=='VENDORS')
					{
						require __SysNeuralFileRootVendors__.$this->RutaArchivo[$i].'.php';
					}
				} 
			}
		} 
	}
		