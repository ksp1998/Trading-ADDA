<?php
  require "db_connection.php";

  if($con) {
    $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email";

    if(!isset($_SESSION['category']))
      $_SESSION['category'] = NULL;

    if(isset($_POST['electronics']) OR $_SESSION['category'] == 'electronics')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Electronics'";

    if(isset($_POST['fashion']) OR $_SESSION['category'] == 'fashion')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Fashion'";

    if(isset($_POST['furniture']) OR $_SESSION['category'] == 'furniture')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Furniture'";

    if(isset($_POST['vehicles']) OR $_SESSION['category'] == 'vehicles')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Vehicles'";

    if(isset($_POST['books']) OR $_SESSION['category'] == 'books')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Books'";

    if(isset($_POST['sports']) OR $_SESSION['category'] == 'sports')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Sports'";

    if(isset($_POST['other']) OR $_SESSION['category'] == 'other')
      $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email WHERE products.category = 'Other'";

    if(isset($_POST['search']) OR isset($_SESSION['searched'])) {
      $searched = isset($_POST['search']) ? $_POST['search_item'] : $_SESSION['searched'];
      if(trim($searched) != "")
        $query = "SELECT * FROM products INNER JOIN user ON products.user_email = user.email
                  WHERE products.category = '$searched'
                  OR products.product_name = '$searched'
                  OR user.name = '$searched'";
      }

    // unset session variables which is set ob other pages
    if(isset($_SESSION['category']))
      unset($_SESSION['category']);

    if(isset($_SESSION['searched']))
      unset($_SESSION['searched']);

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
              <form action='view_products.php' action='post'>
                <input type='submit' name='checkout' value='CHECKOUT' style='width: 20%; background-color: #38A6F6; font-weight: bold;'/>
              </form>
            </td>
          </tr></table>";
        //$i++;
    }
  }
?>
