<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MyEmailServer implements EmailServerInterface
{
    public function sendEmail($to, $name, $subject, $content)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = false; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'nkhoa3577@gmail.com'; //SMTP username
            $mail->Password = 'wvotqdyrfdjirwyd'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('nkhoa3577@gmail.com', ''); 
            $mail->addAddress($to, $name); 

            //Content
            $mail->isHTML(true); 
            $mail->Subject = $subject; 
            $mail->Body = "$content. <i><u>Không cần trả lời mail này</u></i>"; 

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
