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
	
	class NeuralJQueryValidacionFormulario {
		
		/**
		 * Requerido($idCampo, $Texto);
		 * 
		 * Regla: Genera un campo requerido
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function Requerido($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'required', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * RangoLongitud($idCampo, $ValorInicial, $ValorFinal, $Texto);
		 * 
		 * Regla: Genera un campo con el rango de la longitud ingresada por ejemplo entre 5 y 10 caracteres
		 * @param $idCampo: id del campo a validar
		 * @param $ValorInicial: Valor inicial del rango de longitud
		 * @param $ValorFinal: valor final del rango de longitud
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function RangoLongitud($idCampo, $ValorInicial, $ValorFinal, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'rangelength', 
				'valor' => '['.$ValorInicial.', '.$ValorFinal.']', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * RangoValor($idCampo, $ValorInicial, $ValorFinal, $Texto);
		 * 
		 * Regla: Genera un campo con el rango de dos valores
		 * @param $idCampo: id del campo a validar
		 * @param $ValorInicial: Valor inicial del rango
		 * @param $ValorFinal: valor final del rango
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function RangoValor($idCampo, $ValorInicial, $ValorFinal, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'range', 
				'valor' => '['.$ValorInicial.', '.$ValorFinal.']', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * Remote($idCampo, $URLValidacion, $Metodo, $Texto)
		 * 
		 * Regla: Peticion remota de validacion de dato ingresado, el valor regresado son echo "false" encontrado no pasa validacion, echo "true" no encontrado pasa la validacion
		 * @param $idCampo: id del campo a validar
		 * @param $URLValidacion: URL donde se realizara la validacion tipo ajax
		 * @param $Metodo: metodos soportados POST, GET
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function Remote($idCampo, $URLValidacion, $Metodo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'remote', 
				'valor' => '{ url: "'.$URLValidacion.'", type: "'.$Metodo.'", async: false }', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * Numero($idCampo, $Texto);
		 * 
		 * Regla: solo acepta datos numericos
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function Numero($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'number', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * EMail($idCampo, $Texto)
		 * 
		 * Regla: Valida estructura del email para que sea correcto
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function EMail($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'email', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * CantMinCaracteres($idCampo, $Cantidad, $Texto);
		 * 
		 * Reglas: Valida la cantidad de caracteres ingresados
		 * @param $idCampo: id del campo a validar
		 * @param $Cantidad: Cantidad de Caracteres
		 * @param $Texto: texto que se mostrara 
		 * 
		 * */
		public function CantMinCaracteres($idCampo, $Cantidad, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'minlength', 
				'valor' => $Cantidad, 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * CantMaxCaracteres($idCampo, $Cantidad, $Texto)
		 * 
		 * Reglas: Valida la cantidad de caracteres ingresados
		 * @param $idCampo: id del campo a validar
		 * @param $Cantidad: Cantidad de Caracteres
		 * @param $Texto: texto que se mostrara 
		 * 
		 * */
		public function CantMaxCaracteres($idCampo, $Cantidad, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'maxlength', 
				'valor' => $Cantidad, 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * ValorMinimo($idCampo, $Cantidad, $Texto);
		 * 
		 * Reglas: Valor numerico minimo a ingresar
		 * @param $idCampo: id del campo a validar
		 * @param $Cantidad: Cantidad numerica
		 * @param $Texto: texto que se mostrara 
		 * 
		 * */
		public function ValorMinimo($idCampo, $Cantidad, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'min', 
				'valor' => $Cantidad, 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * ValorMaximo($idCampo, $Cantidad, $Texto);
		 * 
		 * Reglas: Valor numerico maximo a ingresar
		 * @param $idCampo: id del campo a validar
		 * @param $Cantidad: Cantidad numerica
		 * @param $Texto: texto que se mostrara 
		 * 
		 * */
		public function ValorMaximo($idCampo, $Cantidad, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'max', 
				'valor' => $Cantidad, 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * URL($idCampo, $Texto);
		 * 
		 * Regla: valida direcciones http://www.dominio.com
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function URL($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'url', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * Fecha($idCampo, $Texto);
		 * 
		 * Regla: valida fechas con formato dia/mes/año
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function Fecha($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'date', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * FechaISO($idCampo, $Texto)
		 * 
		 * Regla: debe ser una fecha ISO válida AÑO-MES-DIA
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function FechaISO($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'dateISO', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * Digitos($idCampo, $Texto)
		 * 
		 * Regla: indica que solo se permiten números (0-9).
		 * @param $idCampo: id del campo a validar
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function Digitos($idCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'digits', 
				'valor' => 'true', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * ExtArchivo($idCampo, $Extensiones, $Texto)
		 * 
		 * Regla: indica que el elemento requiere una determinada extensión de archivo.
		 * @param $idCampo: id del campo a validar
		 * @param $Extensiones: Extension permitida
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		/*public function ExtArchivo($idCampo, $Extensiones, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'accept', 
				'valor' => '"'.$Extensiones.'"', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}*/
		
		/**
		 * IgualACampo($idCampo, $IdIgualCampo, $Texto);
		 * 
		 * Regla: Realiza la validacion del texto ingresado sea igual a otro campo asignado
		 * @param $idCampo: id del campo a validar
		 * @param $IdIgualCampo: campo al cual de comparara
		 * @param $Texto: texto que se mostrara
		 * 
		 * */
		public function IgualACampo($idCampo, $IdIgualCampo, $Texto) {
			
			$this->Validacion[$idCampo][] = array(
				'procedimiento' => 'equalTo', 
				'valor' => '"#'.$IdIgualCampo.'"', 
				'id' => $idCampo, 
				'mensaje' => $Texto
			);
		}
		
		/**
		 * SubmitHandler($Codigo);
		 * 
		 * Metodo para agregar codigo al validar el formulario
		 * se recomiendo utilizar esta opcion para envio de formulario post en AJAX
		 * 
		 * */
		public function SubmitHandler($Codigo) {
			
			$this->SubmitHandler[] = $Codigo;
		}
		
		/**
		 * MostrarValidacion($IdFormulario, $Impresion = 0)
		 * 
		 * Regla: Muestra la validacion correspondiente ya sea en el administrador de scripts o se imprima directamente
		 * @param $IdFormulario: id del formulario que se realizara la validacion
		 * @param $Impresion: valor por defecto 0: imprime en administrador de script 1: imprime directamente recursos necesarios
		 * 
		 * */
		public function MostrarValidacion($IdFormulario = false, $Impresion = 0) {
			
			if(isset($this->Validacion))
			{
				$Reglas = $this->OrganizarValidacionesReglas($this->Validacion);
				$Mensajes = $this->OrganizarValidacionesMensajes($this->Validacion);
				
				if($Impresion==0)
				{
					if(isset($this->SubmitHandler))
					{
						$Code = implode("\n", $this->SubmitHandler);
						return array(
							'JS' => array('JQUERY', 'VALIDATE'), 
							'SCRIPT' => $this->ContructorValidacionSubmitHandler($IdFormulario, $Reglas, $Mensajes, $Code)
						);
					}
					else
					{
						return array(
							'JS' => array('JQUERY', 'VALIDATE'), 
							'SCRIPT' => $this->ContructorValidacionOutSubmitHandler($IdFormulario, $Reglas, $Mensajes)
						);
					}
				}
				elseif($Impresion==1)
				{
					
				}
				
				unset($this->Validacion, $Mensajes, $Reglas);
			}
			else
			{
				return 'Lo Sentimos no hay seleccionada una regla de validacion';
			}
		}
		
		
		private function OrganizarValidacionesMensajes($Array) {
			
			foreach ($Array AS $Llave => $Valor)
			{
				$MensajeConstruido[] = "\t\t\t\t".$Llave.': {'.$this->ConstruirMensaje($Valor).'}';
			}
			
			return implode(', '."\n", $MensajeConstruido)."\n\t\t\t";
			unset($MensajeConstruido, $Array);
		}
		
		private function ConstruirMensaje($Array) {
			
			$Cantidad = count($Array);
			
			for ($i=0; $i<$Cantidad; $i++)
			{
				$Mensaje[] = $Array[$i]['procedimiento'].': "'.$Array[$i]['mensaje'].'"';
			}

			return implode(', ', $Mensaje);
			unset($Mensaje, $Array, $Cantidad);
		}
		
		
		private function OrganizarValidacionesReglas($Array) {
			
			foreach ($Array AS $Llave => $Valor)
			{
				$ReglaConstruida[] = "\t\t\t\t".$Llave.': {'.$this->ConstruirRegla($Valor).'}';
			}
			
			return implode(', '."\n", $ReglaConstruida)."\n\t\t\t";
			unset($ReglaConstruida, $Array);
		}
		
		private function ConstruirRegla($Array) {
			
			$Cantidad = count($Array);
			
			for ($i=0; $i<$Cantidad; $i++)
			{
				$Regla[] = $Array[$i]['procedimiento'].': '.$Array[$i]['valor'];
			}

			return implode(', ', $Regla);
			unset($Regla, $Cantidad, $Array);
		}
		
		private function ContructorValidacionOutSubmitHandler($IdFormulario, $Reglas, $Mensajes) {
			
			$Script = '<script type="text/javascript">'."\n";
			$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
			$Script .= '$("#'.$IdFormulario.'").validate({'."\n\t\t\t";
			$Script .= 'rules: {'."\n";
			$Script .= $Reglas;
			$Script .= '},'."\n\t\t\t";
			$Script .= 'messages: {'."\n";
			$Script .= $Mensajes;
			$Script .= '}'."\n\t\t";
			$Script .= '});'."\n\t";
			$Script .= '});'."\n";
			$Script .= '</script>'."\n";

			unset($Mensajes, $Reglas);
			return $Script;
		}
		
		private function ContructorValidacionSubmitHandler($IdFormulario, $Reglas, $Mensajes, $SubmitHandler) {
			
			$Script = '<script type="text/javascript">'."\n";
			$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
			$Script .= '$("#'.$IdFormulario.'").validate({'."\n\t\t\t";
			$Script .= 'rules: {'."\n";
			$Script .= $Reglas;
			$Script .= '},'."\n\t\t\t";
			$Script .= 'messages: {'."\n";
			$Script .= $Mensajes;
			$Script .= '},'."\n\t\t";
			$Script .= 'submitHandler: function(form) {'."\n\t\t\t";
			$Script .= $SubmitHandler;
			$Script .= '}'."\n\t\t";
			$Script .= '});'."\n\t";
			$Script .= '});'."\n";
			$Script .= '</script>'."\n";

			unset($Mensajes, $Reglas);
			return $Script;
		}
	}