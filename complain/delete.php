<?php
  include "../db.php";

  // Get the id from request and delete mysql row
  $id = $_REQUEST['id'];
  mysqli_query($con,"DELETE FROM complains WHERE id = '$id';");

  // Set flash message and redirect
  $_SESSION["message"] = "Complain with id " . $_REQUEST['id'] . " was removed.";
  header("Location: $home/admin/");
  die();

?>
