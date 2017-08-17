<?php

class Mailer {

    public static function send($email, $subject, $message) {

        Yii::import('application.extensions.phpmailer.JPhpMailer');

        $mail = new JPhpMailer;
        $mail->IsSMTP();
		$mail->Host = 'smtp.mail.ru';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth	= true;
		$mail->Username	= 'info@laska-podium.ru';
		$mail->Password	= '98/UiaVLpySy';
		$mail->CharSet = 'utf8';

		$mail->SetFrom("info@laska-podium.ru", "Laska Podium");

        $mail->AddAddress($email);
        $mail->Subject = $subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        $mail->MsgHTML($message);

        if ($mail->Send())
            return true;
        else {

        	echo $mail->ErrorInfo;
        	die;
            return false;
		}
    }
}