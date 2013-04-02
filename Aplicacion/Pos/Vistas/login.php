<?php
/**
 * @author Ramses Aguirre Farrera
 * @copyright 2012
 * 
 */

?>
<!DOCTYPE HTML>
	<html>
		<head>
            <meta charset="utf-8" />
			<title>.:: POS :: Online ::.</title>
            <!-- Hojas de estilo -->
			<style>
            body{ 
                font: 62% "Trebuchet MS", sans-serif;  
                color:#797979; 
                background-image: url('<?php echo NeuralRutasApp::RutaImagenes('background.jpg'); ?>');
            }
            .ui-dialog{
	           box-shadow: 1px 1px 10px #bbbec3;
            }
            </style>
            
            <?php echo NeuralScriptAdministrador::OrganizarScript(array('JS' => array('JQUERY', 'JQUERYUILIB'), 'CSS' => array('HOME', 'JQUERYUI' ) ) , false, 'POS' ); ?>
            <!-- IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
 
		</head>
		<body>

        <div id ="dialog">
            <form name="login" action="<?php echo NeuralRutasApp::RutaURL('Login/Login'); ?>" method="post">
            <table>
	           <tr>
	               <td colspan="2" align="center"><img src="<?php echo NeuralRutasApp::RutaImagenes('logo.gif'); ?>" width="221" height="50" /></td>
	           </tr>
	           <tr>
    	           <td><label for="usuario">Usuario:</label></td>
    	           <td><input type="text" name="usuario" placeholder="Nombre de usuario" required ></td>
               </tr>
               <tr>
    	           <td><label for="password">Password: </label></td>
                   <td><input type="password" name="password" placeholder="Clave de acceso" required ></td>
               </tr>
            </table>
            </form>
        </div>
        
        <script>
		$(function(){
  			// Menu Principal
  			$("#opciones").accordion({ header: "h3" });
			$.fx.speeds._default = 600;
  			$( "#dialog" ).dialog({
				show: "slide",
				hide: "drop",
				closeOnEscape: false,
				draggable: false,
				width: 240,
				title: 'INICIAR SESION',
				buttons: {
					Entrar: function() {
						document.login.submit();
						$( this ).dialog( "close" );
					}
				}
			});
			
  		$( "input[name=usuario]" ).focus();
  		
	   });
       </script>

		</body>
	</html>