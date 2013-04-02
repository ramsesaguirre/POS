<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
	
	class DatosEmpresa extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
        
		/**
         * Classe Constructora del Index 
         *
         * */
		public function Index() {
                        
          // Genera la Vista HTML
          $this->Vista->GenerarVista('Configuracion/datosempresa');
            
		}
 
	}