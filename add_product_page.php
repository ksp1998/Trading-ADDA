<?php
  session_start();

  $msg = "";
  $name = "";
  $desc = "";
  $image = "";
  $category = "";
  $price = "";

  if(isset($_POST['add'])) {
    require 'scripts/add_product.php';
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <link type="text/css" rel="stylesheet" href="styles/add_product.css" />
  </head>
  <body>
    <?php
      include('menu.php');
      if($_SESSION['isLogin'] == true) {
        // If logged in, hide login option and show profile link & logout option
        ?>
        <script type='text/javascript'>
          document.getElementById("login_btn").style.display = 'none';
          //document.getElementById("profile_link").style.display = 'none';
          //document.getElementById("logout_btn").style.display = 'block';
          document.getElementById("loggedin").style.display = 'block';
        </script>
        <?php
      }
      else {
        header('Location: home.php');
      }
    ?>
    <div class="container">
      <!-- Data Goes Here  -->
      <div class="card">
        <div id="product_form">
          <form action="" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <td>Enter Product Name</td>
                <td><input type="text" name="name" value="<?php echo htmlentities($name); ?>" title="This field is required" placeholder="Enter Your Name..." required /></td>
              </tr>
              <tr>
                <td>Enter Product Description (Optional)</td>
                <td><textarea name="description"><?php echo htmlentities($desc); ?></textarea></td>
              </tr>
              <tr>
                <td>Upload Product Image</td>
                <td><input type="file" name="image" accept=".png, .jpg, .jpeg, .gif" required/></td>
              </tr>
              <tr>
                <td>Select Product Category</td>
                <td>
                  <select name="category" required>
                    <option <?php echo $category == "Electronics & Appliances" ? "selected" : "" ?>>Electronics & Appliances</option>
                    <option <?php echo $category == "Fashion" ? "selected" : "" ?>>Fashion</option>
                    <option <?php echo $category == "Furniture" ? "selected" : "" ?>>Furniture</option>
                    <option <?php echo $category == "Vehicles" ? "selected" : "" ?>>Vehicles</option>
                    <option <?php echo $category == "Books" ? "selected" : "" ?>>Books</option>
                    <option <?php echo $category == "Sports" ? "selected" : "" ?>>Sports</option>
                    <option <?php echo $category == "Other" ? "selected" : "" ?>>Other</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Suggested Price</td>
                <td><input type="number" name="price" value="<?php echo htmlentities($price); ?>" placeholder="Suggested Price..." required /></td>
              </tr>

              <tr >
                <td colspan="2"><center><?php echo $msg; ?></center></td>
              </tr>
              <tr >
                <td id="button" colspan="2"><input type="submit" name="add" value="ADD" /></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <?php
      include('footer.php');
    ?>
  </body>
</html>
