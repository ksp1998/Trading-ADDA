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
    ?>
    <div id="contact" class="animate">
      <form action="?" method="post">
        Please enter your below<br>
        <input type="text" name="query" placeholder="Enter Query..." />
        <input type="submit" name="submit" value="SEND">
      </form>
    </div>
    <script>
      document.getElementById("login_btn").style.display = 'none';
    </script>
  </body>
</html>
