<?php

/**
 * @author    Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */
    class ControlAccesos_Modelo extends Modelo {
        
        function __Construct(){
            parent::__Construct();
        }
                       
        /**
         * Funcion     : MostrarUsuarios(integer, integer)
         * Descripcion : Determina si el usuario se encuentra registrado en la bd.
         * Tipo        : Publico
         * Parametros  : Columna, orden, start, limit
         *
         * */
        public function MostrarUsuarios($columna, $orden, $start, $limit){
            
            $ConsultaSQL = new NeuralBDConsultas;
            $ConsultaSQL->CrearConsulta('tbl_usuarios');
            $ConsultaSQL->AgregarColumnas('idUsuario, idTipoUsuario, nombre, apellidoPaterno, apellidoMaterno, username, password, email');
            $ConsultaSQL->AgregarOrdenar($columna, $orden);
            $ConsultaSQL->AgregarLimite($start, $limit);
            $ConsultaSQL->PrepararQuery();
        
            return $ConsultaSQL->ExecuteConsulta('POS');       
        }
        
        /**
         * Funcion     : TotalRegistros()
         * Descripcion : Determina el numero de registros
         * Tipo        : Publico
         * Parametros  : ninguno
         *
         **/
        public function TotalRegistros(){
            
            // ABRE LA CONEXION DE LA DB
            $ConsultaSQL = new NeuralBDConsultas;
            $ConsultaSQL->CrearConsulta('tbl_usuarios');
            $ConsultaSQL->AgregarColumnas('idUsuario');
            $ConsultaSQL->PrepararCantidadDatos('Cantidad');
            $ConsultaSQL->PrepararQuery();
            
            // NUMERO DE REGISTROS
            return $ConsultaSQL->ExecuteConsulta('POS');
            
        }
        
        /**
         * Funcion     : TotalRegiAgregarstros(string, string, string, string, string, string, integer)
         * Descripcion : Agrega Nuevo registro a la base de datos
         * Tipo        : Publico
         * Parametros  : 
         *
         **/
        public function Agregar($nombre, $apellidoPaterno, $apellidoMaterno, $username, $passwd, $email, $nivel){
            
            $SQL = new NeuralBDGab;
            $SQL->SeleccionarDestino('POS', 'tbl_usuarios');
            $SQL->AgregarSentencia('idTipoUsuario', $nivel);
            $SQL->AgregarSentencia('nombre', $nombre);
            $SQL->AgregarSentencia('apellidoPaterno', $apellidoPaterno);
            $SQL->AgregarSentencia('apellidoMaterno', $apellidoMaterno);
            $SQL->AgregarSentencia('username', $username);
            $SQL->AgregarSentencia('password', $passwd);
            $SQL->AgregarSentencia('email', $email);
            $SQL->InsertarDatos();
            
        }
        
        /**
         * Funcion     : Editar(integer, string, string, string, string, string, string, integer)
         * Descripcion : Edita registro a la base de datos
         * Tipo        : Publico
         * Parametros  : 
         *
         **/
        public function Editar($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $username, $passwd, $email, $nivel){
            
            $SQL = new NeuralBDGab;
            $SQL->SeleccionarDestino('POS', 'tbl_usuarios');
            $SQL->AgregarSentencia('idTipoUsuario', $nivel);
            $SQL->AgregarSentencia('nombre', $nombre);
            $SQL->AgregarSentencia('apellidoPaterno', $apellidoPaterno);
            $SQL->AgregarSentencia('apellidoMaterno', $apellidoMaterno);
            $SQL->AgregarSentencia('username', $username);
            $SQL->AgregarSentencia('password', $passwd);
            $SQL->AgregarSentencia('email', $email);
            $SQL->AgregarCondicion('idUsuario', $idUsuario);
            $SQL->ActualizarDatos();
            
        }
        
        /**
         * Funcion     : Eliminar(integer)
         * Descripcion : Elimina registro a la base de datos
         * Tipo        : Publico
         * Parametros  : idUsuario
         *
         **/
        public function Eliminar($idUsuario){
            
            $SQL = new NeuralBDGab;
            $SQL->SeleccionarDestino('POS', 'tbl_usuarios');
            $SQL->AgregarCondicion('idUsuario', $idUsuario);
            $SQL->EliminarDatos();
        }
        
    }