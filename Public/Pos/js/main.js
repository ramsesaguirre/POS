$(document).ready(inicio);

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
	
	/*
	$('#phono').button({
		icons: {
                primary: "ui-icon-circle-triangle-e"
            }
	});*/
	
	// Menu Principal
	$("#opciones").accordion({ 
		//heightStyle: "content",
		autoHeight: false,
		navigation: true,
		icons: icons,
		header: "h3"
	});
	
	$('#catCentros').click(function(){
		$('#contenido').html('<span><img src="<?php echo NeuralRutasApp::RutaImagenes("ajax-loader.gif"); ?>" width="16" height="16" /><strong> Cargando ...</strong></span>');
		$('#contenido').load("<?php echo NeuralRutasApp::RutaURL('DatosEmpresa/Index'); ?>");
	});
	$('#catUsuarios').click(function(){
		$('#contenido').html('<span><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('catUsuarios.php');
	});
	$('#capConsultorio').click(function(){
		$('#contenido').html('<span><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('capConsultorio.php');
	});
	$('#catAseguradoras').click(function(){
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('catAseguradoras.php');
	});
	$('#catPreguntas').click(function(){
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('catPreguntas.php');
	});
	$('#catRespuestas').click(function(){
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('catRespuestas.php');
	});
	$('#catExpedientes').click(function(){
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('catExpedientes.php');
	});
	$('#catGraficas').click(function(){
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('catGraficas.php');
	});
	
	$('#Ayuda').click(function(){
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('Ayuda.php');
	});
	
	$("#tabss").delay(500).slideToggle(500);
	$("#usuario").delay(500).slideToggle(500);
	$("#opciones").delay(1000).slideToggle(500);
	$("#calls").delay(1500).slideToggle(500);

}