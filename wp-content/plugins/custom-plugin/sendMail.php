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
			$log = date('Y-m-d H:i:s') . ' To: '.$firstName.' '.$lastName.'. Subject: '.$subject.'. Message: '.$msg.'. Email: '.$email;
			file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
			echo "<script>alert('Письмо успешно отправлено')</script>";
		}else{
			echo "<script>alert('Письмо не отправлено. Произошла ошибка')</script>";
		}
	}
}

add_action('init','sendMail_sendMail');

function validateMail_validateMail(){
    ?>
    <script>
        function send(){
            let email = document.getElementById("email").value
            document.getElementById("error").textContent = ""

            if(validateEmail(email)){
                document.getElementById("error").textContent = ""
                document.getElementById("btn").type = 'submit'
            }else{
                document.getElementById("error").textContent = "is not valid"
            }
        }

        function validateEmail(email) {
            var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
            return re.test(String(email).toLowerCase());
        }
    </script>
    <?php
}

add_action('wp_footer','validateMail_validateMail');

add_shortcode('page', 'print_page');

function print_page(){
    ob_start();
    ?>
    <form name="testForm" method="post">
        <p><label>First Name</label><br> <input type="text" name="firstName" autocomplete="off" required=""></p><p><label>Last Name</label><br> <input type="text" name="lastName" autocomplete="off" required=""></p>
        <p><label>Subject</label><br>
        <input type="text" name="subject" autocomplete="off" required="">
        </p><p><label>Message</label><br>
        <textarea rows="10" cols="45" name="msg"></textarea>
        </p><p><label>Email *</label><br>
        <input id="email" type="email" onkeyup="send()" class="email" placeholder="E-mail" name="email" autocomplete="off" required=""><span id="error" class="error"></span>
        </p>
        <button name="btn" id="btn" type="button" class="btn-submit">Send</button>
    </form>
    <?php
    return ob_get_clean();
}