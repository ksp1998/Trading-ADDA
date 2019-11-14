<?php
  session_start();
  require 'scripts/menu_category.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Product View</title>
    <link type="text/css" rel="stylesheet" href="styles/home.css" />
    <link type="text/css" rel="stylesheet" href="styles/user_profile.css" />
    <style>
      .product_details {
        text-align: left;
      }
    </style>
  </head>
  <body>
    <?php
      include('menu.php');
      require "scripts/db_connection.php";
      require 'scripts/show_options.php';
      require 'scripts/myproduct.php';
    ?>
    <div class="container">
      <div class = "card">
        <h1>Your products</h1>
        <?php

          if($con) {
            if(!isset($_SESSION['isLogin']))
              header("Location:home.php");

            $query = "SELECT * FROM products WHERE user_email = '".$_SESSION['email']."'";
            //echo $query;
            $result = mysqli_query($con, $query);
            if(empty(mysqli_query($con, $query)))
              echo "<h1 style='color: red;'>You don't have currently online running product...<h1>";
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
                        <p>Uploaded on - <b>".$row['upload_date']."</b></p>
                        <h3>Rs. ".$row['price']." /-</h3>
                        <h3>Status - ";
                        echo $row['availability'] == "true" ? "<span style='color: red;'>Currently online...</span>" : "<span style='color: green;'>Sold</span>";
                        echo "</h3>
                        <form action='' method='post'>
                          <input type='hidden' name='id' value='".$row['id']."' />
                          <input type='hidden' name='availability' value='".($row['availability'] == 'true' ? 'false' : 'true')."' />
                          <input type='submit' name='remove' value='REMOVE' style='width: 20%; background-color: red; font-weight: bold;'/>
                          <input type='submit' name='sold' value='".($row['availability'] == 'true' ? 'MARK AS SOLD' : 'POST AGAIN')."' style='width: 20%; background-color: #38A6F6; font-weight: bold;'/>
                        </form>
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
