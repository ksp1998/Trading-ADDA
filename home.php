<?php
  // Start the session
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Trading Adda</title>
    <link type="text/css" rel="stylesheet" href="styles/theme.css" />
    <link type="text/css" rel="stylesheet" href="styles/home.css" />
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
    <div class="data_cards">
      <h1 class="heading">Recommended Products</h1>
      <?php include("scripts/show_products.php"); ?>
    </div>
    <div id="show_login_form" align="center">
      <?php include('login_form.php'); ?>
    </div>
    <?php print_r($_SESSION);  ?>
    <footer>
      <?php include('footer.php'); ?>
    </footer>
    <script>
      // Get the form
      var container = document.getElementById('show_login_form');
      // When the user clicks anywhere outside of the form, close it
      window.onclick = function(event) {
          if (event.target == container) {
              container.style.display = "none";
          }
      }
    </script>
  </body>
</html>
