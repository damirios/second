<?php
	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	ini_set('display_errors', '1');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	$mail->setFrom('sasuke0001@mail.ru', 'Дамир');
	$mail->addAddress('deir96@mail.ru');
	$mail->Subject = 'Hello!';

//Тело письма
	$body = '<h1>Письмо!</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}

	if(trim(!empty($_POST['phone']))){
		$body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
	}

	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Сообщение: </strong> '.$_POST['message'].'</p>';
	}
	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Адрес: </strong> '.$_POST['message'].'</p>';
	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка!!!';
	} else {
		$message = 'Данные отправлены';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>
