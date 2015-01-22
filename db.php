<?php
  session_start();

  // Custom variables
  include "variables.php";

  // Connects to database
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if (!$con) {
    die('Could not connect: ' . mysql_error());
  }
  echo "<br>";
?>
