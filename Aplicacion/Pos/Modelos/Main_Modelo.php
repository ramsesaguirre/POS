<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
    class Main_Modelo extends Modelo {
        
        function __Construct(){
            parent::__Construct();
        }
        
        /**
         * Funcion     : DatoUsuario(string)
         * Descripcion : Datos del usuario nombre, apellidos
         * Tipo        : Publico
         * Parametros  : usuario
         *
         * */
        public function DatoUsuario($Usuario){
            
            // ABRE LA CONEXION DE LA DB
            $ConsultaSQL = new NeuralBDConsultas;
            // TABLA
            $ConsultaSQL->CrearConsulta('tbl_usuarios');
            // CAMPOS
            $ConsultaSQL->AgregarColumnas('nombre, apellidoPaterno, apellidoMaterno');
            // CONDICIONES
            $ConsultaSQL->AgregarCondicion("username = '".$Usuario."'");
            $ConsultaSQL->PrepararCantidadDatos('Cantidad');
            // GENERA LA CONSULTA
            $ConsultaSQL->PrepararQuery();
            // RETORNA RESULTADOS
            return $ConsultaSQL->ExecuteConsulta('POS');
               
        }
    }