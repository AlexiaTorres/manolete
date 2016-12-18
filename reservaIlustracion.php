<?php

if( isset($_POST) ){

		//form validation vars
		$formok = true;
		$errors = array();

		//form data
		$author = $_POST['author'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$subject_title = "Reserva para el Máster de Ilustración y Concept Art";
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

				$emailbody = "<p>Una persona está interesada en reservar plaza para el Máster de Ilustración y Concept Art.</p>
							  <p><strong>Nombre: </strong> {$author} </p>
							  <p><strong>E-mail: </strong> {$email} </p>
								<p><strong>Teléfono: </strong> {$phone} </p>
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

					$body= "Gracias <strong>{$author}</strong>, su solicitud ha llegado correctamente. <br>Nos pondremos en contacto con usted.";

					mail($email,utf8_decode("Aula Temática - Reserva tu plaza"),utf8_decode($body),$headers);

		}

		//what we need to return back to our form
		$returndata = array(
			'posted_form_data' => array(
				'author' => $author,
				'email' => $email,
				'phone' => $phone,
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
