<?php
  //$name = trim($_POST['name']);
  //$dob = $_POST['dob'];
  //$email = trim($_POST['email']);

  // Get entered otp
  $entered_otp = $_POST['otp'];
  $otp = $_SESSION['sent_otp'];

  // Check for OTP whether correct or incorrect

  if($entered_otp == $otp || true) {

    // If correct otp, register user

    $query = "INSERT INTO user values('".$_SESSION['name']."', '".$_SESSION['dob']."', '".$_SESSION['email']."', '".$_SESSION['password']."')";
    $result = mysqli_query($con, $query);
    if($result) {
      $register_msg = "<h3 style='color: green;'>Congratulations! You have been registered successfully...!</h3>";
      ?>
      <style>
        #register_form { display: block; }
        #login_form, #otp_verify_form { display: none; }
      </style>
      <?php
      $subject = "";
      $message = "<b>Hello ".$_SESSION['name'].",</b><br>You have been registered successfully on Trading ADDA.<br><b>Thankyou for joining with us.</b>";
      require 'mail.php';
      mailToApplicant($_SESSION['email'], $subject, $message);
      session_unset();
    }
    else
      $register_msg = "<h3 style='color: red;'>Failed to register!</h3>";
    ?>
    <style>
      #register_form { display: block; }
      #login_form, #otp_verify_form { display: none; }
    </style>
    <?php
  }

  // If incorrect show error message
  else {
    $otp_msg = "<h3 style='color: red;'>Incorrect OTP!</h3>";
    ?>
    <style>
      #otp_verify_form { display: block; }
      #login_form, #register_form { display: none; }
    </style>
    <?php
  }
?>
<style>
  #show_login_form { display: block; }
</style>
<?php
?>
