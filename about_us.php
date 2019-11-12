<?php
  session_start();
  require 'scripts/menu_category.php';
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
    ?>
    <div class="container">
      <div id="about">
          <h2>About</h2>
          <p align="center" style="width: 100%; font-size: 20px;">Trading ADDA is an online goods trading website which enables users/customers to buy and sell 2nd hand goods which are not needed anymore by them.</p>
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
