<?php
  session_start();
  require 'scripts/menu_category.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Product View</title>
    <link type="text/css" rel="stylesheet" href="styles/view_product.css" />
  </head>
  <body>
    <?php
      include('menu.php');
      require 'scripts/show_options.php';

    ?>
    <div class="container">
      <div class = "card">
        <h1>Product Details</h1>
        <?php
          require "scripts/db_connection.php";

          if($con) {
            if(!isset($_POST['id']))
              header("Location:home.php");

            $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.id = ".$_POST['id'];
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
              echo "
                  <table>
                    <tr name='product_field' class='product_field'>";
                    echo "
                    <td class='product_img'>
                      <div>
                        <a href='http://localhost/TRADINGADDA/images/products/".$row['product_image']."'><img src='images/products/".$row['product_image']."' alt='Product image'></a>
                      </div>
                    </td>";
                    echo "
                    <td class='product_details'>
                      <div>
                        <p>Product : <b>".$row['product_name']."</b></p>
                        <p>Description - <b>".$row['description']."</b></p>
                        <p>Category - <b>".$row['category']."</b></p>
                        <p>Uploaded by - <b>".$row['name']."</b></p>
                        <p>Uploaded on - <b>".$row['upload_date']."</b></p>
                        <h3>Rs. ".$row['price']." /-</h3>
                    ";
                    if(isset($_SESSION['email']) AND $row['email'] == $_SESSION['email'])
                      echo "<h2 style='color: green;'>Your product is currently online...<h2>";
                    elseif(isset($_SESSION['isLogin']) and $row['availability'] == "true")
                      echo "<h2 style='color: green;'>Product is available...<br><br>You can contact to <span style='color: blue;'>".$row['name']."</span> using email <span style='color: blue;'>".$row['email']."</span> regarding this product...<h2>";
                    elseif($row['availability'] == "false")
                      echo "<h2 style='color: red;'>Oops! product has been sold...<h2>";
                    else
                      echo "<h2 style='color: red;'><span style='color: green;'>Product is available...<br><br></span>Please login to contact with <span style='color: blue;'>".$row['name']."</span> regarding this product...<h2>";
                    echo "
                      </div>
                    </td>
                  </tr>
                </table>";
              }
          }
        ?>
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
