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
	
	/**
	 * CLASE EXPERIMENTAL
	 * 
	 * SIN SOPORTE
	 * 
	 * UTILIZAR BAJO PROPIO JUICIO
	 * 
	 * */
	class NeuralBDConsultasArray {
		
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
		 * AgregarCondicion($Condicion)
		 * 
		 * Agregamos las condiciones de la consulta
		**/
		public function AgregarCondicionArray($Columna, $Array) {
			
			$this->CondicionesArray = $Array;
			$this->CondicionesArrayColumna = $Columna;
			$this->Condiciones[] = trim($Columna)."='{Array_$Columna}'";
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
				
				$SQL = $this->ConstructorBase = $ConstructorBase;
				$Columna = $this->CondicionesArrayColumna;
				
				for ($i=0; $i<count($this->CondicionesArray); $i++)
				{
					$Datos[] = str_replace("{Array_$Columna}", $this->CondicionesArray[$i], $SQL);
				}
				
				return $this->ArrayConsultasPreparado = $Datos;
			}
		}
		
		/**
		 * ExecuteConsulta($BaseDatos)
		 * 
		 * Ejecutamos la consulta a la base de datos y retornamos los datos en un array asociativo
		**/
		public function ExecuteConsulta($BaseDatos) {
			
			$Conexion = NeuralConexionBaseDatos::ObtenerConexionBase($BaseDatos);
			$Cantidad = count($this->ArrayConsultasPreparado);
			
			for($i=0; $i<$Cantidad; $i++)
			{
				$Consulta = $Conexion->prepare($this->ArrayConsultasPreparado[$i]);
			 	$Consulta->execute();
			 	$CantidadEncontrada = $Consulta->rowCount();
			 	
			 	if($CantidadEncontrada>=1)
			 	{
			 		$FetchConsulta = $Conexion->fetchAll($this->ArrayConsultasPreparado[$i]);
			 		$ResultadoConsulta[] = $FetchConsulta[0];
			 	}
			 	else
			 	{
			 		$ResultadoConsulta[]= array('No_Encontrado' => 'No hay Datos');
			 	}
			}
			
			$CantidadRegistros = (isset($ResultadoConsulta)) ? count($ResultadoConsulta) : array('Cantidad' => 0);
			
			$DatosFinales = array_merge(array('Cantidad' => $CantidadRegistros), $ResultadoConsulta);
			return $DatosFinales;
		}
	}