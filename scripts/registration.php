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

  // Get Form Data

  $name = trim($_POST['name']);
  $dob = $_POST['dob'];
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  storeDataInSession($name, $dob, $email, $password);

  // Check for valid name
  if(strlen($name) <= 1)
    $register_msg = "<h3 style='color: red;'>Please enter valid name!</h3>";

  // Check whether password is of correct length
  elseif(strlen($password) < 6)
    $register_msg = "<h3 style='color: red;'>Password length should be greter than or equal to 6 characters!</h3>";

  // Check whether password matching
  elseif($password != $confirm_password)
    $register_msg = "<h3 style='color: red;'>Oops... Password mismatch!</h3>";

  // If everthing fine go ahead
  else {

    if(!empty(checkEmail($con, $email)))
      $register_msg = "<h3 style='color: red;'>Provided email id is already registered! Please login...</h3>";

    // If not registered

    else {
      // Generate randon 6 digit OTP
      $otp = rand(000000, 999999);
      $_SESSION['sent_otp'] = $otp;
      $subject = "Email verification...";
      $message = "Your OTP for registration on Trading ADDA is <b>$otp</b><br>If you are not aware of this activity please ignore this email.";

      // Sending an email with OTP to entered email address
      require 'mail.php';
      if(mailToApplicant($email, $subject, $message)) {
        $register_msg = NULL;
        $otp_msg = "<h4 style='color: blue;'>OTP successfully sent to $email</h4>";

        // Showing fields for OTP if email sended successfully

        ?>
        <style>
          #show_login_form #register_form { display: none; }
          #show_login_form #otp_verify_form { display: block; }
        </style>
        <?php
      }

      // If failure in sending an email
      else
        $register_msg = "<h3 style='color: red;'>Something is bad with an email!</h3>";
    }
  }

  // show register form and hide login form

?>
<style>
  #show_login_form { display: block; }
  #login_form { display: none; }
</style>
<?php

?>
