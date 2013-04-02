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
	
	class NeuralJQueryAjax {
		
		/**
		 * NeuralJQueryAjax::SelectCargarPeticionGET($IdPrincipal = false, $IdSecundario = false, $URL = false, $DatoEnviado = false, $Impresion = 0);
		 * 
		 * Genera una peticion ajax para regresar datos segun donde sean aplicados
		 * @param $IdPrincipal: ID principal que se utiliza como punto de informacion
		 * @param $IdSecundario: ID donde se cargara la informacion
		 * @param $URL: direccion donde se realizara el proceso de validacion
		 * @param $DatoEnviado: nombre del dato enviado
		 * @example $_GET['DatoEnviado'];
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function SelectCargarPeticionGET($IdPrincipal = false, $IdSecundario = false, $URL = false, $DatoEnviado = false, $Impresion = 0) {
			
			if($Impresion==0)
			{
				return array(
					'JS' => array('JQUERY'), 
					'SCRIPT' => self::Constructor('SelectCargarPeticionGET', array('IdPrincipal' => $IdPrincipal, 'IdSecundario' => $IdSecundario, 'URL' => $URL, 'DatoEnviado' => $DatoEnviado))
				);
			}
			elseif($Impresion==1)
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::SelectCargarPeticionPOST($IdPrincipal = false, $IdSecundario = false, $URL = false, $DatoEnviado = false, $Impresion = 0);
		 * 
		 * Genera una peticion ajax para regresar datos segun donde sean aplicados
		 * @param $IdPrincipal: ID principal que se utiliza como punto de informacion
		 * @param $IdSecundario: ID donde se cargara la informacion
		 * @param $URL: direccion donde se realizara el proceso de validacion
		 * @param $DatoEnviado: nombre del dato enviado
		 * @example $_POST['DatoEnviado'];
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function SelectCargarPeticionPOST($IdPrincipal = false, $IdSecundario = false, $URL = false, $DatoEnviado = false, $Impresion = 0) {
			
			if($Impresion==0)
			{
				return array(
					'JS' => array('JQUERY'), 
					'SCRIPT' => self::Constructor('SelectCargarPeticionPOST', array('IdPrincipal' => $IdPrincipal, 'IdSecundario' => $IdSecundario, 'URL' => $URL, 'DatoEnviado' => $DatoEnviado))
				);
			}
			elseif($Impresion==1)
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::LinkCargarPagina($IDLink = false, $IDMostrar = false, $URL, $Impresion = 0);
		 * 
		 * Carga la url correspondiente a traves de los datos de la etiqueta <a></a>
		 * @param $IDLink: ID del link que se utilizara como iniciador de envio de datos
		 * @param $IDMostrar: ID del div donde se mostrara la informacion
		 * @param $URL: direccion donde se realizara el proceso de validacion
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function LinkCargarPagina($IDLink = false, $IDMostrar = false, $URL, $Impresion = 0) {
			
			if($Impresion==0)
			{
				return array(
					'JS' => array('JQUERY'), 
					'SCRIPT' => self::Constructor('LinkCargarPagina', array('IDLink' => $IDLink, 'IDMostrar' => $IDMostrar, 'URL' => $URL))
				);
			}
			elseif($Impresion==1)
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::LinkEnviarPeticionPOST($IDLink, $IDMostrar, $URL, $DatosEnviados = false, $Impresion = 0);
		 * 
		 * Envia datos post a traves de un link y los carga en el div id para mostrar
		 * @param $IDLink: ID del link que se utilizara como iniciador de envio de datos
		 * @param $IDMostrar: ID del div donde se mostrara la informacion
		 * @param $URL: direccion donde se realizara el proceso de validacion
		 * @param $DatosEnviados: Array asociativo donde se envian los datos correspondientes
		 * @example array('usuario' => 'admin', 'estado' => 'activo'):
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function LinkEnviarPeticionPOST($IDLink = false, $IDMostrar = false, $URL, $DatosEnviados = false, $Impresion = 0) {
			
			if($Impresion==0)
			{
				if(is_array($DatosEnviados))
				{
					return array(
						'JS' => array('JQUERY'), 
						'SCRIPT' => self::Constructor('LinkEnviarPeticionPOST', array('IDLink' => $IDLink, 'IDMostrar' => $IDMostrar, 'URL' => $URL, 'DatosEnviados' => $DatosEnviados))
					);
				}
			}
			elseif($Impresion==1)
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::EnviarFormularioPOST($IdFormulario, $IdRespuesta, $URL, $Formulario = false, $Aplicacion = 'DEFAULT', $DataType = 'html', $Impresion = 0);
		 * 
		 * Genera el envio de un formulario por metodo ajax, se recomienda utilizar junto con la clase de validacion de formularios para validacion antes de envio de los datos
		 * @param $IdFormulario: ID del formulario
		 * @param $IdRespuesta: Id de la etiqueta donde se cargara la respuesta correspondiente
		 * @param $URL: direccion donde se enviaran los datos del formulario
		 * @param $Formulario: valor true para utilizar junto con la clase de validacion de formularios, valor por defecto false
		 * @param $ImgLoader: tipo de configuracion de scripts valor por defecto DEFAULT
		 * @param $DataType: tipo de dato que se enviaran a la direccion correspondiente valor por defecto html
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function EnviarFormularioPOST($IdFormulario, $IdRespuesta, $URL, $Formulario = false, $Aplicacion = 'DEFAULT', $DataType = 'html', $Impresion = 0) {
			
			if($Impresion==0)
			{
				$Constructor =self::Constructor('EnviarFormularioPOST', array('IdFormulario' => $IdFormulario, 'IdRespuesta' => $IdRespuesta, 'URL' => $URL, 'DataType' => $DataType, 'ImgLoader' => $Aplicacion));
				
				if($Formulario)
				{
					return $Constructor['APLICACION'];
				}
				else
				{
					return array(
						'JS' => array('JQUERY'), 
						'SCRIPT' => implode('', $Constructor)
					);
				}
			}
			elseif($Impresion==1)
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::CargarContenidoAutomatico($IDCargar = false, $URL = false, $Impresion = 0);
		 * 
		 * Cargar dinamicamente el contenido en una etiqueta
		 * @param $IDCargar: ID de la etiqueta donde se cargara la informacion
		 * @param $URL: direccion del contenido correspondiente
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function CargarContenidoAutomatico($IDCargar = false, $URL = false, $Impresion = 0) {
			
			if($Impresion == 0)
			{
				return array(
						'JS' => array('JQUERY'), 
						'SCRIPT' => self::Constructor('CargarContenidoAutomatico', array('IDCargar' => $IDCargar, 'URL' => $URL))
					);
			}
			else
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::CargarContenidoAutomaticoIntervaloTiempo($IDCargar = false, $URL = false, $Tiempo = 300, $Impresion = 0);
		 * 
		 * Cargar dinamicamente el contenido en una etiqueta
		 * @param $IDCargar: ID de la etiqueta donde se cargara la informacion
		 * @param $URL: direccion del contenido correspondiente
		 * @param $Tiempo: Valor por defecto 300 Segundos (5 Min), valor en segundos de la duracion de la recarga de la etiqueta correspondiente
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function CargarContenidoAutomaticoIntervaloTiempo($IDCargar = false, $URL = false, $Tiempo = 300, $Impresion = 0) {
			
			if($Impresion == 0)
			{
				return array(
						'JS' => array('JQUERY'), 
						'SCRIPT' => self::Constructor('CargarContenidoAutomaticoIntervaloTiempo', array('IDCargar' => $IDCargar, 'URL' => $URL, 'Tiempo' => $Tiempo))
					);
			}
			else
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::CargarContenidoAutomaticoPeticionPOST($IDCargar = false, $URL = false, $DatosEnviados = false, $Impresion = 0);
		 * 
		 * Cargar dinamicamente el contenido en una etiqueta
		 * @param $IDCargar: ID de la etiqueta donde se cargara la informacion
		 * @param $URL: direccion del contenido correspondiente
		 * @param $DatosEnviados: Array asociativo donde se envian los datos correspondientes
		 * @example array('usuario' => 'admin', 'estado' => 'activo'):
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function CargarContenidoAutomaticoPeticionPOST($IDCargar = false, $URL = false, $DatosEnviados = false, $Impresion = 0) {
			
			if($Impresion==0)
			{
				if(is_array($DatosEnviados))
				{
					return array(
						'JS' => array('JQUERY'), 
						'SCRIPT' => self::Constructor('CargarContenidoAutomaticoPeticionPOST', array('IDCargar' => $IDCargar, 'URL' => $URL, 'DatosEnviados' => $DatosEnviados))
					);
				}
			}
			elseif($Impresion==1)
			{
				
			}
		}
		
		/**
		 * NeuralJQueryAjax::CargarContenidoAutomaticoIntervaloTiempoPeticionPOST($IDCargar = false, $URL = false, $DatosEnviados = false, $Tiempo = 300, $Impresion = 0);
		 * 
		 * Cargar dinamicamente el contenido en una etiqueta
		 * @param $IDCargar: ID de la etiqueta donde se cargara la informacion
		 * @param $URL: direccion del contenido correspondiente
		 * @param $DatosEnviados: Array asociativo donde se envian los datos correspondientes
		 * @example array('usuario' => 'admin', 'estado' => 'activo'):
		 * @param $Tiempo: Valor por defecto 300 Segundos (5 Min), valor en segundos de la duracion de la recarga de la etiqueta correspondiente
		 * @param $Impresion: valor por defecto 0 para utilizar con el administrador de scripts
		 * 
		 * */
		public static function CargarContenidoAutomaticoIntervaloTiempoPeticionPOST($IDCargar = false, $URL = false, $DatosEnviados = false, $Tiempo = 300, $Impresion = 0) {
			
			if($Impresion == 0)
			{
				return array(
						'JS' => array('JQUERY'), 
						'SCRIPT' => self::Constructor('CargarContenidoAutomaticoIntervaloTiempoPeticionPOST', array('IDCargar' => $IDCargar, 'URL' => $URL, 'Tiempo' => $Tiempo, 'DatosEnviados' => $DatosEnviados))
					);
			}
			else
			{
				
			}
		}

		private function Constructor($Tipo, $Array) {
			
			if($Tipo == 'SelectCargarPeticionGET')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= '$("#'.$Array['IdPrincipal'].'").change(function(event){'."\n\t\t\t";
				$Script .= 'var id = $("#'.$Array['IdPrincipal'].'").find(\':selected\').val();'."\n\t\t\t";
				$Script .= '$("#'.$Array['IdSecundario'].'").load(\''.$Array['URL'].'?'.$Array['DatoEnviado'].'=\'+id);'."\n\t\t";
				$Script .= '});'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'SelectCargarPeticionPOST')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= '$("#'.$Array['IdPrincipal'].'").change(function() {'."\n\t\t\t";
				$Script .= '$("#'.$Array['IdPrincipal'].' option:selected").each(function() {'."\n\t\t\t\t";
				$Script .= $Array['DatoEnviado'].' = $(this).val();'."\n\t\t\t\t";
				$Script .= '$.post("'.$Array['URL'].'", { '.$Array['DatoEnviado'].': '.$Array['DatoEnviado'].' }, function(data){'."\n\t\t\t\t\t";
				$Script .= '$("#'.$Array['IdSecundario'].'").html(data);'."\n\t\t\t\t";
				$Script .= '});'."\n\t\t\t";
				$Script .= '});'."\n\t\t";
				$Script .= '});'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'LinkEnviarPeticionPOST')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= '$("#'.$Array['IDLink'].'").click(function(evento){'."\n\t\t\t";
				$Script .= 'evento.preventDefault();'."\n\t\t\t";
				$Script .= '$("#'.$Array['IDMostrar'].'").load("'.$Array['URL'].'", {'.self::OrganizarArrayLinkPost($Array['DatosEnviados']).'});'."\n\t\t";
				$Script .= '});'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'EnviarFormularioPOST')
			{
				$ConstructorImagen = self::ConstructorLoader($Array['ImgLoader']);
				
				$ScriptHead = '<script type="text/javascript">'."\n";
				$ScriptHead .= "\t".'$(document).ready(function(){'."\n\t\t";
				$ScriptHead .= '$("#'.$Array['IdFormulario'].'").submit(function(){'."\n\t\t\t";
				
				$EFAjax['HEAD'] = $ScriptHead;
				
				$ScriptApp = '$.ajax({'."\n\t\t\t\t";
				$ScriptApp .= 'type: "POST", '."\n\t\t\t\t";
				$ScriptApp .= 'url: "'.$Array['URL'].'", '."\n\t\t\t\t";
				$ScriptApp .= 'dataType: "'.$Array['DataType'].'", '."\n\t\t\t\t";
				$ScriptApp .= 'data: $("#'.$Array['IdFormulario'].'").serialize(), '."\n\t\t\t\t";
				$ScriptApp .= 'beforeSend:function(){'."\n\t\t\t\t\t";
				$ScriptApp .= '$("#'.$Array['IdRespuesta'].'").html(\''.$ConstructorImagen.'\');'."\n\t\t\t\t";
				$ScriptApp .= '},'."\n\t\t\t\t";
				$ScriptApp .= 'success: function(response){'."\n\t\t\t\t\t";
				$ScriptApp .= '$("#'.$Array['IdRespuesta'].'").html(response);'."\n\t\t\t\t";
				$ScriptApp .= '}'."\n\t\t\t";
				$ScriptApp .= '})'."\n\t\t\t";
				
				$EFAjax['APLICACION'] = $ScriptApp;
				
				$ScriptFooter = 'return false;'."\n\t\t";
				$ScriptFooter .= '})'."\n\t";
				$ScriptFooter .= '});'."\n";
				$ScriptFooter .= '</script>'."\n";
				
				$EFAjax['FOOTER'] = $ScriptFooter;
				
				unset($ConstructorImagen);
				
				return $EFAjax;
			}
			elseif($Tipo == 'CargarContenidoAutomatico')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= '$("#'.$Array['IDCargar'].'").load(\''.$Array['URL'].'\');'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'CargarContenidoAutomaticoIntervaloTiempo')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= 'var refreshId = setInterval(function() {'."\n\t\t\t";
				$Script .= '$("#'.$Array['IDCargar'].'").load(\''.$Array['URL'].'\');'."\n\t\t";
				$Script .= '}, '.$Array['Tiempo'].'000);'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'LinkCargarPagina')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= '$("#'.$Array['IDLink'].'").click(function(evento){'."\n\t\t\t";
				$Script .= 'evento.preventDefault();'."\n\t\t\t";
				$Script .= '$("#'.$Array['IDMostrar'].'").load("'.$Array['URL'].'");'."\n\t\t";
				$Script .= '});'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'CargarContenidoAutomaticoPeticionPOST')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= '$("#'.$Array['IDCargar'].'").load(\''.$Array['URL'].'\', {'.self::OrganizarArrayLinkPost($Array['DatosEnviados']).'});'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
			elseif($Tipo == 'CargarContenidoAutomaticoIntervaloTiempoPeticionPOST')
			{
				$Script = '<script type="text/javascript">'."\n";
				$Script .= "\t".'$(document).ready(function(){'."\n\t\t";
				$Script .= 'var refreshId = setInterval(function() {'."\n\t\t\t";
				$Script .= '$("#'.$Array['IDCargar'].'").load(\''.$Array['URL'].'\', {'.self::OrganizarArrayLinkPost($Array['DatosEnviados']).'});'."\n\t\t";
				$Script .= '}, '.$Array['Tiempo'].'000);'."\n\t";
				$Script .= '});'."\n";
				$Script .= '</script>'."\n";
				
				return $Script;
			}
		}
		
		private function ConstructorLoader($Aplicacion) {
			
			$ArrayApp = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionScripts.yaml');
			$ClassContenedor = ($ArrayApp[$Aplicacion]['LOADER']['CLASS']['CONTENEDOR']['CLASS'] == 'DESACTIVADO') ? '': ' class="'.$ArrayApp[$Aplicacion]['LOADER']['CLASS']['CONTENEDOR']['CLASS'].'"';
			$ClassImagen = ($ArrayApp[$Aplicacion]['LOADER']['CLASS']['IMAGEN']['CLASS'] == 'DESACTIVADO') ? '': ' class="'.$ArrayApp[$Aplicacion]['LOADER']['CLASS']['IMAGEN']['CLASS'].'"';
			
			$StyleContenedor = ($ArrayApp[$Aplicacion]['LOADER']['CLASS']['CONTENEDOR']['STYLE'] == 'DESACTIVADO') ? '': ' '.SysMiscNeuralForm::OrganizarStyle($ArrayApp[$Aplicacion]['LOADER']['STYLE']['CONTENEDOR']);
			$StyleImagen = ($ArrayApp[$Aplicacion]['LOADER']['CLASS']['IMAGEN']['STYLE'] == 'DESACTIVADO') ? '': ' '.SysMiscNeuralForm::OrganizarStyle($ArrayApp[$Aplicacion]['LOADER']['STYLE']['IMAGEN']);
			
			return '<div'.$ClassContenedor.$StyleContenedor.'><img src="'.NeuralRutasBase::RutaBase($ArrayApp[$Aplicacion]['LOADER']['LOADER']).'" alt=""'.$ClassImagen.$StyleImagen.' /></div>';
			
			unset($Aplicacion, $ArrayApp, $ClassContenedor, $ClassImagen, $StyleContenedor, $StyleImagen);
		}
		
		private function OrganizarArrayLinkPost($Array) {
			
			foreach ($Array AS $Llave => $Valor)
			{
				$Datos[] = $Llave.': "'.$Valor.'"';
			}
			
			unset($Array);
			return implode(', ', $Datos);
		}
	}