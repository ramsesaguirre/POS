<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
	
	class Login extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
        
		/**
         * Funcion     : Login()
         * Descripcion : Verifica el acceso de los usuario al sistema atraves de la base de datos. 
         * Metodo      : POST
         * Parametros  : usuario, password
         * 
         * */
        public function Login(){
            
            // Inicializa Session
            NeuralSesiones::Inicializacion();
            
            // Datos del formulario
            $Usuario  = $_POST['usuario'];
            $Password = MD5($_POST['password']);
            
            // Consulta el usuario en la bd
            $Datos = $this->Modelo->ConsultarUsuario($Usuario, $Password);
                        
            // Si existe usuario
            if ($Datos > 0){
                
                // Inicia session de trabajo
                NeuralSesiones::AgregarLlave('LOGGEDIN', true);
                NeuralSesiones::AgregarLlave('USUARIO', base64_encode($Usuario));
                NeuralSesiones::AgregarLlave('ENTRADA_POS', 1);
                
                // Redirecciona al Login
                header("Location: ".NeuralRutasApp::RutaURL('Main/Index'));
            }
            else {
                // Redirecciona al Login
                header("Location: ".NeuralRutasApp::RutaURL('Index'));
            }
            
            // Libera memoria
            unset($Datos);
        } 
        
        /**
         * Funcion     : Logout(integer)
         * Descripcion : Termino de la session de trabajo
         * Metodo      : GET 
         * Parametros  : logout
         * 
         * */
        public function Logout($Logout){
            
            // Inicializa Session
            NeuralSesiones::Inicializacion();
            
            // Termina la session de trabajo
            if(isset($_SESSION['ENTRADA_POS'])){
                
                NeuralSesiones::EliminarValor('LOGGEDIN');
                NeuralSesiones::EliminarValor('USUARIO');
                NeuralSesiones::EliminarValor('ENTRADA_POS');
                NeuralSesiones::Finalizacion();
                
            }
            
            // Redirecciona al la pagina de inicio
            header("Location: ".NeuralRutasApp::RutaURL('Index'));
            
        }
	}