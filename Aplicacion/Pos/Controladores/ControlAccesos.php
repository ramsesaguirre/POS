<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
	
	class ControlAccesos extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
        
		/**
         * Classe Constructora del Index 
         *
         * */
		public function Index() {
		                  
            // Genera la Vista HTML
            $this->Vista->GenerarVista('Configuracion/controlaccesos');
		}
        
        /**
         * Funcion     : Mostrar()
         * Descripcion : Muestra los registros en la base de datos
         * Metodo      : POST
         * Parametros  : page, rows, sidx, sord
         *
         * */
        public function Mostrar(){
            
            // Obtencion de Datos
            $page  = $_POST['page'];
            $limit = $_POST['rows'];
            $sidx  = $_POST['sidx'];
            $sord  = $_POST['sord'];
            
            if(!$sidx) $sidx =1;

            // Total de registros en la base de datos
            $TotalRegistros = $this->Modelo->TotalRegistros();
            $count = $TotalRegistros['Cantidad'];
            
            // Libera recursos de la consulta
            unset($TotalRegistros);
            
            // Determina el numero de paginas por registros
            if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
            } else {
                $total_pages = 0;
            }
            if ($page > $total_pages) $page=$total_pages;
            $start = $limit*$page - $limit;
            if($start <0) $start = 0;
           
            // Consulta los registros en la base de datos
            $consulta = $this->Modelo->MostrarUsuarios($sidx, $sord, $start , $limit);
            
            /*
            // Cabeceras
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
            header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT");*/ 
            header("Cache-Control: no-cache, must-revalidate"); 
            header("Pragma: no-cache");
            header("Content-type: application/json");
                        
            // Construye la cadena JSON
            $responce = new stdClass();
            $responce->page    = $page;
            $responce->total   = $total_pages;
            $responce->records = $count;
            
            // Introduce los datos a la cadena JSON
            for ($i=0; $i<count($consulta); $i++){
                $responce->rows[$i]['id']   = $consulta[$i]['idUsuario'];
                $responce->rows[$i]['cell'] = array($i+1, $consulta[$i]['nombre'], $consulta[$i]['apellidoPaterno'], $consulta[$i]['apellidoMaterno'], $consulta[$i]['username'], $consulta[$i]['password'], $consulta[$i]['email'], $consulta[$i]['idTipoUsuario']);
            }
            
            // Libera recursos de la consulta
            unset($consulta);
            
            // Envia Cadena JSON
            echo json_encode($responce);
            
        }
        
        /**
         * Funcion     : Operaciones()
         * Descripcion : Acciones sobre la tabla agregar, editar o eliminar
         * Metodo      : POST
         * Parametros  : oper
         *
         * */
        public function Operaciones(){
            
            switch ($_POST['oper']) {
                // --- Agregar Nuevo Registro  ---
                case "add":
                  
                    //  Agrega el registro a la base de datos
                    $this->Modelo->Agregar(strtoupper($_POST['nombre']), strtoupper($_POST['apellidoPaterno']), strtoupper($_POST['apellidoMaterno']), $_POST['username'], md5($_POST['passwd']), $_POST['email'], $_POST['nivel']);                  
                
                    break;
                // --- Editar Registro  ---
                case "edit":
                                    
                    // Edita el registro
                    $this->Modelo->Editar($_POST['id'], strtoupper($_POST['nombre']), strtoupper($_POST['apellidoPaterno']), strtoupper($_POST['apellidoMaterno']), $_POST['username'], md5($_POST['passwd']), $_POST['email'], $_POST['nivel']);
                    
                    break;
                // --- Eliminar Registro  ---
                case "del":
                                       
                    // Elimina el registro
                    $this->Modelo->Eliminar($_POST['id']);
                    
                    break;
            }
            
        }
        
 
	}