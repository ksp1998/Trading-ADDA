<?php
  session_start();
  $msg = "";
  $query = "";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Trade Adda</title>
    <link type="text/css" rel="stylesheet" href="styles/theme.css" />
    <link type="text/css" rel="stylesheet" href="styles/login.css" />
  </head>
  <body>
    <?php
      include('menu.php');
      if(isset($_SESSION['isLogin']) AND $_SESSION['isLogin'] == true) {
        // If logged in, hide login option and show profile link & logout option
        ?>
        <script type='text/javascript'>
          document.getElementById("login_btn").style.display = 'none';
          //document.getElementById("profile_link").style.display = 'block';
          //document.getElementById("logout_btn").style.display = 'block';
          document.getElementById("loggedin").style.display = 'block';
        </script>
        <?php
      }

      if(isset($_POST['electronics']))
        header('Location:home.php');

      if(isset($_POST['send_feedback'])) {
        $query = $_POST['query'];
        if(isset($_SESSION['isLogin'])) {
          $to = "thakurtradingadda@gmail.com";
          $subject = "User query...";
          $message = $query."<br><span style='float: right'><b>- ".$_SESSION['name']."</b></span>";
          require 'scripts/mail.php';
          if(mailToApplicant($to, $subject, $message))
            $msg = "<h2 style='color: green;'>Your query has been sent...</h2>";
          else
            $msg = "<h2 style='color: red;'>Failed to send!</h2>";
        }
        else
          $msg = "<h2 style='color: red;'>Please login first!</h2>";
      }
    ?>
    <div class="container">
      <div id="about">
          <h2>About</h2>
          Trading ADDA is an online goods trading website which enables users/customers to buy and sell 2nd hand goods which are not needed anymore by them.
      </div>
      <div id="contact">
        <form action="" method="post">
          <br><br>Please enter your query below<br><br>
          <textarea name="query" placeholder="Enter your query..." ><?php echo htmlentities($query); ?></textarea>
          <input type="submit" name="send_feedback" value="SEND">
          <?php echo $msg; ?>
        </form>
      </div>
    </div>
    <script>
      document.getElementById("login_btn").style.display = 'none';
    </script>
  </body>
</html>
