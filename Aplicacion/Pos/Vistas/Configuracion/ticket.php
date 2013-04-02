<center>
<div id="tabs">
   	    <ul>
     	  <li><a href="#tabs-1">CONFIGURACION TICKET</a></li>
          <li><a href="#tabs-2">LOGOTIPO</a></li>
   	    </ul>
        <div id="tabs-1">
   		
<br />
<form id="frmTicket" name="frmTicket" method="post" action="">
<center>
<table>
  <tr>
    <td>Ancho de papel</td>
    <td><label for="ancho"></label>
      <input name="ancho" type="text" id="ancho" placeholder="Papel" size="11" />mm</td>
  </tr>
  <tr>
    <td>Mensaje en ticket</td>
    <td><label for="mensaje"></label>
      <input type="text" name="mensaje" id="mensaje" placeholder="*** Mensaje ***" size="50" /></td>
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
   		label: "Guardar"
	});
}
</script>
