<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="styles/login.css" />
  </head>
  <body>
    <div id="login_form" class="animate">

      <form action="?" method="post">
        Email<br>
        <input type="email" name="email" placeholder="Enter Email..." required/>
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." required/>
        <br><br>
        <input type="submit" name="submit" value="LOGIN">
        <br>
      </form>
      Not Registered!&nbsp;<button class="change_form" onclick="document.getElementById('register_form').style.display='block';document.getElementById('login_form').style.display='none';">Register here</button>
    </div>
    <div id="register_form" class="animate">
      <form action="?" method="post">
        First Name<br>
        <input type="text" name="fname" placeholder="Enter First Name..." required/>
        <br><br>
        Last Name<br>
        <input type="text" name="lname" placeholder="Enter Last Name..." required/>
        <br><br>
        Email
        <input type="email" name="email" placeholder="Enter Email..." required/>
        <br><br>
        Password<br>
        <input type="password" name="password" placeholder="Enter Password..." required/>
        <br><br>
        Confirm Password<br>
        <input type="password" name="confirm_password" placeholder="Re-enter Password..." required/>
        <br><br>
        <input type="submit" name="submit" value="REGISTER">
        <br>
      </form>
      Already Registered!&nbsp;<button class="change_form" onclick="document.getElementById('login_form').style.display='block';document.getElementById('register_form').style.display='none';">Login here</button>
    </div>
  </body>
</html>
