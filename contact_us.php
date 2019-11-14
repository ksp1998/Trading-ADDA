<?php
  session_start();
  require 'scripts/menu_category.php';
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
      require 'scripts/show_options.php';

      if(isset($_POST['send_feedback'])) {
        $query = trim($_POST['query']);
        if(!empty($query)) {
          if(isset($_SESSION['isLogin'])) {
            $to = "thakurtradingadda@gmail.com";
            $subject = "User query...";
            $message = $query."<br><span style='float: right;margin-right: 100px;'><b>- ".$_SESSION['name']."</b></span>";
            require 'scripts/mail.php';
            if(mailToApplicant($to, $subject, $message))
              $msg = "<h2 style='color: green;'>Your query has been sent...</h2>";
            else
              $msg = "<h2 style='color: red;'>Failed to send!</h2>";
          }
          else
            $msg = "<h2 style='color: red;'>Please login first!</h2>";
        }
        else {
          $msg = "<h2 style='color: red;'>Please enter your query!</h2>";
        }
      }
    ?>
    <div class="container">
      <div id="contact">
        <form action="" method="post">
          <br><br>Please enter your query below<br><br>
          <textarea name="query" placeholder="Enter your query..." ><?php echo htmlentities($query); ?></textarea>
          <input type="submit" name="send_feedback" value="SEND">
          <?php echo $msg; ?>
        </form>
      </div>
    </div>
    <div id="show_login_form" align="center">
      <?php include('login_form.php'); ?>
    </div>
    <footer>
      <?php include('footer.php'); ?>
    </footer>
  </body>
</html>
