<?php
  include "../db.php";

  //Checks for right admin
  if ($_SESSION["user"] == $admin) {

    // Get the title from request and delete mysql row
    $title = $_REQUEST['title'];
    mysqli_query($con,"DELETE FROM subjects WHERE title = '$title';");

    // Set flash message and redirect
    $_SESSION["message"] = "Subject with title " . $_REQUEST['title'] . " was removed.";
    header("Location: $home/admin/");
    die();
  } else {
    echo "Get out of here!!! You no admin!";
  }
?>
