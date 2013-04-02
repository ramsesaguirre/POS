
<div id="menu">
	<div id="usuario">
   	    <ul>
     	  <li><a href="#usuario-1">USUARIO</a></li>
   	    </ul>
	<div id="usuario-1">
	<table>
    	<tr>
  			<td><img src="<?php echo NeuralRutasApp::RutaImagenes('username.gif'); ?>" width="32" height="32" /></td>
			<td><span style="font-size:8px;text-align:center;" valign="middle" align="absmiddle"><?php echo utf8_decode($this->Usuario); ?></span><br /> 
		</td>
    	</tr>
  	</table>
	</div>
    </div>

	<div id="opciones">
		<br />
		<div>
            <h3><a href="#">CONFIGURACIÓN</a></h3>
				<div>
		  			<a href="#" id="DatosGenerales">Datos Generales</a><br />
                    <a href="#" id="Ticket">Ticket</a><br />
                    <a href="#" id="ControlAccesos">Control de Accesos</a><br />
				</div>
			<h3><a href="#">CONTROL DE ALMACÉN</a></h3>
				<div>
		  			<a href="#" id="Almacen">Entradas/Existencias</a><br />
                    <a href="#">Listado de movimientos</a><br />
				</div>
            <h3><a href="#">PANEL DE ARTÍCULOS</a></h3>
				<div>
                    <a href="#">Catalogo de Unidades</a><br />
		  			<a href="#" id="catAseguradoras">Catalogo de Categoría</a><br />
                    <a href="#">Catalogo de Artículos</a><br />
                    <a href="#" id="ImpresionCodigo">Impresión de código</a><br />
				</div>
			<h3><a href="#">CONSULTAS/REPORTES</a></h3>
				<div>
		  			<a href="#" id="catPreguntas">Reportes por dia</a><br />
		  			<a href="#" id="catRespuestas">Reportes personalizados</a><br />
				</div>
      		<h3><a href="#">PUNTO DE VENTA</a></h3>
				<div>
                	<a href="#" id="catExpedientes" >Terminal de Venta</a><br />
				</div>
			<h3><a href="#">AYUDA</a></h3>
				<div>
		  			<a href="#" id="Ayuda">Guia de referencia</a><br />
				</div>
			<h3><a href="#">SALIR</a></h3>
				<div>
		  			<a href="<?php echo NeuralRutasApp::RutaURL('Login/Logout/1'); ?>">Salir del sistema</a><br />
				</div>
  		</div>
	</div> 
	<br />
    <div id="calls">
   	<ul>
     	<li><a href="#calls-1">CONTACTANOS</a></li>
   	</ul>
	<div id="calls-1">
    	<table>
      		<tr>
  	  			<td><img src="<?php echo NeuralRutasApp::RutaImagenes('email.gif'); ?>" width="48" height="48" /></td>
	  			<td><span style="font-size:9px;">Contactanos via email.</span><br /> 
	  			</td>
      		</tr>
            <tr>
            	<td colspan="2">
                  <br />
            	  <center>
            	    <input id="call" type="button" disabled="disabled" value="Cargando..." />
            	    <span id="status" style="font-size:9px; color:#24759B;"></span>
           	      </center>
                  </td>
           	</tr>
  		</table>
	</div>
<br />    
    
</div>
</div>

<script type="text/javascript">
$(document).on("ready",inicio);

function inicio(){
	
	var icons = {
			header: "ui-icon-circle-arrow-e",
			headerSelected: "ui-icon-circle-arrow-s"
		};
	
	$('input:button').button();
	$('#calls').tabs();
	$('#usuario').tabs();
	$('#tabss').tabs();
	
	$('#tabss').hide();
	$('#usuario').hide();
	$('#opciones').hide();
	$('#calls').hide();
	
		
	// Menu Principal
	$("#opciones").accordion({ 
		//heightStyle: "content",
		autoHeight: false,
		navigation: true,
		icons: icons,
		header: "h3"
	});
	
	$('#DatosGenerales').click(function(){
		$('#contenido').html('<span><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>" width="16" height="16" /><strong> Cargando ...</strong></span>');
		$('#contenido').load("<?php echo NeuralRutasApp::RutaURL('DatosEmpresa/Index'); ?>");
	});
    
    $('#Ticket').click(function(){
		$('#contenido').html('<span><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>" width="16" height="16" /><strong> Cargando ...</strong></span>');
		$('#contenido').load("<?php echo NeuralRutasApp::RutaURL('Ticket/Index'); ?>");
	});
    
    $('#ControlAccesos').click(function(){
		$('#contenido').html('<span><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>" width="16" height="16" /><strong> Cargando ...</strong></span>');
		$('#contenido').load("<?php echo NeuralRutasApp::RutaURL('ControlAccesos/Index'); ?>");
	});

    $('#Almacen').click(function(){
		$('#contenido').html('<span><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>" width="16" height="16" /><strong> Cargando ...</strong></span>');
		$('#contenido').load("<?php echo NeuralRutasApp::RutaURL('Almacen/Index'); ?>");
	});
    
    $('#ImpresionCodigo').click(function(){
		$('#contenido').html('<span><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>" width="16" height="16" /><strong> Cargando ...</strong></span>');
		$('#contenido').load("<?php echo NeuralRutasApp::RutaURL('ImpresionCodigo/Index'); ?>");
	});
	
	$('#Ayuda').click(function(){
		$('#contenido').html('<span"><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('Ayuda.php');
	});
	
	$("#tabss").delay(500).slideToggle(500);
	$("#usuario").delay(500).slideToggle(500);
	$("#opciones").delay(1000).slideToggle(500);
	$("#calls").delay(1500).slideToggle(500);

}
</script>
