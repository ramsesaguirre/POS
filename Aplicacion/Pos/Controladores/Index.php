<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
	
	class Index extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
        
		/**
         * Classe Constructora del Index 
         *
         * */
		public function Index() {
			
            /*]$archivos = get_included_files();
            foreach ($archivos as $file){
                echo $file,"\n";
            }
            function conver($size){
                $unidad = array('b', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb'); 
                return @round($size/pow(1024, ($i=floor(log($size, 1024)))),2). ' '.$unidad[$i];
            }*/
            
            // Inicializa la session
            NeuralSesiones::Inicializacion();
            
            // Usuario sin session
            if(!isset($_SESSION['ENTRADA_POS'])){
                            
                // Genera la Vista HTML
                $this->Vista->GenerarVista('login');
            }
            else {
                
                // Redirecciona al sistema principal
                header("Location: ".NeuralRutasApp::RutaURL('Main/Index'));
            }
            
            //echo conver(memory_get_usage(true));
            
		}
 
	}