<?php
  $SERVER = 'localhost';
  $USERNAME = 'root';
  $PASSWORD = '';
  $DB = 'trading_adda';

  @$con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB)
  or
  die("<center><h3 style='width: 100%;color: red;'>Oops, Unable to connect with database!</h3><center>");
?>
