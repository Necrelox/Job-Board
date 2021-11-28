<?php

include_once("./tools/PHPMailer-master/src/PHPMailer.php");
include_once("./tools/PHPMailer-master/src/SMTP.php");
include_once("./tools/PHPMailer-master/src/Exception.php");

class MailManager
{
    public static function sendMail($to, $subject, $msg)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "behavior.undefined@gmail.com";
        $mail->Password = "";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->SetFrom("undefined@gmail.com", "JobBoard");
        $mail->AddAddress($to);

        $mail->Subject = $subject;
        $mail->Body = $msg;

        return $mail->Send();
    }
}
