<?php

if( isset($_POST) ){

		//form validation vars
		$formok = true;
		$errors = array();

		//form data
		$author = $_POST['author'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$aditional_info = $_POST['info'];
		$subject_title = "Información sobre el Master de Ilustracion";
		$emailDestino ="info@aulatematicamadrid.es";


		//validate name is not empty
		if(empty($author)){
			$formok = false;
			$errors[] = "No has introducido el nombre";
		}

		//validate email address is not empty
		if(empty($email)){
			$formok = false;
			$errors[] = "No has introducido el e-mail";
		//validate email address is valid
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$formok = false;
			$errors[] = "No has introducido un e-mail válido";
		}

		//send email if all is ok
			if($formok){
				$headers = "From: $email \r\n";
				$headers .= "Reply-To: $emailDestino\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$emailbody = "<p>Una persona está interesada en obtener información sobre el Master de Ilustracion.</p>
							  <p><strong>Nombre: </strong> {$author} </p>
							  <p><strong>E-mail: </strong> {$email} </p>
								<p><strong>Teléfono: </strong> {$phone} </p>
							  <p><strong>Mensaje: </strong> {$aditional_info} </p>
								";

				$envio = mail($emailDestino,$subject_title,utf8_decode($emailbody),$headers);

			}
		if($envio){
				$us="beta.com.es/autm";
				$author=utf8_decode($author);
				$headers = "From: $us <$emailDestino> \n";
					$headers="Return-path:".$emailDestino."\r\n";
					$headers .= "Reply-To: $emailDestino\n";
					$headers .= "MIME-version: 1.0\n";
					$headers .= "Content-type: text/html; charset=UTF-8\r\n ";
					$headers .= "boundary=\"Message-Boundary\"\n";

					$body_top = "--Message-Boundary\n";
					$body_top .= "Content-type: text/html; charset=iso-8859-1\n";

					$body= "Gracias <strong>{$author}</strong>, su email ha llegado correctamente. <br>
							En este enlace encontrará la información necesaria:
								<br/>
								<a href='http://beta.com.es/atm3/masters/pdf/Master_Ilustracion_AulaTematica.pdf'>Temario-Ilustracion</a>";

					mail($email,utf8_decode("Aula Temática - Queremos Ayudarte"),utf8_decode($body),$headers);

		}

		//what we need to return back to our form
		$returndata = array(
			'posted_form_data' => array(
				'author' => $author,
				'email' => $email,
				'phone' => $phone,
				'aditional_info' => $aditional_info,
				'subject_title' => $subject_title


			),
			'form_ok' => $formok,
			'errors' => $errors
		);


		//if this is not an ajax request
		if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){
			//set session variables
			session_start();
			$_SESSION['cf_returndata'] = $returndata;

			//redirect back to form
			header('location: master-ilustracion-diseno-conceptart-madrid');
		}

	}

	?>
