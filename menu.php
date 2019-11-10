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
        <button class="menu_link" ><p align="center">CATEGORIES</p></button>
        <div class="categories">
          <form action="" method="post">
            <button id="catgory" name="electronics">Electronics & Appliances</button>
            <button id="catgory" name="fashion">Fashion</button>
            <button id="catgory" name="furniture">Furniture</button>
            <button id="catgory" name="vehicles">Vehicles</button>
            <button id="catgory" name="books">Books</button>
            <button id="catgory" name="sports">Sports</button>
            <button id="catgory" name="other">Other</button>
        </form>
        </div>
      </div>

      <a class="menu_link" href="about_us.php"><p align="center">CONTACT US</p></a>
      <a class="menu_link" href="about_us.php"><p align="center">ABOUT US</p></a>
      <button id="login_btn" class="user_link" onclick="document.getElementById('show_login_form').style.display='block'">
        <p align="center">LOGIN</p>
      </button>
      <!--
      <button id="logout_btn" class="user_link" onclick="document.getElementById('logout_btn').style.display='none';document.getElementById('profile_link').style.display='none';document.getElementById('login_btn').style.display='block'" style='display: none;'>
        <p align="center">LOGOUT</p>
      </button>
      <a id="profile_link" class="user_link" href="user_profile.php" style='display: none;'><p align="center">PROFILE</p></a>
    -->
      <script type="text/javascript">
        function showhide() {
          var flag = document.getElementById('options');
          if(flag.style.display == 'block')
            flag.style.display = "none";
          else
            flag.style.display = "block";
        }
      </script>
      <?php
        if(isset($_POST['logout_btn'])) {
          $_SESSION['isLogin'] = NULL;
          $_SESSION['email'] = NULL; 
          header("Location:home.php");
        }
      ?>
      <button id="loggedin" class="user_link" onclick="showhide()"><img id="pro_img" src="images/profile_logo.png" /></button>
      <div id="options">
        <form action="" method="post">
          <a name="profile" href="user_profile.php">Profile</a>
          <button name="add_product">Add Product</button>
          <button name="logout_btn">LOGOUT</button>
        </form>
      </div>
      <form action="" method="post" class="search_box">
        <p><input class="search_btn" type="submit" name="search" background="images/search_icon.jpg" value="" />
        <input id="search" type="search" name="search_item" placeholder="Search Item..."/></p>
      </form>
    </div>
  </body>
</html>
