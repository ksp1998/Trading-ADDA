<?php

  if(!isset($_SESSION['category']))
    $_SESSION['category'] = "";

  if(isset($_POST['electronics'])) {
    $_SESSION['category'] = 'electronics';
    header('Location:home.php');
  }
  if(isset($_POST['fashion'])) {
    $_SESSION['category'] = 'fashion';
    header('Location:home.php');
  }
  if(isset($_POST['furniture'])) {
    $_SESSION['category'] = 'furniture';
    header('Location:home.php');
  }
  if(isset($_POST['vehicles'])) {
    $_SESSION['category'] = 'vehicles';
    header('Location:home.php');
  }
  if(isset($_POST['books'])) {
    $_SESSION['category'] = 'books';
    header('Location:home.php');
  }
  if(isset($_POST['sports'])) {
    $_SESSION['category'] = 'sports';
    header('Location:home.php');
  }
  if(isset($_POST['other'])) {
    $_SESSION['category'] = 'other';
    header('Location:home.php');
  }
  if(isset($_POST['search'])) {
    $_SESSION['searched'] = $_POST['search_item'];
    header('Location:home.php');
  }
?>
