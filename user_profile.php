<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <link type="text/css" rel="stylesheet" href="styles/user_profile.css" />
  </head>
  <body>
    <?php
      include('menu.php');
      if(isset($_SESSION['email'])) {
        // If logged in, hide login option and show profile link & logout option
        ?>
        <script type='text/javascript'>
          document.getElementById("login_btn").style.display = 'none';
          document.getElementById("profile_link").style.display = 'none';
          document.getElementById("logout_btn").style.display = 'block';
        </script>
        <?php
      }
    ?>
    <div class="container">
      <!-- Data Goes Here  -->
    </div>
    <?php
      include('footer.php');
    ?>
  </body>
</html>
