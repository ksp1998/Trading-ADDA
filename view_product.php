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
        <?php
          require "scripts/db_connection.php";

          if($con) {
              $query = "SELECT * FROM products WHERE id = ".$_POST['id'];
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result)) {
                echo "<table><tr name='product_field' class='product_field'>";
                echo "<td class='product_img'>
                        <div>
                          <a href='http://localhost/TRADINGADDA/images/".$row['product_image']."'><img src='images/".$row['product_image']."' alt='Product image'></a>
                        </div>
                      </td>";
                echo "<td class='product_details'>
                        <div>
                            <p><b>".$row['product_name']."</b></p>
                            <p>".$row['description']."</p>
                            <p>Uploaded by - <b>".$row['name']."</b></p>
                            <p>Uploaded on - <b>".$row['upload_date']."</b></p>
                            <h3>Rs. ".$row['price']." /-</h3>
                            </div>

                      </td>
                    </tr></table>";
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
