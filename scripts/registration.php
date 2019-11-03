<?php

  // Store Data in Session variables
  function storeDataInSession($name, $dob, $email, $password) {
    $_SESSION['name'] = $name;
    $_SESSION['dob'] = $dob;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
  }

  // Checking for email already registerd or not

  function checkEmail($con, $email) {
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    //var_dump($result);
    return $row;
  }

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

  // Get Form Data

  $name = trim($_POST['name']);
  $dob = $_POST['dob'];
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  storeDataInSession($name, $dob, $email, $password);

  // Check for valid name
  if(strlen($name) <= 1)
    $error = "<h3 style='color: red;'>Please enter valid name!</h3>";

  // Check whether password is of correct length
  elseif(strlen($password) < 6)
    $error = "<h3 style='color: red;'>Password length should be greter than or equal to 6 characters!</h3>";

  // Check whether password matching
  elseif($password != $confirm_password)
    $error = "<h3 style='color: red;'>Oops... Password mismatch!</h3>";

  // If everthing fine go ahead
  else {

    if(!empty(checkEmail($con, $email)))
      $error = "<h3 style='color: red;'>Provided email id is already registered! Please login...</h3>";

    // If not registered

    else {
      // Generate randon 6 digit OTP
      $otp = rand(000000, 999999);

      $subject = "Email verification...";
      $message = "Your OTP for registration on Trading ADDA is <b>$otp</b><br>If you are not aware of this activity please ignore this email.";

      // Sending an email with OTP to entered email address
      if(mailToApplicant($email, $subject, $message)) {
        $error = "<h4 style='color: blue;'>OTP successfully sent to $email</h4>";

        // Showing fields for OTP if email sended successfully

        ?>
        <style> .otp { display: block; } </style>
        <?php
      }

      // If failure in sending an email
      else
        $error = "<h3 style='color: red;'>Something is bad with an email!</h3>";
    }
  }

  // show register form and hide login form

?>
<style>
  #show_login_form, #register_form { display: block; }
  #login_form { display: none; }
</style>
<?php

?>
