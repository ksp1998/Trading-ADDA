<?php
  session_start();
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
      if(isset($_SESSION['email'])) {
        // If logged in, hide login option and show profile link & logout option
        ?>
        <script type='text/javascript'>
          document.getElementById("login_btn").style.display = 'none';
          document.getElementById("profile_link").style.display = 'block';
          document.getElementById("logout_btn").style.display = 'block';
        </script>
        <?php
      }
    ?>
    <div class="container">
      <div id="about">
          <h2>About</h2>
          Trading ADDA is an online goods trading website which enables users/customers to buy and sell 2nd hand goods which are not needed anymore for customers.
      </div>
      <div id="contact">
        <form action="?" method="post">
          <br><br>Please enter your query below<br><br>
          <textarea placeholder="Enter Your Query..." ></textarea>
          <input type="submit" name="submit" value="SEND">
        </form>
      </div>
    </div>
    <script>
      document.getElementById("login_btn").style.display = 'none';
    </script>
  </body>
</html>
