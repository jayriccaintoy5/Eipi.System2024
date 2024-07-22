<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
session_start();


 

if(isset($_POST['send'])){
 
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

  
 
 
    $filename = $_FILES['attachment']['name'];
    $location = 'attachment/' . $filename;
    move_uploaded_file($_FILES['attachment']['tmp_name'], $location);

  
 
    //Load composer's autoloader
    require 'vendor/autoload.php';
 
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
    
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'jzylhia15@gmail.com';     // Your Email/ Server Email
        $mail->Password = 'gwaqbbdplpneekou';                     // Your Password
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   
       
        //Send Email
        $mail->setFrom('jzylhia15@gmail.com');
 
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('jzylhia15@gmail.com');

        print_r($_FILES['attachment']); 
          //Multiple File Attachment
        for ($i = 0; $i < count($_FILES['attachment']['tmp_name']); $i++){
            $mail->addAttachment($_FILES['attachment']['tmp_name'][],$_FILES['attachment']['name']); //option name
        }
 
        //Attachment
        
        if(!empty($filename)){
            $mail->addAttachment($location, $filename); 
            
        }
 
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
 
        $mail->send();
        $_SESSION['message'] = 'Message has been sent';
    } catch (Exception $email) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }
 
    header('location:SendingImage.php');
}
else{
    $_SESSION['message'] = 'Please fill up the form first';
    header('location:SendingImage.php');
}