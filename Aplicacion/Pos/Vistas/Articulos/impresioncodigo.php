
<div id="tabs">
   	    <ul>
     	  <li><a href="#tabs-1">IMPRESION DE ETIQUETAS</a></li>
   	    </ul>
        <div id="tabs-1">
   		
<br />

<form>
<table>
  <tr>
    <td width="120"><div id="bcTarjet"></div></td>
    <td>
    <table>
  <tr>
    <td>Codigo</td>
    <td><input name="codigo" type="text" id="codigo" placeholder="Codigo" size="15" onChange="generateBarcode()" onKeyUp="generateBarcode()" /></td>
    </tr>
  <tr>
    <td>Descripcion</td>
    <td></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  </table>
    </td>
  </tr>
</table>
  </form>
  <center>
  <span class="BtnGuardar"></span>
  </center>
<br />
</div>


</div>

<script src="<?php echo NeuralRutasApp::RutaJs('jquery-barcode-2.0.2.min.js'); ?>"></script>
<script>
$(function(){
    inicio();
});

function inicio(){
    // Tabs
	$('#tabs').tabs();
    $( "input[name=codigo]" ).focus();
		
	// Botton
	$(".BtnGuardar").button({
   		icons: {
      			primary: 'ui-icon ui-icon-print'
   			},
   		label: "Imprimir Etiqueta del Producto"
	});
}

function generateBarcode(){
    valor = $('#codigo').val();
    var settings = {
          output: 'css',
          bgColor: '#FFFFFF',
          color: '#000000',
          barWidth: '1',
          barHeight: '50'
        };
    $("#bcTarjet").html("").show().barcode(valor, 'code128', settings);
}
</script>