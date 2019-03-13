<?php 
require_once 'lib/class.phpmailer.php';
require_once('lib/class.smtp.php');
//print_r(get_declared_classes()).'<br>';
if (isset($_POST['myform'])) {
$to = $_POST['from']; //'abc@mail.ru';   
$reply = $_POST['reply'];
    $subject = $_POST['subject']; //'Тема';
    $text = $_POST['text'];
   // $headers = "From:  <$to>\r\n";
  //  $headers .= "Reply-to: <$reply>\r\n";
   // $headers .= 'Content-type: text/html; charset=utf-8';
  //  $subject = '=?utf-8?B?'.base64_encode($subject).'?=';  // исправляем кириллицу
   // if (mail($to, $subject, $text, $headers)) echo 'Письмо отправлено!';
     // else echo 'Письмо не отправлено';
//}
// else {echo 'Заполните форму';}

// Настройки
/*
$mail = new PHPMailer;
 $mail->CharSet = 'utf-8';
$mail->isSMTP(); 
$mail->Host = 'smtp.yandex.ru'; 
$mail->SMTPAuth = true; 
$mail->Username = 'pravda-psm'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'ctykpsm'; // Ваш пароль
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;

$mail->setFrom($reply); // Ваш Email
$mail->addAddress($to); // Email получателя

// Письмо
$mail->isHTML(true); 
$mail->Subject = $subject; // Заголовок письма
$mail->Body = $text;       // Текст письма

// Результат
if(!$mail->send()) {
 echo 'Письмо не может быть отправлено';
 echo  'Ошибка: ' . $mail->ErrorInfo;
} else {
 echo ‘ok’;
}

}
else {echo 'Заполните форму';}
*/
	$mail = new PHPMailer();
	
    $mail->CharSet = 'utf-8';
	
	$mail->isSMTP(); 
$mail->Host = 'smtp.yandex.ru'; 
$mail->SMTPAuth = true; 
$mail->Username = 'pravda-psm'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'ctykpsm'; // Ваш пароль
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;
	
	
	$a = '<div style="color:#522526; background-color: #E4D9D9; font-size: 18px; line-height: 24px; display: flex; padding: 20px;">
		<p style="margin: 10px auto;">';
	$b = '</p>
	</div>';
	
    $mail->setFrom($reply, 'Администратор');
    $mail->addAddress($to, 'Joe User');
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addAttachment('a.jpg');
    $mail->isHTML(true);
    $mail->Subject = $subject;;
    $mail->Body = $a.$text.$b;
    $mail->AltBody = $text;
    if($mail->send()) {
        echo 'Письмо успешно отправлено!';
    } else {
        echo 'Письмо не отправлено!';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>работа с mail()</title>
</head>

<body>
	
	<form action="index.php" name="myform" method="post" style="display: flex; flex-direction: column; width: 500px">
		<label>Кому <input type="email" name="from"> </label>
		<label>От Кого <input type="email" name="reply"></label>
		<label>Тема <input type="text" name="subject"></label>
		<textarea name="text" rows=7 cols="300" ></textarea>
		<button type="submit" style="margin: 10px auto;" name="myform">Отправить</button>
	</form>
	
	<div style="color:#522526; background-color: #E4D9D9; font-size: 18px; line-height: 24px; display: flex; padding: 20px;">
		<p style="margin: 10px auto;">
			<?=$text; ?>
		</p>
	</div>
	
</body>
</html>