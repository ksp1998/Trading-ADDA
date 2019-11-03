<?php
  //$name = trim($_POST['name']);
  //$dob = $_POST['dob'];
  //$email = trim($_POST['email']);

  // Get entered otp
  $entered_otp = $_POST['otp'];
  $otp = $_POST['sent_otp'];

  // Check for OTP whether correct or incorrect

  if($entered_otp == $otp) {

    // If correct otp, register user

    $query = "INSERT INTO user values('".$_SESSION['name']."', '".$_SESSION['dob']."', '".$_SESSION['email']."', '".$_SESSION['password']."')";
    $result = mysqli_query($con, $query);
    if($result) {
      $error = "<h3 style='color: green;'>Congratulations! You have been registered successfully...!</h3>";
      ?>
      <style>
        #register_form { display: none; }
        #login_form { display: block; }
      </style>
      <?php
      session_unset();
    }
    else
      $error = "<h3 style='color: red;'>Failed to register!</h3>";
    ?>
    <style> .otp { display: none; } </style>
    <?php
  }
  else {
    $error = "<h3 style='color: red;'>Incorrect OTP!</h3>";
    ?>
    <style> .otp { display: block; } </style>
    <?php
  }
?>
<style>
  #show_login_form, #register_form { display: block; }
  #login_form { display: none; }
</style>
<?php
?>
