<?php
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = gethostname();
        $mail->Port = 465;  
        $mail->Username = 'autoreply@markstrat.lk';
        $mail->Password = 'Loginms123';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="autoreply@markstrat.lk";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
            $error = "Thanks You !! Your email is sent.";  
            return $error;
        }
    }
    
    $to   = 'infomarkstrat@gmail.com';
    $from = 'autoreply@markstrat.lk';
    $name = 'markstrat';
    $subj = 'PHPMailer 5.2 testing from DomainRacer';
    $msg = 'This is mail about testing mailing using PHP.';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
?>

<html>
    <head>
        <title>Markstrat</title>
    </head>
    <body style="background: black;">
        <center><h2 style="padding-top:70px;color: white;"><?php echo $error; ?></h2></center>
    </body>
    
</html>