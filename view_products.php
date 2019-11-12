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
      if($_SESSION['isLogin'] == true) {
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
      view product page
    </div>
  </body>
</html>
