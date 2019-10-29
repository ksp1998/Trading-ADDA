<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="styles/theme.css" />
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="nav_bar">
      <a class="logo" href="http://localhost/TRADINGADDA/images/logo.png"><img src="images/logo2.png"  /></a>
      <a class="menu_link" href="home.php"><p align="center">HOME</p></a>

      <div class="dropdown">
        <a class="menu_link" href="home.php"><p align="center">CATEGORIES</p></a>
        <div class="categories">
          <form action="" method="post">
            <button name="electronics">Electronics & Appliances</button>
            <button name="fashion">Fashion</button>
            <button name="furniture">Furniture</button>
            <button name="vehicles">Vehicles</button>
            <button name="books">Books</button>
            <button name="sports">Sports</button>
            <button name="other">Other</button>
        </form>
        </div>
      </div>

      <a class="menu_link" href="about_us.php"><p align="center">CONTACT US</p></a>
      <a class="menu_link" href="about_us.php"><p align="center">ABOUT US</p></a>
      <!--<a class="user_link" href="signup.php"><p align="center">SIGN UP</p></a>-->
      <button id="login_btn" class="user_link" onclick="document.getElementById('show_login_form').style.display='block'"><p align="center">LOGIN</p></button>
      <p class="search_box">
        <a href="#"><img class="search_btn" src="images/search_icon.jpg" /></a>
        <input type="search" placeholder="Search Item..."/>
      </p>
    </div>
  </body>
</html>
