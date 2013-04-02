<center>
<div id="tabs">
   	    <ul>
     	  <li><a href="#tabs-1">EXISTENCIAS</a></li>
          <li><a href="#tabs-2">ENTRADAS</a></li>
   	    </ul>
        <div id="tabs-1">
   		
<br />
<form id="frmEntradas" name="frmEntradas" method="post" action="">
<center>
<table>
  <tr>
    <td>Codigo</td>
    <td><label for="codigo1"></label>
      <input name="codigo1" type="text" id="codigo1" placeholder="Codigo" size="15" /></td>
  </tr>
  <tr>
    <td>Existencias</td>
    <td><label for="existencia"></label>
      <input type="text" name="existencia" id="existencia" placeholder="Existencia Almacen" size="15" /></td>
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
<form id="frmEntrada" name="frmEntrada" method="post" action="">
<center>
<table>
  <tr>
    <td>Codigo</td>
    <td><label for="codigo2"></label>
      <input name="codigo2" type="text" id="codigo2" placeholder="Codigo" size="15" /></td>
  </tr>
  <tr>
    <td>Cantidad</td>
    <td><label for="cantidad"></label>
      <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad" size="15" /></td>
  </tr>
  <tr>
    <td>Costo</td>
    <td><input type="text" name="costo" id="costo" placeholder="Costo" size="15" /></td>
  </tr>
  <tr>
    <td>Descripcion</td>
    <td>&nbsp;</td>
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
   		label: "Guardar"
	});
}
</script>
