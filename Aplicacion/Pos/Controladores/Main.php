<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
	
	class Main extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
        
		/**
         * Classe Constructora del Index 
         *
         * */
		public function Index() {
			 
            // Inicializa Session
            NeuralSesiones::Inicializacion();
            
            // Usuario sin session
            if(!isset($_SESSION['ENTRADA_POS'])){
                            
                // Redirecciona al Login
                header("Location: ".NeuralRutasApp::RutaURL('Index'));
            }
            else {
                
                // Username
                $Usuario = $this->Modelo->DatoUsuario(base64_decode($_SESSION['USUARIO']));
                $this->Vista->Usuario = $Usuario['0']['nombre'].' '.$Usuario['0']['apellidoPaterno'].' '.$Usuario['0']['apellidoMaterno'];
                
                $this->Vista->RutaImagen = NeuralRutasApp::RutaImagenes("ajax-loader.gif");
                $this->Vista->Url1   = NeuralRutasApp::RutaURL('DatosEmpresa/Index');
                
                // Redirecciona al sistema principal
                $this->Vista->GenerarVista('General/Contener', 'ESTRUCTURA');
                
                // Libera la consulta
                unset($Usuario);
            }
            
		}
 
	}