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
	
	class NeuralFormularios {
		
		/**
		 * Fielset($Css, $Style = false, $Id = false, $Name = false)
		 * 
		 * Metodo para agrupar campos en un fields
		 * @param $Css: opcion del class del campo
		 * @param $Style: array asociativo con las propiedades para insertar style=""
		 * @param $Id: ide del campo
		 * @param $Name: name del campo
		 * 
		 */
		public function FieldsetAbrir($Css = false, $Style = false, $Id = false, $Name = false) {
			
			$Datos = array(
				'Tipo' => 'Fieldset_Open', 
				'Campos' => array(
					'name' => $Name, 
					'id' => $Id,  
					'class' => $Css,  
					'style' => $Style
				)
			);
			$this->Fieldset = true;
			$this->Campo[] = $Datos;
		}
		
		/**
		 * FieldsetCerrar()
		 * 
		 * Metodo para cerrar la agrupacion del fieldset
		 * 
		 */
		public function FieldsetCerrar() {
			
			$this->Campo[] = array('Tipo' => 'Fieldset_Close');
		}
		
		/**
		 * Legend($Texto, $Css = false, $Style = false, $Id = false, $Name = false)
		 * 
		 * Metodo para construccion de la propiedad legend
		 * 
		 * @param $Texto: Texto del campo Legend
		 * @param $Css: propiedad class
		 * @param $Style: array asociativo con las propiedades del style manual
		 * @param $Id: ID del campo
		 * @param $Name: propiedad name del campo
		 * 
		 */
		public function Legend($Texto, $Css = false, $Style = false, $Id = false, $Name = false) {
			
			$this->Campo[] = array(
				'Tipo' => 'Legend', 
				'Campos' => array(
					'id' => $Id, 
					'name' => $Name, 
					'class' => $Css, 
					'style' => $Style
				), 
				'Texto' => $Texto
			);
		}
		
		/**
		 * ConfiguracionFormulario($tipo, $Action, $metodo, $nombre, $id, $css, $data = false)
		 * 
		 * $tipo: solo se cuenta con tipo FORM y tipo TABLE
		 * $Action: direccion donde se enviaran los datos
		 * $metodo: el metodo de envio ya sea POST, GET
		 * $nombre: el nombre del formulario
		 * $id: id del formulario
		 * $css: hoja de estilos predeterminada cdata class="" 
		 * $data: valores false por defecto y true para que se pueda utilizar envio de archivos y utilizar input file
		**/
		public function ConfiguracionFormulario($Action, $Metodo, $Nombre, $Id, $Css = false, $Style = false, $Data = false) {
			
			$this->ConfiguracionFormulario = array(
				'Campos' => array( 
					'name' => $Nombre, 
					'id' => $Id, 
					'class' => $Css, 
					'style' => $Style
				), 
				'Propiedades' => array(
					'action' => $Action, 
					'method' => $Metodo
				), 
				'Data' => $Data
			);
		}
		
		/**
		 * AgregarArchivo($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1)
		 * 
		 * Metodo para construir un campo File
		 * 
		 * @param $Titulo: Texto del Campo label
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $Valor: valor del campo input
		 * @param $CssLabel: propiedad class de la etiqueta label
		 * @param $CssInput: propiedad class de la etiqueta input
		 * @param $StyleLabel: array asociativo con las propiedades de hoja de estilos de la etiqueta Label
		 * @param $StyleInput: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * @param $SaltoLinea: salto de lineas a agregar despues del campo input, por defecto su valor es 1
		 * 
		 */
		public function AgregarArchivo($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1) {
			
			$this->Campo[] = array(
				'Tipo' => 'File', 
				'Label' => array(
					'texto' => $Titulo, 
					'class' => $CssLabel, 
					'style' => $StyleLabel
				), 
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id, 
					'value' => $Valor, 
					'class' => $CssInput,  
					'style' => $StyleInput
				),
				'SaltosLineas' => $SaltoLinea 
			);
		}
		
		/**
		 * AgregarPassword($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1)
		 * 
		 * Metodo para construir un campo Password
		 * 
		 * @param $Titulo: Texto del Campo label
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $Valor: valor del campo input
		 * @param $CssLabel: propiedad class de la etiqueta label
		 * @param $CssInput: propiedad class de la etiqueta input
		 * @param $StyleLabel: array asociativo con las propiedades de hoja de estilos de la etiqueta Label
		 * @param $StyleInput: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * @param $SaltoLinea: salto de lineas a agregar despues del campo input, por defecto su valor es 1
		 * 
		 */
		public function AgregarPassword($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1) {
			
			$this->Campo[] = array(
				'Tipo' => 'Password', 
				'Label' => array(
					'texto' => $Titulo, 
					'class' => $CssLabel, 
					'style' => $StyleLabel
				), 
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id, 
					'value' => $Valor, 
					'class' => $CssInput,  
					'style' => $StyleInput
				),
				'SaltosLineas' => $SaltoLinea 
			);
		}
		
		/**
		 * AgregarSelect($Titulo, $Nombre, $Id, $ValorCampo, $ValorMostrar, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1)
		 * 
		 * Metodo para construir un campo Select
		 * 
		 * @param $Titulo: Texto del Campo label
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $ValorCampo: array de valores del select
		 * @example array('valor 1', 'valor 2', 'valor 3', ...)
		 * @param $ValorMostrar: array con los textos a mostrar en el select
		 * @example array('valor 1', 'valor 2', 'valor 3', ...)
		 * @param $CssLabel: propiedad class de la etiqueta label
		 * @param $CssInput: propiedad class de la etiqueta input
		 * @param $StyleLabel: array asociativo con las propiedades de hoja de estilos de la etiqueta Label
		 * @param $StyleInput: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * @param $SaltoLinea: salto de lineas a agregar despues del campo input, por defecto su valor es 1
		 * 
		 */
		public function AgregarSelect($Titulo, $Nombre, $Id, $ValorCampo, $ValorMostrar, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1) {
			
			$this->Campo[] = array(
				'Tipo' => 'Select', 
				'Label' => array(
					'texto' => $Titulo, 
					'class' => $CssLabel, 
					'style' => $StyleLabel
				), 
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id,  
					'class' => $CssInput,  
					'style' => $StyleInput
				), 
				'Datos' => array(
					'Valor' => $ValorCampo, 
					'Mostrar' => $ValorMostrar
				),
				'SaltosLineas' => $SaltoLinea
			);
		}
		
		/**
		 * AgregarSubmit($Nombre, $Id, $TextoBoton, $Css = false, $Style = false, $Tipo = 'input', $SaltoLinea = 1)
		 * 
		 * Metodo para construir un campo button
		 * 
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $TextoBoton: Texto del Boton
		 * @param $Css: propiedad class de la etiqueta input
		 * @param $Style: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * @param $SaltoLinea: salto de lineas a agregar despues del campo input, por defecto su valor es 1
		 * 
		 */
		public function AgregarSubmit($Nombre, $Id, $TextoBoton, $Css = false, $Style = false, $SaltoLinea = 1) {
			
			$this->Campo[] = array(
				'Tipo' => 'Submit',  
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id, 
					'value' => $TextoBoton, 
					'class' => $Css,  
					'style' => $Style
				), 
				'SaltosLineas' => $SaltoLinea
			);
		}
		
		/**
		 * AgregarTextHidden($Nombre, $Id, $Valor, $Css = false, $Style = false)
		 * 
		 * Metodo para construir un campo Hidden
		 * 
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $Valor: valor del campo input hidden
		 * @param $Css: propiedad class de la etiqueta input
		 * @param $Style: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * 
		 */
		public function AgregarTextHidden($Nombre, $Id, $Valor, $Css = false, $Style = false) {
			
			$this->Campo[] = array(
				'Tipo' => 'Hidden', 
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id,
					'value' => $Valor, 
					'class' => $Css, 
					'style' => $Style
				)
			);
		}
		
		/**
		 * AgregarText($Titulo, $Nombre, $Id, $Valor, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1)
		 * 
		 * Metodo para construir un campo Text
		 * 
		 * @param $Titulo: Texto del Campo label
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $Valor: valor del campo input
		 * @param $CssLabel: propiedad class de la etiqueta label
		 * @param $CssInput: propiedad class de la etiqueta input
		 * @param $StyleLabel: array asociativo con las propiedades de hoja de estilos de la etiqueta Label
		 * @param $StyleInput: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * @param $SaltoLinea: salto de lineas a agregar despues del campo input, por defecto su valor es 1
		 * 
		 */
		public function AgregarText($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1) {
			
			$this->Campo[] = array(
				'Tipo' => 'Text', 
				'Label' => array(
					'texto' => $Titulo, 
					'class' => $CssLabel, 
					'style' => $StyleLabel
				), 
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id, 
					'value' => $Valor, 
					'class' => $CssInput,  
					'style' => $StyleInput
				),
				'SaltosLineas' => $SaltoLinea  
			);
		}
		
		/**
		 * AgregarTextArea($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1, $Ancho = 32, $Alto = 8)
		 * 
		 * Metodo para construir un campo Textarea
		 * 
		 * @param $Titulo: Texto del Campo label
		 * @param $Nombre: propiedad name del input
		 * @param $Id: propiedad id del input
		 * @param $Valor: valor del campo input
		 * @param $CssLabel: propiedad class de la etiqueta label
		 * @param $CssInput: propiedad class de la etiqueta input
		 * @param $StyleLabel: array asociativo con las propiedades de hoja de estilos de la etiqueta Label
		 * @param $StyleInput: array asociativo con las propiedades de hoja de estilos de la etiqueta input
		 * @param $SaltoLinea: salto de lineas a agregar despues del campo input, por defecto su valor es 1
		 * @param $Ancho: tamaño del campo en su ancho 
		 * @param $Alto: tamaño del campo en su alto
		 * 
		 */
		public function AgregarTextArea($Titulo, $Nombre, $Id, $Valor = false, $CssLabel = false, $CssInput = false, $StyleLabel = false, $StyleInput = false, $SaltoLinea = 1, $Ancho = 32, $Alto = 8) {
			
			$this->Campo[] = array(
				'Tipo' => 'Textarea', 
				'Label' => array(
					'texto' => $Titulo, 
					'class' => $CssLabel, 
					'style' => $StyleLabel
				),
				'Campos' => array(
					'name' => $Nombre, 
					'id' => $Id, 
					'cols' => $Ancho, 
					'rows' => $Alto, 
					'value' => $Valor, 
					'class' => $CssInput,  
					'style' => $StyleInput
				), 
				'SaltosLineas' => $SaltoLinea
			);
		}
		
		/**
		 * MostrarFormulario()
		 * 
		 * toma los metodos anteriores y genera el formulario correspondiente
		**/
		public function MostrarFormulario() {
			
			$Constructor = array(
				'Cabecera' => '<form { CAMPOS }>', 
				'Fin' => '</form>', 
				'Text' => '<label { CAMPOS_LABEL }>{ VALOR_LABEL }</label> <input type="text" { CAMPOS } />', 
				'Hidden' => '<input type="hidden" { CAMPOS } />', 
				'Password' => '<label { CAMPOS_LABEL }>{ VALOR_LABEL }</label> <input type="password" { CAMPOS } />', 
				'File' => '<label { CAMPOS_LABEL }>{ VALOR_LABEL }</label> <input type="file" { CAMPOS } />', 
				'Submit' => '<button type="submit" { CAMPOS }>{ TEXTO }</button>', 
				'Select' => "<label { CAMPOS_LABEL }>{ VALOR_LABEL }</label> <select { CAMPOS }>\n{ VALORES }\n</select>", 
				'Textarea' => '<label { CAMPOS_LABEL }>{ VALOR_LABEL }</label> <textarea { CAMPOS }>{ VALORES }</textarea>', 
				'Fieldset_Open' => '<fieldset { CAMPOS }>', 
				'Fieldset_Close' => '</fieldset>', 
				'Legend' => '<legend { CAMPOS }>{ VALORES }</legend>'
			);
			
			if(count($this->Campo)>=1)
			{
				//Validamos que se haya instanciado el metodo de configuracion
				if(isset($this->ConfiguracionFormulario))
				{
					$ConfiguracionFormulario = SysMiscNeuralForm::OrganizarConfiguracion($Constructor['Cabecera'], $this->ConfiguracionFormulario);
					$CantidadCampos = count($this->Campo);
					if($CantidadCampos>=1)
					{
						if(isset($this->Fieldset))
						{
							$Formulario[] = $ConfiguracionFormulario;
							
							for ($i=0; $i<$CantidadCampos; $i++)
							{
								$Tipo = $this->Campo[$i]['Tipo'];
								$Formulario[] = SysMiscNeuralForm::ConstructorCampos($Constructor[$Tipo], $this->Campo[$i]);
							}
							
							$Formulario[] = $Constructor['Fin'];
							
							return implode("\n", $Formulario);
						}
						else 
						{
							$Formulario[] = $ConfiguracionFormulario;
							$Formulario[] = SysMiscNeuralForm::ConstructorFieldsetOpen($Constructor['Fieldset_Open'], array('name' => false, 'id' => 'Neural_Fieldset', 'class' => 'Neural_Fieldset', 'style' => false));
							
							
							for ($i=0; $i<$CantidadCampos; $i++)
							{
								$Tipo = $this->Campo[$i]['Tipo'];
								$Formulario[] = SysMiscNeuralForm::ConstructorCampos($Constructor[$Tipo], $this->Campo[$i]);
							}
							
							$Formulario[] = $Constructor['Fieldset_Close'];
							$Formulario[] = $Constructor['Fin'];
							
							return implode("\n", $Formulario);
						}
					}
					else
					{
						return 'Faltan Los Campos del Formulario';
					}
				}
				else
				{
					return 'Falta la Configuración del Formulario';
				}
			}
		}
	}