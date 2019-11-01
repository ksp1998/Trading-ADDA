<?php
  $error = NULL;
  require "scripts/db_connection.php";

  $name = "";
  $dob = "";
  $email = "";

  if($con) {
    // Get Form Data
    if(isset($_POST['register'])) {

      $name = trim($_POST['name']);
      $dob = $_POST['dob'];
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      if(strlen($name) <= 1)
        $error = "<h3 style='color: red;'>Please enter valid name!</h3>";
      elseif($password != $confirm_password)
        $error = "<h3 style='color: red;'>Oops... Password mismatch!</h3>";
      else {
        // Checking for email already registerd or not
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        //var_dump($result);
        if(!empty($row))
          $error = "<h3 style='color: red;'>Provided email id is already registerd! Please login...</h3>";
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
          //$password = md5($password);
          $query = "INSERT INTO user values('$name', '$dob', '$email', '$password')";
          $result = mysqli_query($con, $query);
          if($result) {
            $error = "<h3 style='color: green;'>Inserted Successfully...!</h3>";
          }
          else
            $error = "<h3 style='color: red;'>Failed to insert!</h3>";
        }
      }
      // show register form
    }

    if(isset($_POST['login'])) {
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      //$password = md5($password);
      $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      //var_dump($result);
      if(!empty($row)) {
          session_start();
          //$name = $row['name'];
          //$error = "<h3 style='color: green;'>Welcome $name</h3>";
          $_SESSION['email'] = $row['email'];
          ?>
          <script type='text/javascript'>
            document.getElementById("login_btn").style.display = 'none';
            document.getElementById("logout_btn").style.display = 'block';
          </script>
          <?php
      }
      else
        $error = "<h3 style='color: red;'>Username or password error!</h3>";
    }
  }
  else
    $error = "<h3 style='color: red;'>Failed to establish connection with database!</h3>";
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
        <input type="email" name="email" value="<?php echo htmlentities($email); ?>" placeholder="Enter Email..." required />
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
        <input type="text" name="name" value="<?php echo htmlentities($name); ?>" title="This field is required" placeholder="Enter Your Name..." required />
        <br><br>
        Date of Birth
        <input type="date" name="dob" value="<?php echo htmlentities($dob); ?>" required/>
        <br><br>
        Email
        <input type="email" name="email" value="<?php echo htmlentities($email); ?>" placeholder="Enter Email..." required />
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
