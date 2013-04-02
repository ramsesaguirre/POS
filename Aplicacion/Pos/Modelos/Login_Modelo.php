<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
    class Login_Modelo extends Modelo {
        
        function __Construct(){
            parent::__Construct();
        }
        
        /**
         * Funcion     : ConsultarUsuario(string, string)
         * Descripcion : Determina si el usuario se encuentra registrado en la bd.
         * Tipo        : Publico
         * Parametros  : usuario, password
         *
         * */
        public function ConsultarUsuario($Usuario, $Password){
            
            // ABRE LA CONEXION DE LA DB
            $ConsultaSQL = new NeuralBDConsultas;
            // TABLA
            $ConsultaSQL->CrearConsulta('tbl_usuarios');
            // CAMPOS
            $ConsultaSQL->AgregarColumnas('username, password');
            // CONDICIONES
            $ConsultaSQL->AgregarCondicion("username = '".$Usuario."' AND password = '".$Password."'");
            // CONTEO DE REGISTROS
            $ConsultaSQL->PrepararCantidadDatos('Cantidad');
            $ConsultaSQL->PrepararQuery();
            // GENERA LA CONSULTA
            $ConsultaSQL->PrepararQuery();
            $Datos = $ConsultaSQL->ExecuteConsulta('POS');
            // RETORNA RESULTADOS
            return $Datos['Cantidad'];
               
        }
    }