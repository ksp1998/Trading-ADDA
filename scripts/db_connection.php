<?php
  $SERVER = 'localhost';
  $USERNAME = '';
  $PASSWORD = '';
  $DB = 'Trading_ADDA';

  $conn = mysqli_db_connect($SERVER, $USERNAME, $PASSWORD) or die("Unable to connect!");
  if($conn)
    mysqli_select_db($DB);

?>
