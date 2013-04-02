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
	
	abstract class SysMiscNeuralForm {
		
		/**
		 * SysMiscNeuralForm::OrganizarStyle($Array);
		 * 
		 * Construye las opciones de la propiedad style
		 * @param $Array: array asociativo para la construccion de la propiedad
		 * @example array('font-family' => 'verdana', 'color' => 'white')
		 * 
		 */
		public static function OrganizarStyle($Array) {
			
			foreach ($Array AS $Llave => $Valor)
			{
				$Lista[] = $Llave.": ".$Valor;
			}
			
			$Campos = implode('; ', $Lista);
			
			return "style=\"$Campos;\"";
		}
		
		/**
		 * SysMiscNeuralForm::OrganizarConfiguracion($Constructor, $Array)
		 * 
		 * Constructor de etiquetas form
		 * @param $Constructor: etiqueta base de inyeccion de campos
		 * @param $Array: array asociativo con los campos correspondientes
		 * 
		 * */
		public static function OrganizarConfiguracion($Constructor, $Array) {
			
			foreach ($Array['Propiedades'] AS $LlavePropiedad => $ValorPropiedad)
			{
				$Lista[] = $LlavePropiedad."=\"$ValorPropiedad\"";
			}
			
			foreach ($Array['Campos'] AS $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
				{
					$Lista[] =  ($ValorCampo==true) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				}
				else
				{
					if($LlaveCampo=='method')
					{
						
						$Lista[] = (empty($ValorCampo)) ? $LlaveCampo."=\"POST\"" : $LlaveCampo."=\"$ValorCampo\"";
					}
					else
					{
						$Lista[] = $LlaveCampo."=\"$ValorCampo\"";
					}
				}
			}
			
			if($Array['Data']==true)
			{
				$Lista[] = 'enctype="multipart/form-data"';
			}
			$Campos = implode(' ', $Lista);
			
			return str_replace('{ CAMPOS }', $Campos, $Constructor);
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorCampos($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorCampos($Constructor, $Array) {
			
			if($Array['Tipo']=='Fieldset_Open')
				return SysMiscNeuralForm::ConstructorFieldsetOpen($Constructor, $Array['Campos']);
			elseif($Array['Tipo']=='Fieldset_Close')
				return $Constructor;
			elseif($Array['Tipo']=='Text')
				return SysMiscNeuralForm::ConstructorText($Constructor, $Array);
			elseif($Array['Tipo']=='Hidden')
				return SysMiscNeuralForm::ConstructorTextHidden($Constructor, $Array);
			elseif($Array['Tipo']=='Password')
				return SysMiscNeuralForm::ConstructorPassword($Constructor, $Array);
			elseif($Array['Tipo']=='File')
				return SysMiscNeuralForm::ConstructorFile($Constructor, $Array);
			elseif($Array['Tipo']=='Submit')
				return SysMiscNeuralForm::ConstructorSubmit($Constructor, $Array);
			elseif($Array['Tipo']=='Select')
				return SysMiscNeuralForm::ConstructorSelect($Constructor, $Array);
			elseif($Array['Tipo']=='Textarea')
				return SysMiscNeuralForm::ConstructorTextarea($Constructor, $Array);
			elseif($Array['Tipo']=='Legend')
				return SysMiscNeuralForm::ConstructorLegend($Constructor, $Array);
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorLegend($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorLegend($Constructor, $Array) {
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				else
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ VALORES }', $Array['Texto'], $ConstructorFinal);
			
			return $ConstructorFinal;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorTextarea($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorTextarea($Constructor, $Array) {
			
			foreach ($Array['Label'] AS $Llave => $Valor)
			{
				if($Llave=='style')
					$CamposLabel[] = (is_array($Valor)) ? SysMiscNeuralForm::OrganizarStyle($Valor) : '';
				elseif($Llave<>'texto')
					$CamposLabel[] = ($Valor == true) ? $Llave."=\"$Valor\"" : '';
			}
			
			$CamposLabelOrganizados = implode(' ', $CamposLabel);
			$ConstructorFinal = str_replace('{ CAMPOS_LABEL }', trim($CamposLabelOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ VALOR_LABEL }', $Array['Label']['texto'], $ConstructorFinal);
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				elseif($LlaveCampo<>'value')
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $ConstructorFinal);
			$ConstructorFinal = str_replace('{ VALORES }', $Array['Campos']['value'], $ConstructorFinal);
			$CantidadSaltoLinea = ($Array['SaltosLineas']>=1) ? $Array['SaltosLineas'] : '1';
			
			for ($i=1; $i<=$CantidadSaltoLinea; $i++) { $Saltos[] = '<br />'; }
			$SaltoLineas = implode("\n", $Saltos);
			return $ConstructorFinal.$SaltoLineas;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorSelect($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorSelect($Constructor, $Array) {
			
			foreach ($Array['Label'] AS $Llave => $Valor)
			{
				if($Llave=='style')
					$CamposLabel[] = (is_array($Valor)) ? SysMiscNeuralForm::OrganizarStyle($Valor) : '';
				elseif($Llave<>'texto')
					$CamposLabel[] = ($Valor == true) ? $Llave."=\"$Valor\"" : '';
			}
			
			$CamposLabelOrganizados = implode(' ', $CamposLabel);
			$ConstructorFinal = str_replace('{ CAMPOS_LABEL }', trim($CamposLabelOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ VALOR_LABEL }', $Array['Label']['texto'], $ConstructorFinal);
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				else
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $ConstructorFinal);
			$CantidadSaltoLinea = ($Array['SaltosLineas']>=1) ? $Array['SaltosLineas'] : '1';
			
			if(is_array($Array['Datos']['Valor']) AND is_array($Array['Datos']['Mostrar']))
			{
				$CantidadDatos = count($Array['Datos']['Valor']);
				$CamposValores[] = "<option value=\"\">Escoja Una Opción</option>";
				
				for ($i=0; $i<$CantidadDatos; $i++)
				{
					$CamposValores[] = "<option value=\"".$Array['Datos']['Valor'][$i]."\">".$Array['Datos']['Mostrar'][$i]."</option>";
				}
			}
			else
			{
				$CamposValores[] = "<option value=\"\">Escoja Una Opción</option>";
			}
			
			$CamposValoresOrganizados = implode("\n", $CamposValores);
			$ConstructorFinal = str_replace('{ VALORES }', $CamposValoresOrganizados, $ConstructorFinal);
			
			for ($i=1; $i<=$CantidadSaltoLinea; $i++) { $Saltos[] = '<br />'; }
			$SaltoLineas = implode("\n", $Saltos);
			return $ConstructorFinal.$SaltoLineas;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorSubmit($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorSubmit($Constructor, $Array) {
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				elseif($LlaveCampo<>'value')
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ TEXTO }', $Array['Campos']['value'], $ConstructorFinal);
			$CantidadSaltoLinea = ($Array['SaltosLineas']>=1) ? $Array['SaltosLineas'] : '1';
			
			for ($i=1; $i<=$CantidadSaltoLinea; $i++) { $Saltos[] = '<br />'; }
			$SaltoLineas = implode("\n", $Saltos);
			return $ConstructorFinal.$SaltoLineas;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorFile($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorFile($Constructor, $Array) {
			
			foreach ($Array['Label'] AS $Llave => $Valor)
			{
				if($Llave=='style')
					$CamposLabel[] = (is_array($Valor)) ? SysMiscNeuralForm::OrganizarStyle($Valor) : '';
				elseif($Llave<>'texto')
					$CamposLabel[] = ($Valor == true) ? $Llave."=\"$Valor\"" : '';
			}
			
			$CamposLabelOrganizados = implode(' ', $CamposLabel);
			$ConstructorFinal = str_replace('{ CAMPOS_LABEL }', trim($CamposLabelOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ VALOR_LABEL }', $Array['Label']['texto'], $ConstructorFinal);
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				else
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $ConstructorFinal);
			$CantidadSaltoLinea = ($Array['SaltosLineas']>=1) ? $Array['SaltosLineas'] : '1';
			
			for ($i=1; $i<=$CantidadSaltoLinea; $i++) { $Saltos[] = '<br />'; }
			$SaltoLineas = implode("\n", $Saltos);
			return $ConstructorFinal.$SaltoLineas;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorPassword($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorPassword($Constructor, $Array) {
			
			foreach ($Array['Label'] AS $Llave => $Valor)
			{
				if($Llave=='style')
					$CamposLabel[] = (is_array($Valor)) ? SysMiscNeuralForm::OrganizarStyle($Valor) : '';
				elseif($Llave<>'texto')
					$CamposLabel[] = ($Valor == true) ? $Llave."=\"$Valor\"" : '';
			}
			
			$CamposLabelOrganizados = implode(' ', $CamposLabel);
			$ConstructorFinal = str_replace('{ CAMPOS_LABEL }', trim($CamposLabelOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ VALOR_LABEL }', $Array['Label']['texto'], $ConstructorFinal);
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				else
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $ConstructorFinal);
			$CantidadSaltoLinea = ($Array['SaltosLineas']>=1) ? $Array['SaltosLineas'] : '1';
			
			for ($i=1; $i<=$CantidadSaltoLinea; $i++) { $Saltos[] = '<br />'; }
			$SaltoLineas = implode("\n", $Saltos);
			return $ConstructorFinal.$SaltoLineas;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorTextHidden($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorTextHidden($Constructor, $Array) {
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				else
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			return $ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $Constructor);
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorText($Constructor, $Array)
		 * 
		 * Metodo de reutilizacion de clase abstracta para construir el formulario
		 * 
		 * @param $Array: Array asociativo con los datos del campo correspondiente
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorText($Constructor, $Array) {
			
			foreach ($Array['Label'] AS $Llave => $Valor)
			{
				if($Llave=='style')
					$CamposLabel[] = (is_array($Valor)) ? SysMiscNeuralForm::OrganizarStyle($Valor) : '';
				elseif($Llave<>'texto')
					$CamposLabel[] = ($Valor == true) ? $Llave."=\"$Valor\"" : '';
			}
			
			$CamposLabelOrganizados = implode(' ', $CamposLabel);
			$ConstructorFinal = str_replace('{ CAMPOS_LABEL }', trim($CamposLabelOrganizados), $Constructor);
			$ConstructorFinal = str_replace('{ VALOR_LABEL }', $Array['Label']['texto'], $ConstructorFinal);
			
			foreach ($Array['Campos'] as $LlaveCampo => $ValorCampo)
			{
				if($LlaveCampo=='style')
					$CamposInput[] = (is_array($ValorCampo)) ? SysMiscNeuralForm::OrganizarStyle($ValorCampo) : '';
				else
					$CamposInput[] = ($ValorCampo == true) ? $LlaveCampo."=\"$ValorCampo\"" : '';
			}

			$CamposInputOrganizados = implode(' ', $CamposInput);
			$ConstructorFinal = str_replace('{ CAMPOS }', trim($CamposInputOrganizados), $ConstructorFinal);
			$CantidadSaltoLinea = ($Array['SaltosLineas']>=1) ? $Array['SaltosLineas'] : '1';
			
			for ($i=1; $i<=$CantidadSaltoLinea; $i++) { $Saltos[] = '<br />'; }
			$SaltoLineas = implode("\n", $Saltos);
			return $ConstructorFinal.$SaltoLineas;
		}
		
		/**
		 * SysMiscNeuralForm::ConstructorFieldsetOpen($Constructor, $Array)
		 * 
		 * Metodo Contructor de Apertura del Fieldset
		 * 
		 * @param $Array: array asociativo con los datos a construir
		 * @param $Constructor: Array con los constructores html correspondientes
		 * 
		 */
		public static function ConstructorFieldsetOpen($Constructor, $Array) {
			
			foreach ($Array as $Llave => $Valor) {
				
				if($Llave=='style')
					$Campo[] = (is_array($Valor)) ? SysMiscNeuralForm::OrganizarStyle($Valor) : '';
				else
					$Campo[] = ($Valor == true) ? $Llave."=\"$Valor\"" : '';
			}
			
			$CamposOrganizados = implode(' ', $Campo);
			return str_replace('{ CAMPOS }', trim($CamposOrganizados), $Constructor);
		}
	}