<?php
  //session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="styles/login.css" />
  </head>
  <body>
    <?php
      $login_msg = NULL;
      $register_msg = NULL;
      $otp_msg = NULL;
      require "scripts/db_connection.php";

      $name = "";
      $dob = "";
      $email = "";

      if($con) {

        if(isset($_POST['register'])) {
          require 'scripts/registration.php';
        }

        if(isset($_POST['otp_verify'])) {
          require 'scripts/otp_verification.php';
        }

        if(isset($_POST['login'])) {
          require 'scripts/login.php';
        }
      }
      else
        $error = "<h3 style='color: red;'>Failed to establish connection with database!</h3>";
    ?>
    
    <div id="login_form" class="animate">
      <div style="width: 100%;">
        <span style="float: right;" onclick="document.getElementById('show_login_form').style.display='none'" class="close" title="Close Form">&times;</span>
      </div>
      <form action="" method="post">
        Email<br>
        <input type="email" name="email" value="<?php //echo htmlentities($email); ?>" placeholder="Enter Email..." required />
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." required />
        <br><br>
        <input type="submit" name="login" value="LOGIN">
        <br>
      </form>
      Not Registered!&nbsp;<button class="change_form" onclick="document.getElementById('register_form').style.display='block';document.getElementById('login_form').style.display='none';">Register here</button>
      <center><?php //echo $login_msg; ?></center>
    </div>

    <div id="register_form" class="animate">
      <div style="width: 100%;">
        <span style="float: right;" onclick="document.getElementById('show_login_form').style.display='none'" class="close" title="Close Form">&times;</span>
      </div>
      <form action="" method="post">
        First Name<br>
        <input type="text" name="name" value="<?php echo htmlentities($name); ?>" title="This field is required" placeholder="Enter Your Name..." required />
        <br><br>
        Date of Birth
        <input type="date" name="dob" value="<?php echo htmlentities($dob); ?>" required/>
        <br><br>
        Email
        <input type="email" name="email" value="<?php echo htmlentities($email); ?>" placeholder="Enter Email..." required />
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." required />
        <br><br>
        Confirm Password<br>
        <input type="password" name="confirm_password" placeholder="Re-enter Password..." required />
        <br><br>
        <input type="submit" name="register" value="REGISTER" />
      </form>
      Already Registered!&nbsp;<button class="change_form" onclick="document.getElementById('login_form').style.display='block';document.getElementById('register_form').style.display='none';">Login here</button>
      <center><?php echo $register_msg; ?></center>
    </div>
    <div id="otp_verify_form" class="animate">
      <form action="" method="post">
        <div class="otp">
          Enter OTP to verify Email Address
          <input type="number" name="otp" placeholder="Enter OTP" />
          <!--<input type="hidden" name="sent_otp" value="<?php //echo $otp; ?>" />-->
          <input type="submit" name="otp_verify" value="Verify" />
          <br><br>
          <center><?php echo $otp_msg; ?></center>
        </div>
      </form>
    </div>
  </body>
</html>
