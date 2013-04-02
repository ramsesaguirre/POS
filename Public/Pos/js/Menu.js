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
		$('#contenido').html('<span"><img src="img/ajax-loader.gif"  width="16" height="16" /> Cargando ...</span>');
		$('#contenido').load('Ayuda.php');
	});
	
	$("#tabss").delay(500).slideToggle(500);
	$("#usuario").delay(500).slideToggle(500);
	$("#opciones").delay(1000).slideToggle(500);
	$("#calls").delay(1500).slideToggle(500);

}
