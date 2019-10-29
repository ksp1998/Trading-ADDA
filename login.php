<?php
  $error = NULL;
  require "scripts/db_connection.php";

  if($con) {
    // Get Form Data
    if(isset($_POST['register'])) {

      $name = trim($_POST['name']);
      $dob = $_POST['dob'];
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      if(strlen($name) == 0)
        $error = "Please enter valid name!";
      elseif($password != $confirm_password)
        $error = "Oops! Password mismatch";
      else {
        // Checking for email already registerd or not
        $query = "SELECT * FROM user WHERE email = '$email' limit 1";
        $result = mysqli_query($con, $query);
        //var_dump($result);
        if($result)
          $error = "Provided email id is already registered. Please login";
        else {
          /*
          // If not registered, verify email
          $to = $email;
          $subject = "Emial Verification";
          $otp = rand(000000, 999999);
          $_SESSION['otp'] = $otp;
          echo $_SESSION['otp'];
          $message = "Your OTP for registration on Trading ADDA is <b>$otp</b><br>If you are not aware of this activity please ignore it.";
          $headers = "From: ksuthar2016@gmail.com";
          $headers .= "MIME-VERSION: 1.0" . "\r\n";
          $headers .= "Content-Type: text/html; charset= utf-8" . "\r\n";

          $result = mail($to, $subject, $message, $headers);
          var_dump($result);
          */
          $password = md5($password);
          $query = "INSERT INTO user values('$name', '$dob', '$email', '$password')";
          $result = mysqli_query($con, $query);
          if(!empty($result)){
            $error = "Inserted Successfully...!";
          }
          else
            $error = "Failed to insert!";
        }
      }
    }

    if(isset($_POST['login'])) {
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      $password = md5($password);
      $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' limit 1";
      $result = mysqli_query($con, $query);
      //var_dump($result);
      if($result){
        while($row = mysqli_fetch_array($result)) {
          $name = $row['name'];
          $error = "Welcome $name";
			  }
      }
      else {
        $error = "USername or password error!";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="styles/login.css" />
  </head>
  <body>
    <div id="login_form" class="animate">
      <form action="?" method="post">
        Email<br>
        <input type="email" name="email" placeholder="Enter Email..." required />
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." required />
        <br><br>
        <input type="submit" name="login" value="LOGIN">
        <br>
      </form>
      Not Registered!&nbsp;<button class="change_form" onclick="document.getElementById('register_form').style.display='block';document.getElementById('login_form').style.display='none';">Register here</button>
      <center><?php echo $error; ?></center>
    </div>

    <div id="register_form" class="animate">
      <form action="?" method="post">
        First Name<br>
        <input type="text" name="name" title="This field is required" placeholder="Enter Your Name..." required />
        <br><br>
        Date of Birth
        <input type="date" name="dob" required/>
        <br><br>
        Email
        <input type="email" name="email" placeholder="Enter Email..." required />
        <br><br>
        <div class="otp">
          Enter OTP to verify Email Address
          <input type="number" name="otp" placeholder="Enter OTP" />
          <input type="submit" name="otp_verify" value="Verify" />
          <br><br>
        </div>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." required />
        <br><br>
        Confirm Password<br>
        <input type="password" name="confirm_password" placeholder="Re-enter Password..." required />
        <br><br>
        <input type="submit" name="register" value="REGISTER">
        <br>
      </form>
      Already Registered!&nbsp;<button class="change_form" onclick="document.getElementById('login_form').style.display='block';document.getElementById('register_form').style.display='none';">Login here</button>
      <center><?php echo $error; ?></center>
    </div>
  </body>
</html>
