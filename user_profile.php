<?php
  session_start();
  require 'scripts/menu_category.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <link type="text/css" rel="stylesheet" href="styles/user_profile.css" />
  </head>
  <body>
    <?php
      require 'menu.php';
      require 'scripts/restrict.php';
    ?>
    <div class="container">
      <!-- Data Goes Here  -->
      <div class="card" align="center">
        <div id="profile_image"><img src="images/profile_logo.png"></div>
        <div id="profile_info">
          <?php
            //print_r($_SESSION);
            require "scripts/db_connection.php";

            $msg = "";
            $dispMsg = "none";

            if(isset($_POST['update_details'])) {
              $name = $_POST['name'];
              $dob = $_POST['dob'];
              //$email = $_POST['email']
              $query = "UPDATE user SET name = '$name', dob = '$dob' WHERE email = '".$_SESSION['email']."'";
              $result = mysqli_query($con, $query);
              if($result) {
                //$msg = "<h3 style='color: green;'>Successfully updated...</h3>";
              }
              else {
                $dispMsg = "block";
                $msg = "<h3 style='color: red;'>Failed to update!</h3>";
              }
            }


            function fetchDetails($con) {
              $query = "SELECT * FROM user WHERE email = '".$_SESSION['email']."'";
              $result = mysqli_query($con, $query);
              //var_dump($result);
              if($result) {
                $row = mysqli_fetch_array($result);
                if(!empty($row))
                  return $row;
              }
              return NULL;
            }

            $row = fetchDetails($con);

            if(isset($_POST['edit_details'])) {
              if($row != NULL) {
                ?>
                <form action="" method="post">
                  <style> td { padding : 10px 25px; } </style>
                  <table>
                    <tr>
                      <td>Name</td>
                      <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required /></td>
                    </tr>
                    <tr>
                      <td>Date of Birth</td>
                      <td><input type="date" name="dob" value="<?php echo $row['dob']; ?>" required /></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="email" name="email" value="<?php echo $row['email']; ?>" disabled /></td>
                    </tr>
                    <tr>
                      <td id="button" colspan="2">
                        <input type="submit" name="update_details" value="Update Details" />
                      </td>
                    </tr>
                    </table>
                </form>
                <?php
              }
            }
            else {
              if($row != NULL) {
                ?>
                <table>
                  <tr>
                    <td>Name</td>
                    <td><?php echo $row['name']; ?></td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td>
                    <td><?php echo $row['dob']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr id="msg" style='display:<?php echo $dispMsg; ?>;'><td colspan="2" align="center"><?php echo $msg; ?></td></tr>
                  <tr>
                    <td id="button" colspan="2">
                      <form action="" method="post"><input type="submit" name="edit_details" value="Edit Details" /></form>
                    </td>
                  </tr>
                  </table>
                <?php
              }
            }
          ?>
        </div>
      </div>
    </div>
    <?php
      include('footer.php');
    ?>
  </body>
</html>
