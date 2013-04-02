<?php
	class JQuery extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
		
		public function Index() {
			
			echo 'Este es el Index de JQuery';
		}
		
		public function Formulario() {
			//Retraso el script por 3 segundos para mostrar el loader NO ES NECESARIO UTILIZARLO
			sleep(2);
			
			//Convertimos el nombre en variable
			$Nombre = $_POST['nombre'];
			
			//ejemplo de impresion
			//echo $Nombre;
			
			//Enviamos el Nombre a la vista
			$this->Vista->Nombre = $Nombre;
			
			//Genero una Vista de ejemplo para mostrar la variable
			$this->Vista->GenerarVista('Formulario/Mostrar');
		}
		
		public function LinkPOST() {
			
			Ayudas::Print__R($_POST);
		}
	}