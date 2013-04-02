<?php
	
	class Index extends Controlador {
		
		function __Construct() {
			parent::__Construct();
		}
		
		public function Index() {
			
			$this->Vista->GenerarVista('Listado');
		}
		
		/**
		 * Envia los datos post a traves de un formulario sin cargar la pagina
		 * Tambien se puede cargar la informacion en el mismo formulario
		 * desapareciendo el formulario correspondiente 
		 * */
		public function Formualario() {
			
			$Validar = new NeuralJQueryValidacionFormulario;
			$Validar->Requerido('nombre', 'Ingrese el Nombre');
			$Validar->CantMaxCaracteres('nombre', 6, 'Solo debe ser de 6 Caracteres el Nombre');
			
			//Generamos el procedimiento para enviar los datos post por ajax
			$Validar->SubmitHandler(NeuralJQueryAjax::EnviarFormularioPOST('formulario', 'respuesta', NeuralRutasApp::RutaURL('JQuery/Formulario'), true));
			
			//Generamos el Script de Validacion y envio de datos  por el formulario
			$this->Vista->Script[] = $Validar->MostrarValidacion('formulario');
			
			//Vista
			$this->Vista->GenerarVista('Formulario/Formulario');
		}
		
		public function LinkPOST() {
			
			//Generamos el proceso de datos envio datos post por un link
			$this->Vista->Script[] = NeuralJQueryAjax::LinkEnviarPeticionPOST('link', 'respuesta', NeuralRutasApp::RutaURL('JQuery/LinkPOST'), array('Framework' => 'Neural', 'Version' => '1.0', 'DatosEncriptados' => NeuralEncriptacion::EncriptarDatos('Datos Encriptados')));
			
			//Vista
			$this->Vista->GenerarVista('LinkPost/Link');
		}
	}