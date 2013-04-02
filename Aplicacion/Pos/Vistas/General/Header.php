<!doctype html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
            <!-- Libreria Javascript/ Hojas de estilo -->
            <?php echo NeuralScriptAdministrador::OrganizarScript(array('JS' => array('JQUERY', 'JQUERYUILIB', 'JQGRID', 'I18N'), 'CSS' => array('HOME', 'JQUERYUI', 'JQGRID' ) ) , false, 'POS' ); ?>
            
            <!-- Libreria Javascript/ Hojas de estilo -->
                        
            <!-- IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
 
		</head>
		<body>
        <div id="cont">
            <div id="encabezado">
                <br>
                <center>
                    <div><img src="<?php echo NeuralRutasApp::RutaImagenes('header.gif'); ?>" width="529" height="77" /></div>
   	            </center>
            </div>
        
        