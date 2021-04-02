<?PHP

require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$sender = $_POST['email'];
$recipient = 'bsirinath@gmail.com';

$name = $_POST['name'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$mail_attachment = $_FILES['file'];


$mail-> setFrom($sender, $name);
$mail-> addAttachment($mail_attachment);
$mail-> isHTML(true);
$mail-> Subject = "Start a Project";
$mailContent = "<h1>Project details</h1><br><br><p>$description</p>";
$mail->Body = $mailContent;

if(!$mail->send()){
    $result = "Something went wrong. Please try again";
    echo "Something went wrong. Please try again";
}
else {
    $result = "Thanks. Email submit successful";
    echo "Thanks. Email submit successful";
}

?>