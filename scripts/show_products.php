<?php
  require "db_connection.php";
  $images = array("car.jpg", "ball.jpg", "iphone.jpg", "chair.jpg", "laptop.jpg", "shoes.jpg", "back.jpg");
  $i = 0;
  if($con) {
    $query = "SELECT * FROM products";

    if(isset($_POST['electronics']))
      $query = "SELECT * FROM products WHERE category = 'Electronics'";
    if(isset($_POST['fashion']))
      $query = "SELECT * FROM products WHERE category = 'Fashion'";
    if(isset($_POST['furniture']))
      $query = "SELECT * FROM products WHERE category = 'Furniture'";
    if(isset($_POST['vehicles']))
      $query = "SELECT * FROM products WHERE category = 'Vehicles'";
    if(isset($_POST['books']))
      $query = "SELECT * FROM products WHERE category = 'Books'";
    if(isset($_POST['sports']))
      $query = "SELECT * FROM products WHERE category = 'Sports'";
    if(isset($_POST['other']))
      $query = "SELECT * FROM products WHERE category = 'Other'";

    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)) {
      echo "<table><tr name='product_field' class='product_field'>";
      echo "<td class='product_img'>
              <div>
                <a href='http://localhost/TRADINGADDA/images/$images[$i]'><img src='images/".$images[$i]."' alt='Product image'></a>
                <!--<img src='data:image;base64,".$row['product_image']."' alt='Product image'>-->
              </div
            </td>";
      echo "<td class='product_details'>
              <div>
                  <p><b>".$row['product_name']."</b></p>
                  <p>".$row['description']."</p>
                  <p>Uploaded By</p>
                  <p>Uploaded on - <b>".$row['upload_date']."</b></p>
                  <h3>Rs. ".$row['price']." /-</h3>
              </div>
            </td>
          </tr></table>";
        $i++;
    }
  }
?>















<?php
  /*
    $images = array("car.jpg", "ball.jpg", "iphone.jpg", "chair.jpg", "laptop.jpg", "shoes.jpg");
    for($i = 0; $i < sizeof($images); $i++) {
      echo "<tr class='product_field'>
              <td class='product_img'>
                <div>
                  <img src='images/$images[$i]' alt='Product image'>
                </div
              </td>
              <td class='product_details'>
                <div>
                    <p>".str_replace(".jpg", "", $images[$i])."</p>
                    <p>Description</p>
                    <p>Uploaded By</p>
                    <p>Uploaded on</p>
                </div>
              </td>
            </tr>";
    }
  */
?>
