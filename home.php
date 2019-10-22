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
    ?>
    <!--
    <div class="heading">TRADING ADDA<br>
      <span>- Trade Goods Online</span>
    </div>-->
    <div class="data_cards">
      <h1>Recommended Products</h1>
      <table border='0' cellspacing='40'>
        <?php
          $images = array("car.jpg", "ball.jpg", "iphone.jpg", "chair.jpg", "laptop.jpg", "shoes.jpg");
          for($i = 0; $i < 10; $i++) {
            echo "<tr>";
              for($j = 0; $j < 4; $j++) {
                $n = rand(0, 5);
                echo "
                  <td>
                    <div class='product_img'>
                      <img src='images/$images[$n]' alt='Product image'>
                    </div>
                    <div class='product_name' >
                        Product name
                    </div>
                  </td>";
              }
            echo "</tr>";
          }
        ?>
      </table>
    </div>
    <div id="show_login_form" align="center">
      <?php
        include('login.php');
      ?>
    </div>
    <?php
      include('footer.html');
    ?>
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
