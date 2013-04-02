<div id="tabs">
   	<ul>
     	<li><a href="#tabs-1">COTROL DE USUARIOS</a></li>
   	</ul>
	<div id="tabs-1">
   		<table>
      		<tr>
  	  			<td width="64"><img src="<?php echo NeuralRutasApp::RutaImagenes('usuarios.gif'); ?>" width="64" height="64" /></td>
	  			<td><h3>COTROL DE USUARIOS.</h3>
	      			<p>Modulo de control de los accesos al sistema, mediante usuarios y niveles de acceso e informacion adicional como correo electronico.</p>
	  			</td>
      		</tr>
  		</table>
	</div>
</div>
<br>
<center>
<table id="list" class="scroll"></table> <div id="pager" class="scroll" style="text-align:center;"></div>
</center>
<script>
$(function(){
    inicio();
});

function inicio(){
    // Tabs
	$('#tabs').tabs();
    
    jQuery("#list").jqGrid({
		url:'<?php echo NeuralRutasApp::RutaURL("ControlAccesos/Mostrar"); ?>',
		datatype: 'json',
		mtype: 'POST',
		colNames:['No.','Nombre', 'Apellido Paterno','Apellido Materno', 'Username', 'Password', 'Email', 'Nivel'],
		colModel :[
			{name:'idUsuario', index:'idUsuario', width:20,align:'center', editable:false,editoptions:{readonly:true,size:10}},
			{name:'nombre', index:'nombre', width:100, align:'left',editable:true,editoptions:{size:30}},
			{name:'apellidoPaterno', index:'apellidoPaterno', width:100, align:'left',editable:true,editoptions:{size:30}},
			{name:'apellidoMaterno', index:'apellidoMaterno', width:100, align:'left',editable:true,editoptions:{size:30}},
			{name:'username', index:'username', width:60, align:'center',editable:true,editoptions:{size:15}},
			{name:'passwd', index:'passwd', width:60, align:'left',hidden:true,editable:true,editrules:{edithidden: true},edittype:'password',editoptions:{size:15}},
			{name:'email', index:'email', width:150, align:'left',editable:true,editoptions:{size:30}},
			{name:'nivel', index:'nivel', width:60,align:'center',hidden:true,editable:true,editrules:{edithidden: true},edittype:"select",editoptions:{value:"1:Administrador;2:Punto Venta"}}],
		pager: jQuery('#pager'),
		rowNum:10,
		rowList:[10,20,30],
		sortname: 'idUsuario',
		sortorder: "asc",
		viewrecords: true,
		caption: 'Listado de Usuarios',
	});
	
	jQuery("#list").jqGrid('navGrid','#pager',
		{add: true, edit: true, del: true, search: false, view:true}, //options
        {closeAfterEdit:true,closeAfterAdd:true,height:260,width:310,reloadAfterSubmit:true,url:'<?php echo NeuralRutasApp::RutaURL("ControlAccesos/Operaciones"); ?>'}, // edit options
        {closeAfterEdit:true,closeAfterAdd:true,height:260,width:310,reloadAfterSubmit:true,url:'<?php echo NeuralRutasApp::RutaURL("ControlAccesos/Operaciones"); ?>'}, // add options
        {reloadAfterSubmit:false,url:'<?php echo NeuralRutasApp::RutaURL("ControlAccesos/Operaciones"); ?>'}, // del options
        {width:400,sopt:['cn','bw','ew']}, // search options
		{width:450,closeOnEscape:true}
	);
	
	jQuery.jgrid.del = { 
		mtype: "POST",
		caption: "Eliminar", 
		msg: '¿Desea Elimnar los registros seleccionados?', 
		bSubmit: "Eliminar", 
		bCancel: "Cancelar",
		processData: "Procesando..." 
	};
	
	jQuery.jgrid.edit = {
		mtype: "POST",
		width:450,
		addCaption: "Agregar Registro", 
		editCaption: "Editar Registro", 
		bSubmit: "Guardar", 
		bCancel: "Cancelar", 
		processData: "Procesando...", 
		msg: { 
			required:"Field is required", 
			number:"Please enter valid number!", 
			minValue:"value must be greater than or equal to ", 
			maxValue:"value must be less than or equal to" 
		} 
	};
		
}
</script>