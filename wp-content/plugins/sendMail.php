<?php

/*
Plugin Name: SendMail
Description: Плагин для отправки сообщений по электронной почте
Version: 1.0
Author: Gisich Yulian
*/

function sendMail_sendMail(){
    if(count($_POST)>0)
    if(isset($_POST['btn'])){
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];
		$email = $_POST['email'];
		
		$firstName = htmlspecialchars($firstName);
		$lastName = htmlspecialchars($lastName);
		$subject = htmlspecialchars($subject);
		$msg = htmlspecialchars($msg);
		$email = htmlspecialchars($email);
		
		$firstName = urldecode($firstName);
		$lastName = urldecode($lastName);
		$subject = urldecode($subject);
		$msg = urldecode($msg);
		$email = urldecode($email);
		
		$firstName = trim($firstName);
		$lastName = trim($lastName);
		$subject = trim($subject);
		$msg = trim($msg);
		$email = trim($email);
		
		if(mail($email,$subject,$msg,"From: test@smartApp.com \r\n")){
			$log = date('Y-m-d H:i:s') . ' To: '.$firstName.' '.$lastName.'. Subject: '.$subject.'. Message: '.$msg.' .Email: '.$email;
			file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
			echo "<script>alert('Письмо успешно отправлено')</script>";
		}else{
			echo "<script>alert('Письмо не отправлено. Произошла ошибка')</script>";
		}
	}
}

add_action('init','sendMail_sendMail');