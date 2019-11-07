<?php
  // Function to send an email to verify email address

  function mailToApplicant($to, $subject, $message) {

    $from = "thakurtradingadda@gmail.com";
    $pass = "TradingADDA@95100";
    $title = "Trading ADDA";

    // Including Required files for sending an email

    require 'PHPMailer/class.smtp.php';
    require 'PHPMailer/class.phpmailer.php';

    $mail = new PHPMailer();
    $mail->setFrom($from, $title);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->isHTML(true);
    $mail->AltBody = "This message is auto generated.";
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = $from;
    $mail->Password = $pass;
    if($mail->send())
      return 1;
    else
      return 0;
  }
?>
