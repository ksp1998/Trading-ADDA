<?php

  require "scripts/db_connection.php";

  function validateImage() {

		$image = $_FILES["image"];
		$source = $image['tmp_name'];
		$destination = "images/".$image['name'];
		$extension = strtolower(substr($image['name'], strpos($image['name'], '.')));
		if($image['name'] == "")
			$GLOBALS['msg'] = "<h2 style='color: red;'>Please select product image!</h2>";
		elseif(!($extension == '.jpg' or $extension == '.jpeg' or $extension == '.png' or $extension == '.gif'))
			$GLOBALS['msg'] = "<h2 style='color: red;'>Please select valid product image!</h2>";
		elseif($image['size'] == 0)
			$GLOBALS['msg'] = "<h2 style='color: red;'>Image size should be less than 1 mb!</h2>";
		else {
			if(move_uploaded_file($source, $destination)) {
				$GLOBALS['msg'] = "<h2 style='color: green;'>uploaded!</h2>";
				return 1;
			}
		}
		return 0;
	}

  $name = trim($_POST['name']);
  $desc = trim($_POST['description']);
  $image = $_FILES['image']['name'];
  $category = $_POST['category'];
  $price = $_POST['price'];



  if(strlen($name) <= 1)
    $msg = "<h3 style='color: red;'>Please enter valid name!</h3>";

  elseif(validateImage()) {
      if($price <= 0)
        $msg = "<h3 style='color: red;'>Please suggest valid price!</h3>";
      else {
        date_default_timezone_set('Asia/Kolkata');
        $query = "INSERT INTO products (product_name, ";
        $query .= ($desc != "") ? "description, " : "";
        $query .= "product_image, upload_date, category, price, user_email) VALUES('$name', ";
        $query .= ($desc != "") ? "'$desc', " : "";
        $query .= "'$image', '".date('l, jS M Y')."', '$category', $price, '".$_SESSION['email']."')";
  			$result = mysqli_query($con, $query);

  			if(!empty($result))
  				$msg = "<h2 style='color: green;'>Suceessfully added...</h2>";
  			else
  				$msg = "<h2 style='color: red;'>Failed to add!</h2>";
      }
		}
    //$msg = $query;
?>
