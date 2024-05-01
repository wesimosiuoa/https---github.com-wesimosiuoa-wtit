<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    function sentTo($message, $email, $subject){
        try{
            $mail = new PHPMailer(true);
            $mail -> isSMTP();
            $mail -> Host =  'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'wezimosiuoa@gmail.com';
            $mail -> Password = 'lkjcjwukldudvpho'; 
            $mail -> SMTPSecure = 'ssl';
            $mail -> Port = 465;
    
            //email sent from 
            $mail -> setFrom('wezimosiuoa@gmail.com');
            //sent email to 
            $mail -> addAddress($email);
    
            $mail -> isHTML(true);
            //subject
            $mail -> Subject = $subject;

            //body
            $mail -> Body = $message;
    
            $mail -> send();
            
            $message = "";
        }catch(Exception $err){
            echo " No internet ";
        }
    }
?>