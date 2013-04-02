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
	
	abstract class NeuralTagHTML {
		
		/**
		 * TagLink($Direccion, $Texto, $Propiedades =false)
		 * 
		 * $Direccion: Direccion a la cual debe enviar
		 * $Texto: Texto del Hipervinculo
		 * 
		 * $Target: el cual se utilizara para redireccionar la apertura del link
		 * los soportados por el $Target son:
		 * _top: carga en la misma pagina o en el marco principal
		 * _blank: abre una pagina en blanco o pestaña en blanco
		 * _self: carga en la misma pagina
		 * _new: carga en una nueva ventana
		 * 
		 * $Css: la clase de hoja de estilos que se le aplica
		**/
		public static function TagLink($Direccion, $Texto, $Target = false, $Css = false) {
			
			$Target=($Target==true) ? ' target="'.$Target.'" ' : '';
			$Css=($Css==true) ? 'class="'.$Css.'" ' : '';
			
			return "<a href=\"".$Direccion."\"".$Target.$Css.">".$Texto."</a>\n";
		}
		
		/**
		 * TagLink($Direccion, $Texto, $Propiedades =false)
		 * 
		 * $Direccion: Direccion a la cual debe enviar
		 * $Propiedades: es una array que soporta los siguientes datos
		 * 
		 * width: ancho en % o px
		 * height: alto en % o px
		 * class: Hoja de estilos
		 * title: texto de la imagen
		 * alt: texto alternativo de la imagen
		**/
		public static function TagImagen($Direccion, $Propiedades=array()) {
			
			if(count($Propiedades)>=1)
			{
				foreach($Propiedades AS $key => $value)
				{
					$Informacion[trim(mb_strtolower($key))]=trim($value);
				}
			}
			else
			{
				$Informacion=array();
			}
			
			$width=(array_key_exists('width', $Informacion))? ' width="'.$Informacion['width'].'"' : '';
			$height=(array_key_exists('height', $Informacion))? ' height="'.$Informacion['height'].'"' : '';
			$class=(array_key_exists('class', $Informacion))? ' class="'.$Informacion['class'].'"' : '';
			$title=(array_key_exists('title', $Informacion))? ' title="'.$Informacion['title'].'"' : '';
			$alt=(array_key_exists('alt', $Informacion))? ' alt="'.$Informacion['alt'].'"' : '';
			
			return "<img src=\"".$Direccion."\"".$width.$height.$title.$alt.$class."/>\n";
		}
		
		/**
		 * TagH1($Texto, $Css = false)
		 * 
		 * $Texto: Texto a Ingresar
		 * $Css: hoja de estilos
	 	**/
	 	public static function TagH1($Texto, $Css = false) {
	 		
	 		$Class=($Css==true)? ' class="'.$Css.'"' : '';
	 		
	 		return "<h1".$Class.">".$Texto."</h1>\n";
	 	}
	 	
	 	/**
		 * TagH2($Texto, $Css = false)
		 * 
		 * $Texto: Texto a Ingresar
		 * $Css: hoja de estilos
	 	**/
	 	public static function TagH2($Texto, $Css = false) {
	 		
	 		$Class=($Css==true)? ' class="'.$Css.'"' : '';
	 		
	 		return "<h2".$Class.">".$Texto."</h2>\n";
	 	}
	 	
	 	/**
		 * TagH3($Texto, $Css = false)
		 * 
		 * $Texto: Texto a Ingresar
		 * $Css: hoja de estilos
	 	**/
	 	public static function TagH3($Texto, $Css = false) {
	 		
	 		$Class=($Css==true)? ' class="'.$Css.'"' : '';
	 		
	 		return "<h3".$Class.">".$Texto."</h3>\n";
	 	}
	 	
	 	/**
		 * TagH4($Texto, $Css = false)
		 * 
		 * $Texto: Texto a Ingresar
		 * $Css: hoja de estilos
	 	**/
	 	public static function TagH4($Texto, $Css = false) {
	 		
	 		$Class=($Css==true)? ' class="'.$Css.'"' : '';
	 		
	 		return "<h4".$Class.">".$Texto."</h4>\n";
	 	}
	 	
	 	/**
		 * TagDiv($Texto, $Css = false, $Style = false)
		 * 
		 * $Texto: Texto a Ingresar
		 * $Css: hoja de estilos
		 * 
		 * $Style: es una array donde se colocan como valor asociado
		 * array('font-family' => 'verdana')
	 	**/
	 	public static function TagDiv($Texto, $id = false, $Css = false, $Style = false) {
	 		
	 		$Class=($Css==true)? ' class="'.$Css.'"' : '';
	 		$ID = ($id==true) ? ' id="'.$id.'"' : '';
	 		
	 		if($Style==true)
	 		{
	 			$Estilo=' style="';
	 			foreach ($Style AS $key => $value)
	 			{
	 				$Estilo .=$key.': '.$value.'; ';
	 			}
	 			$Estilo .='"';
	 		}
	 		else
	 		{
	 			$Estilo='';
	 		}
	 		
	 		return "<div".$ID.$Class.$Estilo.">".$Texto."</div>\n";
	 	}
	 	
	 	/**
		 * TagP($Texto, $Css = false, $Style = false)
		 * 
		 * $Texto: Texto a Ingresar
		 * $Css: hoja de estilos
		 * 
		 * $Style: es una array donde se colocan como valor asociado
		 * array('font-family' => 'verdana')
	 	**/
	 	public static function TagP($Texto, $Css = false, $Style = false) {
	 		
	 		$Class=($Css==true)? ' class="'.$Css.'"' : '';
	 		
	 		if($Style==true)
	 		{
	 			$Estilo=' style="';
	 			foreach ($Style AS $key => $value)
	 			{
	 				$Estilo .=$key.': '.$value.'; ';
	 			}
	 			$Estilo .='"';
	 		}
	 		else
	 		{
	 			$Estilo='';
	 		}
	 		
	 		return "<p".$Class.$Estilo.">".$Texto."</p>\n";
	 	}
	 	
	 	/**
		 * TagObjectFlash($Archivo, $Ancho = false, $Alto = false)
		 * 
		 * $Archivo: Direccion completa donde se encuentra el archivo
		 * $Ancho: es el width si no se ingresa valor lo genera por defecto 800
		 * $Alto: es el Height si no se ingresa valor lo genera por defecto 600
	 	**/
	 	public static function TagObjectFlash($Archivo, $Ancho = false, $Alto = false) {
	 		
	 		$Ancho=($Ancho==true)? $Ancho : '800';
	 		$Alto=($Alto==true)? $Alto : '600';
	 		
	 		$Objeto="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab\#version=6,0,29,0\" width=\"".$Ancho."\" height=\"".$Alto."\">\n";
	 		$Objeto .="<param name=\"movie\" value=\"".$Archivo."\"></param>\n";
	 		$Objeto .="<param name=\"quality\" value=\"high\"></param>\n";
	 		$Objeto .="<embed src=\"".$Archivo."\" width=\"".$Ancho."\" height=\"".$Alto."\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"></embed>\n";
	 		$Objeto .="</object>\n";
	 		
	 		return $Objeto;
	 	}
	 	
	 	/**
		 * TagIFrame($Direccion, $Propiedades = array(), $Css = array())
		 * 
		 * $Direccion: Direccion completa donde se encuentra el archivo
		 * $Propiedades: son soportadas las siguientes propiedades
		 * -name: Este valor actúa como indentificador para el marco, el cual puede utilizarse en vínculos y formularios como valor "target".
		 * -class: hoja de estilos si se tiene creado
		 * -title: titulo de iframe
		 * -longdesc: descripcion larga del iframe
		 * 
		 * -scrolling: muestra las barras de desplazamiento
		 * Valores: 
		 * auto: los disposibtivos de desplazamiento son mostrados únicamente cuando es necesario
		 * yes: los disposibtivos de desplazamiento son mostrados siempre.
		 * no: los dispositivos de desplazamiento no son provistos nunca.
		 * 
		 * -frameborder: mostrar borde o no 1: Si, 2: No
		 * -marginwidth: Establece la distancia entre el contenido del marco y el margen izquiero o derecho.
		 * -marginheight: Establece la distancia entre el contenido del marco y el margen superior o inferior.
		 * -width: Establece ancho del iframe
		 * -height: Establece la altura del iframe
		 * -id: identificador
	 	**/
	 	public static function TagIFrame($Direccion, $Propiedades = array(), $Css = array()) {
	 		
	 		if(count($Propiedades)>=1)
			{
				foreach($Propiedades AS $key => $value)
				{
					$Informacion[trim(mb_strtolower($key))]=trim($value);
				}
				
				(array_key_exists('name', $Informacion))? $Informacion['name'].'"' : '';
				(array_key_exists('class', $Informacion))? $Informacion['class'].'"' : '';
				(array_key_exists('title', $Informacion))? $Informacion['title'].'"' : '';
				(array_key_exists('longdesc', $Informacion))? $Informacion['longdesc'].'"' : '';
				(array_key_exists('scrolling', $Informacion))? ' ="'.$Informacion['scrolling'].'"' : '';
				(array_key_exists('frameborder', $Informacion))? ' ="'.$Informacion['frameborder'].'"' : '';
				(array_key_exists('marginwidth', $Informacion))? ' ="'.$Informacion['marginwidth'].'"' : '';
				(array_key_exists('marginheight', $Informacion))? ' ="'.$Informacion['marginheight'].'"' : '';
				(array_key_exists('width', $Informacion))? ' ="'.$Informacion['width'].'"' : '';
				(array_key_exists('height', $Informacion))? ' ="'.$Informacion['height'].'"' : '';
				(array_key_exists('id', $Informacion))? ' ="'.$Informacion['id'].'"' : '';
				
				foreach ($Informacion AS $key => $value)
				{
					$DatosPropiedades[]=$key.'="'.$value.'"';
				}
				
				$ValidPropiedades=' '.implode(" ", $DatosPropiedades);
				
			}
			else
			{
				$ValidPropiedades='';
			}
			
			
			if(count($Css)>=1)
			{
				foreach ($Css AS $key => $value)
	 			{
	 				$Estilo[]=$key.': '.$value.';';
	 			}
	 			
	 			$HojaCss=' style="'.implode(" ", $Estilo).'"';
			}
			else
			{
				$HojaCss='';
			}
			
			return "<iframe src=\"".$Direccion."\"".$ValidPropiedades.$HojaCss.">Su Navegador No Soporta los iframes</iframe>";
	 	}
	 	
	 	/**
	 	 * AjaxDivImgCargando($Imagen = array('NEURAL' => 'neural_load.gif'), $Style = false)
	 	 * 
		  * @param $Imagen: array asociativo generado de la siguiente forma
	 	 * array('NEURAL' => 'neural_load.gif'): parametros para cargar las imagenes de las librerias de Neural
	 	 * array('URL' => 'http://mis-imagenes.com/load.gif'): parametros para cargar imagenes en otro directorio o web
	 	 * 
	 	 * @param $Style: array asociativo para las propiedades y valores de css
	 	 * 
	 	**/
	 	public static function AjaxDivImgCargando($IdDiv, $Imagen = array('NEURAL' => 'neural_load.gif'), $Style = false) {
	 		
	 		if($Style==true)
	 		{
	 			$Estilo='display:none; ';
	 			foreach ($Style AS $key => $value)
	 			{
	 				$Estilo .=$key.': '.$value.'; ';
	 			}
	 		}
	 		else
	 		{
	 			$Estilo='display:none;';
	 		}
	 		
	 		if(isset($Imagen['NEURAL']))
	 		{
	 			$URLImagen = NeuralRutasBase::RutaBase('Public/Images/Load/'.$Imagen['NEURAL']);
	 		}
	 		elseif(isset($Imagen['URL']))
	 		{
	 			$URLImagen = $Imagen['URL'];
	 		}
	 		
	 		return '<div id="'.$IdDiv.'" style="'.$Estilo.' vertical-align: middle; text-align: center">'.NeuralTagHTML::TagImagen($URLImagen, array('alt' => 'Cargando.....', 'title' => 'Cargando.....', 'width' => '40px', 'height' => '40px')).' Cargando.....</div>';
	 	}
	}
