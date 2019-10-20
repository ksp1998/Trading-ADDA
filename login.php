<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Trading Adda</title>
    <link type="text/css" rel="stylesheet" href="styles/login.css" />
  </head>
  <body>
    <div id="login_form" class="animate">

      <form action="?" method="post">
        Username<br>
        <input type="text" name="username" placeholder="Enter Username..." />
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." />
        <br><br>
        <input type="submit" name="submit" value="LOGIN">
        <br>
      </form>
      Not Registered!&nbsp;<button class="change_form" onclick="document.getElementById('register_form').style.display='block';document.getElementById('login_form').style.display='none';">Register here</button>
    </div>
    <div id="register_form" class="animate">
      <form action="?" method="post">
        Username<br>
        <input type="text" name="username" placeholder="Enter Username..." />
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." />
        <br><br>
        Email
        <input type="email" name="email" placeholder="Enter Email..." />
        <br><br>
        <input type="submit" name="submit" value="REGISTER">
        <br>
      </form>
      Already Registered!&nbsp;<button class="change_form" onclick="document.getElementById('login_form').style.display='block';document.getElementById('register_form').style.display='none';">Login here</button>
    </div>
  </body>
</html>
