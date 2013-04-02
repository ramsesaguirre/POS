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
	
	class NeuralBDConsultas {
		
		/**
		 * CrearConsulta($Tabla)
		 * 
		 * Agregamos la tabla a consultar en el query
		**/
		public function CrearConsulta($Tabla) {
			
			$this->Tablas[] = trim($Tabla);
		}
		
		/**
		 * AgregarColumnas($Columnas)
		 * 
		 * Agregamos las columnas a agregar a la consulta
		**/
		public function AgregarColumnas($Columnas) {
			
			$this->Columnas[] = trim($Columnas);
		}
		
		/**
		 * AgregarCondicion($Condicion)
		 * 
		 * Agregamos las condiciones de la consulta
		**/
		public function AgregarCondicion($Condicion) {
			
			$this->Condiciones[] = trim($Condicion);
		}
		
		/**
		 * AgregarAgrupar($Agrupar)
		 * 
		 * Columnas por las cuales se agrupara la consulta
		**/
		public function AgregarAgrupar($Agrupar) {
			
			$this->Agrupar[] = trim($Agrupar);
		}
		
		/**
		 * AgregarOrdenar($Columna, $TipoOrdenar = 'ASC')
		 * 
		 * Ordena las columnas solo con un orden, multiples columnas con un orden
		 * $Columna: Columna a Ordenar
		**/
		public function AgregarOrdenar($Columna, $TipoOrdenar = 'ASC') {
			
			$this->Ordenar[] = trim($Columna).' '.trim($TipoOrdenar);
		}
		
		/**
		 * AgregarLimite($Puntero, $CantidadRegistros)
		 * 
		 * Genera el limite de la consulta
		 * $Puntero: inicio del ID o dato de referencia de inicio
		 * $CantidadRegistros: es la cantidad de registros que se visualizaran de la consulta
		**/
		public function AgregarLimite($Puntero, $CantidadRegistros) {
			
			$this->Limite[] = $Puntero;
			$this->Limite[] = $CantidadRegistros;
		}
		
		/**
		 * PrepararQuery($BaseDatos)
		 * 
		 * Construye la sentencia la cual sera generada para realizar el query
		 */
		public function PrepararQuery() {
			
			//Organizamos las partes del query
			$TablasOrganizadas = (isset($this->Tablas)) ? implode(", ", $this->Tablas) : NULL;
			$ColumnasOrganizadas = (isset($this->Columnas)) ? implode(", ", $this->Columnas) : NULL;
			$CondicionesOrganizadas = (isset($this->Condiciones)) ? implode(" AND ", $this->Condiciones) : NULL;
			$AgruparOrganizadas = (isset($this->Agrupar)) ? implode(", ", $this->Agrupar) : NULL;
			$OrdenarOrganizadas = (isset($this->Ordenar)) ? implode(", ", $this->Ordenar) : NULL;
			$LimiteOrganizadas = (isset($this->Limite)) ? implode(", ", $this->Limite) : NULL;
			
			if($TablasOrganizadas!=NULL AND $ColumnasOrganizadas!=NULL)
			{
				//Construimos el query base
				$ConstructorBase = 'SELECT '.$ColumnasOrganizadas.' FROM '.$TablasOrganizadas;
				
				//Validamos si tenemos los parametros adicionales de las condiciones
				if($CondicionesOrganizadas!=NULL)
					$ConstructorBase .= ' WHERE '.$CondicionesOrganizadas;
				
				//Validamos si tenemos agrupacion de columnas
				if($AgruparOrganizadas!=NULL)
					$ConstructorBase .= ' GROUP BY '.$AgruparOrganizadas;
				
				//Validamos si tenemos columnas para organizar
				if($OrdenarOrganizadas!=NULL)
					$ConstructorBase .= ' ORDER BY '.$OrdenarOrganizadas;
				
				//Validamos si se genero limite o no
				if($LimiteOrganizadas!= NULL)
					$ConstructorBase .= ' LIMIT '.$LimiteOrganizadas;
				
				return $this->ConstructorBase = $ConstructorBase;
			}
		}
		
		/**
		 * PrepararCantidadDatos($NombreCampo)
		 * 
		 * Indica la cantidad de registros de una consulta
		 * $NombreCampo: valor que se le dara al array asociativo que indica la cantidad
		**/
		public function PrepararCantidadDatos($NombreCampo = 'Cantidad') {
			
			//Organizamos las partes del query
			$TablasOrganizadas = (isset($this->Tablas)) ? implode(", ", $this->Tablas) : NULL;
			$ColumnasOrganizadas = (isset($this->Columnas)) ? implode(", ", $this->Columnas) : NULL;
			$CondicionesOrganizadas = (isset($this->Condiciones)) ? implode(" AND ", $this->Condiciones) : NULL;
			$AgruparOrganizadas = (isset($this->Agrupar)) ? implode(", ", $this->Agrupar) : NULL;
			$OrdenarOrganizadas = (isset($this->Ordenar)) ? implode(", ", $this->Ordenar) : NULL;
			
			if($TablasOrganizadas!=NULL AND $ColumnasOrganizadas!=NULL)
			{
				//Construimos el query base
				$ConstructorBase = 'SELECT '.$ColumnasOrganizadas.' FROM '.$TablasOrganizadas;
				
				//Validamos si tenemos los parametros adicionales de las condiciones
				if($CondicionesOrganizadas!=NULL)
					$ConstructorBase .= ' WHERE '.$CondicionesOrganizadas;
				
				//Validamos si tenemos agrupacion de columnas
				if($AgruparOrganizadas!=NULL)
					$ConstructorBase .= ' GROUP BY '.$AgruparOrganizadas;
				
				//Validamos si tenemos columnas para organizar
				if($OrdenarOrganizadas!=NULL)
					$ConstructorBase .= ' ORDER BY '.$OrdenarOrganizadas;
				
				$this->ConstructorBaseContar[] = $ConstructorBase;
				
				//Generamos el nombre del campo a contar
				$this->ConstructorBaseContar['NombreCampo'] = $NombreCampo;
			}
		}
		
		/**
		 * ExecuteConsulta($BaseDatos)
		 * 
		 * Ejecutamos la consulta a la base de datos y retornamos los datos en un array asociativo
		**/
		public function ExecuteConsulta($BaseDatos) {
			
			if(isset($this->ConstructorBase) AND isset($this->ConstructorBaseContar))
			{
				$Conexion = NeuralConexionBaseDatos::ObtenerConexionBase($BaseDatos);
				$Datos = $Conexion->fetchAll($this->ConstructorBase);
				
				$ConsultaCantidad = $Conexion->prepare($this->ConstructorBaseContar[0]);
			 	$ConsultaCantidad->execute();
			 	$CantDatos = $ConsultaCantidad->rowCount();
				
				$Cantidad = array($this->ConstructorBaseContar['NombreCampo'] => $CantDatos);
				
				return array_merge($Cantidad, $Datos);
			}
			elseif(isset($this->ConstructorBaseContar))
			{
				$Conexion = NeuralConexionBaseDatos::ObtenerConexionBase($BaseDatos);
				$Consulta = $Conexion->prepare($this->ConstructorBaseContar[0]);
			 	$Consulta->execute();
			 	return $Consulta->rowCount();
			}
			elseif(isset($this->ConstructorBase))
			{
				$Conexion = NeuralConexionBaseDatos::ObtenerConexionBase($BaseDatos);
				return $Conexion->fetchAll($this->ConstructorBase);
			}
		}
		
		/**
		 * ExecuteQueryManual($BaseDatos, $Query)
		 * 
		 * Utilizada para generar query de forma manual
		**/
		public function ExecuteQueryManual($BaseDatos, $Query) {
			
			$Conexion = NeuralConexionBaseDatos::ObtenerConexionBase($BaseDatos);
				$Consulta = $Conexion->prepare($Query);
			 	$Consulta->execute();
			 	return $Consulta->fetchAll();
		}
	}