<center>
<div id="tabs">
   	    <ul>
     	  <li><a href="#tabs-1">DATOS GENERALES</a></li>
          <li><a href="#tabs-2">MONEDA/IVA</a></li>
   	    </ul>
        <div id="tabs-1">
   		
<br />
<form id="frmDatosGenerales" name="frmDatosGenerales" method="post" action="">
<center>
<table>
  <tr>
    <td>Razon Social</td>
    <td>
      <input type="text" name="razon" id="razon" placeholder="Nombre o Razon Social" size="50" /></td>
  </tr>
  <tr>
    <td>RFC</td>
    <td>
      <input type="text" name="rfc" id="rfc" placeholder="RFC" size="50" /></td>
  </tr>
  <tr>
    <td>Direccion</td>
    <td>
      <input type="text" name="direccion" id="direccion" placeholder="Domicilio Comercial" size="50" /></td>
  </tr>
  <tr>
    <td>Telefono</td>
    <td>
      <input type="text" name="Telefono" id="Telefono" placeholder="Numero Telefonico" size="50" /></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<span class="BtnGuardar"></span>
</center>
</form>
<br />
</div>

<div id="tabs-2">
<br />
<form id="frmMoneda" name="frmMoneda" method="post" action="">
<center>
<table>
  <tr>
    <td>Tipo Moneda</td>
    <td>
      <input name="moneda" type="text" id="moneda" placeholder="Moneda" size="7" /></td>
  </tr>
  <tr>
    <td>Porcentaje IVA</td>
    <td>
      <input type="text" name="iva" id="iva" placeholder="Porcentaje" size="7" />%</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<span class="BtnGuardar"></span>
</center>
</form>
<br />
</div>

</div>
</center>

<script>
$(function(){
    inicio();
});


function inicio(){
    // Tabs
	$('#tabs').tabs();
		
	// Botton
	$(".BtnGuardar").button({
   		icons: {
      			primary: 'ui-icon ui-icon-disk'
   			},
   		label: "Guardar Configuracion"
	});
    
    $( "input[name=razon]" ).focus();
}
</script>
