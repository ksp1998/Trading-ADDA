<?php
  if(isset($_POST['remove'])) {
    $query = "DELETE FROM products WHERE id = ".$_POST['id'];
    $result = mysqli_query($con, $query);
    if(!$result)
      echo "<h1 style='color: red;'>Failed to delete</h1>";
  }

  if(isset($_POST['sold'])) {
    $query = "UPDATE products SET availability = '".$_POST['availability']."' WHERE id = ".$_POST['id'];
    $result = mysqli_query($con, $query);
    if(!$result)
      echo "<h1 style='color: red;'>Failed to change operation</h1>";
  }
?>
