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
	
	class NeuralBDGabArray {
		
		/**
		 * SeleccionarDestino($BaseDatos, $Tabla)
		 * 
		 * Seleccionamos la base de datos y la tabla donde se realizara el proceso
		**/
		public function SeleccionarDestino($BaseDatos, $Tabla) {
			
			$this->BaseDatos = trim(mb_strtoupper($BaseDatos));
			$this->Tabla = trim($Tabla);
		}
		
		/**
		 * AgregarSentencia($Columna, $Valor)
		 * 
		 * Agregar los datos a base de datos
		 * @var $Array: array asociativo continuo
		 * $Array[{Valor Incremental}][{Columna}][{Valor}]
		 * $Array(
		 * 		Array('Columna' => 'Valor')
		 * )
		 */
		public function AgregarSentenciaArray($Array) {
			
			$this->ObtenerDatos = $Array;
		}
		
		/**
		 * AgregarCondicion($Columna, $Valor)
		 * 
		 * Metodo necesario para generar las condiciones de actualizacion y eliminacion de registros
		 * @var $Array: array asociativo continuo
		 * $Array[{Valor Incremental}][{Columna}][{Valor}]
		 * $Array(
		 * 		Array('Columna' => 'Valor')
		 * )
		**/
		public function AgregarCondicionArray($Array) {
			
			$this->ObtenerCondicion = $Array;
		}
		
		/**
		 * InsertarDatos()
		 * 
		 * Inserta los datos en la base de datos y en la tabla especificada
		 * 
		**/
		public function InsertarDatosArray() {
			
			if(isset($this->BaseDatos))
			{
				$Conn = new NeuralConexionBaseDatos;
				$Conexion = $Conn->ObtenerConexionBase($this->BaseDatos);
				$CantidadDatos = count($this->ObtenerDatos);
				
				for ($i=0; $i<$CantidadDatos; $i++)
				{
					$Conexion->insert($this->Tabla, $this->ObtenerDatos[$i]);
				}
			}
		}
		
		/**
		 * ActualizarDatos()
		 * 
		 * Actualiza los datos requeridos
		**/
		public function ActualizarDatosArray() {
			
			if(isset($this->BaseDatos))
			{
				$Conn = new NeuralConexionBaseDatos;
				$Conexion = $Conn->ObtenerConexionBase($this->BaseDatos);
				$CantidadDatos = count($this->ObtenerDatos);
				
				for ($i=0; $i<$CantidadDatos; $i++)
				{
					$Conexion->update($this->Tabla, $this->ObtenerDatos[$i], $this->ObtenerCondicion[$i]);
				}
			}
		}
		
		/**
		 * EliminarDatos()
		 * 
		 * Elimina los datos requeridos
		**/
		public function EliminarDatosArray() {
			
			if(isset($this->BaseDatos))
			{
				$Conn = new NeuralConexionBaseDatos;
				$Conexion = $Conn->ObtenerConexionBase($this->BaseDatos);
				$CantidadDatos = count($this->ObtenerCondicion);
				
				for ($i=0; $i<$CantidadDatos; $i++)
				{
					$Conexion->delete($this->Tabla, $this->ObtenerCondicion[$i]);
				}
			}
		}
	}