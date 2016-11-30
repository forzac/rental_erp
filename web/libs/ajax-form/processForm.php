<?php

// Define some constants
define( "RECIPIENT_NAME", "" );
define( "RECIPIENT_EMAIL", "tant.bpv@gmail.com" );
define( "EMAIL_SUBJECT", "" );

// Read the form values
$success = false;
$senderName = isset( $_POST['senderName'] ) ? $_POST['senderName'] : "";
$senderEmail = isset( $_POST['senderEmail'] ) ? $_POST['senderEmail'] : "";
$senderPhone = isset( $_POST['senderPhone'] ) ? $_POST['senderPhone'] : "";
$messageText = isset( $_POST['messageText'] ) ?  $_POST['messageText'] : "";

// If all values exist, send the email
if ( true ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $message = "Телефон: " . $senderPhone . "\n" . " Имя отправителя: " . $senderName . "\n" . " Почта отправителя: " . $senderEmail . "\n" . " Сообщение: " . $messageText;
  $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
}

// Return an appropriate response to the browser
if ( isset($_GET["ajax"]) ) {
  echo $success ? "success" : "error";
} else {
?>
<html>
  <head>
	<style>
		body p {
			text-align: center;
			font-size: 24px;
			color: #102d4a;
			margin-bottom: 20px;
		}
		body {
			padding: 20px;
		}
	</style>
    <title>Спасибо!</title>
  </head>
  <body>
  <?php if ( $success ) echo "<p>Ваша заявка принята. Мы свяжемся с вами в ближайшее время</p>" ?>
  <?php if ( !$success ) echo "<p>Заявка не отправлена. Попробуйте еще раз.</p>" ?>
  <p>Нажмите "Назад", чтобы вернуться на предыдущую страницу</p>
  </body>
</html>
<?php
}
?>
