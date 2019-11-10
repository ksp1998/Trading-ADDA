<?php

  // Checking whether user registerd or not

  function checkUser($con, $email, $password) {
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $_SESSION['email'] = $row['email'];
    //var_dump($result);
    return $row;
  }

  // Get credentials
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  //$password = md5($password); // Encrypt Password

  if(!empty(checkUser($con, $email, $password))) {
    $login_msg = NULL;
    // Start the session
    //session_start();
    // Storing email in session variable
    $_SESSION['isLogin'] = true;

    // If Login successfull hide login option and show profile link & logout option
    ?>
    <script type='text/javascript'>
      document.getElementById("login_btn").style.display = 'none';
      //document.getElementById("profile_link").style.display = 'block';
      //document.getElementById("logout_btn").style.display = 'block';
      document.getElementById("loggedin").style.display = 'block';
    </script>
    <?php
  }
  else
    $login_msg = "<h3 style='color: red;'>Username or password error!</h3>";

  // show login form if invalid credentials
  if($login_msg != NULL) {
    ?>
    <style>
      #show_login_form, #login_form { display: block; }
      #register_form, #otp_verify_form { display: none; }
    </style>
    <?php
  }
?>
