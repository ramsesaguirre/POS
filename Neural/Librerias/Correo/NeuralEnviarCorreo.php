<?php
	
	# #####################################################################################
	#
	#	Neural Framework (Framework en PHP)
	#
	#	@author: 	Zyos Ilusionista <neural.framework@gmail.com> <Zyos_Ilusionista@hotmail.com>
	#	@license: 	Licencia GNU/GPL (http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt)
	#
	#	Edicion Beta de Lanzamiento de Neural Framework.
	#
	#	http://github.com/neuralframework/
	#
	# #####################################################################################
	
	class NeuralEnviarCorreos {
		
		/**
		 * Emisor($Nombre)
		 * Nombre del Emisor del Correo
		 * 
		 * @param $Nombre: Nombre de quien envia el correo electronico
		**/
		public function Emisor($Nombre) {
			
			$this->NombreEmisor = $Nombre;
		}
		
		/**
		 * ResponderMensajeEnviado($Correo, $Nombre)
		 * Correo electronico al cual se puede reenviar el mensaje actual
		 * 
		 * @param $Correo: Correo Electronico al cual responder
		 * @param $Nombre: Nombre del Destinatario del correo
		**/
		public function ResponderMensajeEnviado($Correo, $Nombre) {
			
			$this->ResponderMensaje = array(
				'CORREO' => $Correo, 
				'NOMBRE' => $Nombre
			);
		}
		
		/**
		 * EnviarCorreoA($Correo, $Nombre)
		 * Crea un Array con los destinatarios a los cuales se le envian los correos
		 * 
		 * @param $Correo: Correo electronico correo@correo.com
		 * @param $Nombre: Nombre de la Persona que se le Envia el Correo
		**/
		public function EnviarCorreoA($Correo, $Nombre) {
			
			$this->EnviarCorreoTo[] = array(
				'CORREO' => $Correo, 
				'NOMBRE' => $Nombre
			);
		}
		
		/**
		 * EnviarCorreoCopia($Correo, $Nombre)
		 * Crea un Array con los destinatarios a los cuales se le envian copia del correo
		 * 
		 * @param $Correo: Correo electronico correo@correo.com
		 * @param $Nombre: Nombre de la Persona que se le Envia el Correo
		**/
		public function EnviarCorreoCopia($Correo, $Nombre) {
			
			$this->EnviarCorreoCC[] = array(
				'CORREO' => $Correo, 
				'NOMBRE' => $Nombre
			);
		}
		
		/**
		 * EnviarCorreoCopia($Correo, $Nombre)
		 * Crea un Array con los destinatarios a los cuales se le envian copia oculta
		 * 
		 * @param $Correo: Correo electronico correo@correo.com
		 * @param $Nombre: Nombre de la Persona que se le Envia el Correo
		**/
		public function EnviarCorreoOculto($Correo, $Nombre) {
			
			$this->EnviarCorreoCCO[] = array(
				'CORREO' => $Correo, 
				'NOMBRE' => $Nombre
			);
		}
		
		/**
		 * AsuntoCorreo($Asunto)
		 * Genera el asunto del correo es unico
		 * 
		 * @param $Asunto: Asunto del mensaje
		**/
		public function AsuntoCorreo($Asunto) {
			
			$this->AsuntoMail = $Asunto;
		}
		
		/**
		 * MensajeAlternativoNoHTML($Mensaje)
		 * Este es el mensaje alternativo para clientes de correo, o correos web que no soportan html
		 * 
		 * @param $Mensaje: mensaje en archivo plano txt
		**/
		public function MensajeAlternativoNoHTML($Mensaje) {
			
			$this->MensajeAlternativo = $Mensaje;
		}
		
		/**
		 * MensajeHTML($Mensaje)
		 * Mensaje en html para enviar
		 * @param $Mensaje: Mensaje HTML para enviar
		**/
		public function MensajeHTML($Mensaje) {
			
			$this->MensajeGeneralHTML = $Mensaje;
		}
		
		/**
		 * ArchivosAdjuntos($Ruta)
		 * Adjuntamos los archivos adjuntos correspondientes
		 * @param $Ruta: ruta de la imagen
		 * Esta ruta debe ir por fichero mas no por url
		**/
		public function ArchivosAdjuntos($Ruta) {
			
			$this->ArchAdjuntos[] = $Ruta;
		}
		
		/**
		 * SMTPDebug($Opcion)
		 * Habilita información SMTP (opcional para pruebas)
		 * @param $Opcion: este maneja dos parametros
		 * @param 1: errores y mensajes
		 * @param 2: solo mensajes
		**/
		public function SMTPDebug($Opcion) {
			
			$this->SMTPDebugValid = $Opcion;
		}
		
		/**
		 * EnviarCorreo($AplicacionEnvia)
		 * Proceso de envio de correo electronico
		 * 
		 * @param $AplicacionEnvia: se selecciona la aplicacion correspondiente para la configuracion
		 * de las opciones del mail
		**/
		public function EnviarCorreo($AplicacionEnvia) {
			
			//Leemos el archivo de configuraciones de bases de datos
			$DatosConfigCorreo = SysMisNeural::CargarArchivoYAMLAplicacion('Configuracion/ConfiguracionCorreo.yaml');
			
			//Generamos la variable de las aplicaciones
			$Aplicaciones = $DatosConfigCorreo['APLICACIONES'];
						
			//Validamos la configuración correspondiente
			if(array_key_exists($AplicacionEnvia, $Aplicaciones))
			{
				if($DatosConfigCorreo['APLICACIONES'][$AplicacionEnvia]['FUNCION_MAIL']=='DESHABILITADO')
				{
					//Generamos el instanciamiento del PHPMailer
					$Mail = new PHPMailer(true);
					
					//Instanciamos las opciones de envio de correos
					$Mail->IsSMTP();
					$Mail->IsHTML();
					
					//Validamos las configuraciones las leemos y las imprimimos
					foreach ($DatosConfigCorreo['APLICACIONES'][$AplicacionEnvia]['CONFIGURACION'] AS $Key => $Value)
					{
						$Mail->$Key = $Value;
					}
					
					try {
						
						//Validamos si se activa el Debug para el SMTP
						if(isset($this->SMTPDebugValid))
						{
							$Mail->SMTPDebug = $this->SMTPDebugValid;
						}
						
						//Generamos la opcion de responder este mensaje a este destino
						$Mail->AddReplyTo($this->ResponderMensaje['CORREO'], $this->ResponderMensaje['NOMBRE']);
						
						//Generamos a los destinatarios que se les envia este correo titular
						if(isset($this->EnviarCorreoTo))
						{
							if(count($this->EnviarCorreoTo)>=1)
							{
								for ($i=0; $i<count($this->EnviarCorreoTo); $i++)
								{
									$Mail->AddAddress($this->EnviarCorreoTo[$i]['CORREO'], $this->EnviarCorreoTo[$i]['NOMBRE']);
								}
							}
						}
						
						//Generamos los destinatarios de copia de este correo
						if(isset($this->EnviarCorreoCC))
						{
							if(count($this->EnviarCorreoCC)>=1)
							{
								for ($j=0; $j<count($this->EnviarCorreoCC); $j++)
								{
									$Mail->AddCC($this->EnviarCorreoCC[$j]['CORREO'], $this->EnviarCorreoCC[$j]['NOMBRE']);
								}
							}
						}
						
						//Generamos los destinatarios de copia oculta
						if(isset($this->EnviarCorreoCCO))
						{
							if(count($this->EnviarCorreoCCO)>=1)
							{
								for ($l=0; $l<count($this->EnviarCorreoCCO); $l++)
								{
									$Mail->AddBCC($this->EnviarCorreoCCO[$l]['CORREO'], $this->EnviarCorreoCCO[$l]['NOMBRE']);
								}
							}
						}
						
						//Generamos el Emisor del correo
						$Mail->SetFrom($DatosConfigCorreo['APLICACIONES'][$AplicacionEnvia]['CONFIGURACION']['Username'], $this->NombreEmisor);
						
						//Generamos el asunto correspondiente
						$Mail->Subject = $this->AsuntoMail;
						
						//validamos si enviamos mensaje alternativo que no soporte html
						if(isset($this->MensajeAlternativo))
						{
							$Mail->AltBody($this->MensajeAlternativo);
						}
						
						//Generamos el Mensaje HTML correspondiente
						$Mail->MsgHTML($this->MensajeGeneralHTML);
						
						//validamos los datos adjuntos correspondientes
						if(isset($this->ArchAdjuntos))
						{
							if(count($this->ArchAdjuntos)>=1)
							{
								for ($h=0; $h<count($this->ArchAdjuntos); $h++)
								{
									$Mail->AddAttachment($this->ArchAdjuntos[$h]);
								}
							}
						}
						
						//Enviamos el correo correspondiente
						$Mail->Send();
					}
					catch (phpmailerException $e)
					{
						//Errores de PhpMailer
						echo $e->errorMessage();
					}
					catch (Exception $e)
					{
						//Errores de cualquier otra cosa.
						echo $e->getMessage();
					}
				}
				elseif($DatosConfigCorreo['APLICACIONES'][$AplicacionEnvia]['FUNCION_MAIL']=='HABILITADO')
				{
					// Content-type se Adiciona
					$Cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$Cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					//Generamos a los destinatarios que se les envia este correo titular
					if(isset($this->EnviarCorreoTo))
					{
						if(count($this->EnviarCorreoTo)>=1)
						{
							for ($i=0; $i<count($this->EnviarCorreoTo); $i++)
							{
								$DatosEnviarTo[] = $this->EnviarCorreoTo[$i]['CORREO'];
							}
							
							//Organizamos los correos correspondientes 
							$CabeceraEnviarTo = implode(", ", $DatosEnviarTo);
							
							//Generamos la cabecera correspondiente
							$Cabeceras .= 'To: '.$CabeceraEnviarTo. "\r\n";
						}
					}
					
					//Generamos los destinatarios de copia de este correo
					if(isset($this->EnviarCorreoCC))
					{
						if(count($this->EnviarCorreoCC)>=1)
						{
							for ($j=0; $j<count($this->EnviarCorreoCC); $j++)
							{
								$DatosEnviarCC[] = $this->EnviarCorreoCC[$j]['CORREO'];
							}
							
							//Organizamos los correos correspondientes 
							$CabeceraEnviarCC = implode(", ", $DatosEnviarCC);
							
							//Generamos la cabecera correspondiente
							$Cabeceras .= 'Cc: '.$CabeceraEnviarCC. "\r\n";
						}
					}
					
					//Generamos los destinatarios de copia oculta
					if(isset($this->EnviarCorreoCCO))
					{
						if(count($this->EnviarCorreoCCO)>=1)
						{
							for ($l=0; $l<count($this->EnviarCorreoCCO); $l++)
							{
								$DatosEnviarBCC[] = $this->EnviarCorreoCCO[$l]['CORREO'];
							}
							
							//Organizamos los correos correspondientes 
							$CabeceraEnviarBCC = implode(", ", $DatosEnviarBCC);
							
							//Generamos la cabecera correspondiente
							$Cabeceras .= 'Bcc: '.$CabeceraEnviarBCC. "\r\n";
						}
					}
					
					//Enviamos el correo correspondiente
					mail($CabeceraEnviarTo, $this->AsuntoMail, $this->MensajeGeneralHTML, $Cabeceras);
				}
				else
				{
					echo 'ACTUALMENTE LA CONFIGURACION DE CORREO DEBE VALIDARSE, VALIDE QUE LA APLICACION DEFAULT ESTE BIEN CONFIGURADA O SELECCIONE UNA APLICACION CONFIGURADA';
					exit();
				}
			}
			else
			{
				if($DatosConfigCorreo['APLICACIONES']['DEFAULT']['FUNCION_MAIL']=='DESHABILITADO')
				{
					//Generamos el instanciamiento del PHPMailer
					$Mail = new PHPMailer(true);
					
					//Especificamos que utilizaremos SMTP
					$Mail->IsSMTP();
					
					try {
						
						//Validamos si se activa el Debug para el SMTP
						if(isset($this->SMTPDebugValid))
						{
							$Mail->SMTPDebug = $this->SMTPDebugValid;
						}
						
						//Validamos las configuraciones las leemos y las imprimimos
						foreach ($DatosConfigCorreo['APLICACIONES']['DEFAULT']['CONFIGURACION'] AS $Key => $Value)
						{
							$Mail->$Key = $Value;
						}
						
						//Generamos la opcion de responder este mensaje a este destino
						$Mail->AddReplyTo($this->ResponderMensaje['CORREO'], $this->ResponderMensaje['NOMBRE']);
						
						//Generamos a los destinatarios que se les envia este correo titular
						if(isset($this->EnviarCorreoTo))
						{
							if(count($this->EnviarCorreoTo)>=1)
							{
								for ($i=0; $i<count($this->EnviarCorreoTo); $i++)
								{
									$Mail->AddAddress($this->EnviarCorreoTo[$i]['CORREO'], $this->EnviarCorreoTo[$i]['NOMBRE']);
								}
							}
						}
						
						//Generamos los destinatarios de copia de este correo
						if(isset($this->EnviarCorreoCC))
						{
							if(count($this->EnviarCorreoCC)>=1)
							{
								for ($j=0; $j<count($this->EnviarCorreoCC); $j++)
								{
									$Mail->AddCC($this->EnviarCorreoCC[$j]['CORREO'], $this->EnviarCorreoCC[$j]['NOMBRE']);
								}
							}
						}
						
						//Generamos los destinatarios de copia oculta
						if(isset($this->EnviarCorreoCCO))
						{
							if(count($this->EnviarCorreoCCO)>=1)
							{
								for ($l=0; $l<count($this->EnviarCorreoCCO); $l++)
								{
									$Mail->AddBCC($this->EnviarCorreoCCO[$l]['CORREO'], $this->EnviarCorreoCCO[$l]['NOMBRE']);
								}
							}
						}
						
						//Generamos el Emisor del correo
						$Mail->SetFrom($DatosConfigCorreo['APLICACIONES']['DEFAULT']['CONFIGURACION']['Username'], $this->NombreEmisor);
						
						//Generamos el asunto correspondiente
						$Mail->Subject = $this->AsuntoMail;
						
						//validamos si enviamos mensaje alternativo que no soporte html
						if(isset($this->MensajeAlternativo))
						{
							$Mail->AltBody($this->MensajeAlternativo);
						}
						
						//Generamos el Mensaje HTML correspondiente
						$Mail->MsgHTML($this->MensajeGeneralHTML);
						
						//validamos los datos adjuntos correspondientes
						if(isset($this->ArchAdjuntos))
						{
							if(count($this->ArchAdjuntos)>=1)
							{
								for ($h=0; $h<count($this->ArchAdjuntos); $h++)
								{
									$Mail->AddAttachment($this->ArchAdjuntos[$h]);
								}
							}
						}
						
						//Enviamos el correo correspondiente
						$Mail->Send();
					}
					catch (phpmailerException $e)
					{
						//Errores de PhpMailer
						echo $e->errorMessage();
					}
					catch (Exception $e)
					{
						//Errores de cualquier otra cosa.
						echo $e->getMessage();
					}
				}
				elseif($DatosConfigCorreo['APLICACIONES']['DEFAULT']['FUNCION_MAIL']=='HABILITADO')
				{
					// Content-type se Adiciona
					$Cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$Cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					//Generamos a los destinatarios que se les envia este correo titular
					if(isset($this->EnviarCorreoTo))
					{
						if(count($this->EnviarCorreoTo)>=1)
						{
							for ($i=0; $i<count($this->EnviarCorreoTo); $i++)
							{
								$DatosEnviarTo[] = $this->EnviarCorreoTo[$i]['CORREO'];
							}
							
							//Organizamos los correos correspondientes 
							$CabeceraEnviarTo = implode(", ", $DatosEnviarTo);
							
							//Generamos la cabecera correspondiente
							$Cabeceras .= 'To: '.$CabeceraEnviarTo. "\r\n";
						}
					}
					
					//Generamos los destinatarios de copia de este correo
					if(isset($this->EnviarCorreoCC))
					{
						if(count($this->EnviarCorreoCC)>=1)
						{
							for ($j=0; $j<count($this->EnviarCorreoCC); $j++)
							{
								$DatosEnviarCC[] = $this->EnviarCorreoCC[$j]['CORREO'];
							}
							
							//Organizamos los correos correspondientes 
							$CabeceraEnviarCC = implode(", ", $DatosEnviarCC);
							
							//Generamos la cabecera correspondiente
							$Cabeceras .= 'Cc: '.$CabeceraEnviarCC. "\r\n";
						}
					}
					
					//Generamos los destinatarios de copia oculta
					if(isset($this->EnviarCorreoCCO))
					{
						if(count($this->EnviarCorreoCCO)>=1)
						{
							for ($l=0; $l<count($this->EnviarCorreoCCO); $l++)
							{
								$DatosEnviarBCC[] = $this->EnviarCorreoCCO[$l]['CORREO'];
							}
							
							//Organizamos los correos correspondientes 
							$CabeceraEnviarBCC = implode(", ", $DatosEnviarBCC);
							
							//Generamos la cabecera correspondiente
							$Cabeceras .= 'Bcc: '.$CabeceraEnviarBCC. "\r\n";
						}
					}
					
					//Enviamos el correo correspondiente
					mail($CabeceraEnviarTo, $this->AsuntoMail, $this->MensajeGeneralHTML, $Cabeceras);
				}
				else
				{
					echo 'ACTUALMENTE LA CONFIGURACION DE CORREO DEBE VALIDARSE, VALIDE QUE LA APLICACION DEFAULT ESTE BIEN CONFIGURADA O SELECCIONE UNA APLICACION CONFIGURADA';
					exit();
				}
			}
		}
	}