<?php
  include "../db.php";

  $pass    = $_REQUEST["password"];
  $email   = $_REQUEST["email"];

  //Selects user and checks for right email
  $result = mysqli_query($con,"select * from users WHERE email = '$email' LIMIT 1;");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Checks for right password
    if ($pass == $row["password"]){
      $_SESSION["user"] = $email;
      $_SESSION["name"] = $row["name"];
      $_SESSION["address"] = $row["address"];
      $_SESSION["phone"] = $row["phone"];
      $_SESSION["id"] = $row["id"];

      // Check if user is admin and redirect him
      if ($email == $admin){
        $_SESSION["message"] = "Wellcome back we've redirected you to the admin interface!";
        header("Location: $home/admin");
        die();
      } else {
        $_SESSION["message"] = "Hello you signed in successfully!";
        header("Location: $home");
        die();
      }
    } else {
      $_SESSION["message"] =  "<span>Wrong password buddy! Are you trying to infiltrate this super secure application??</span>";
      header("Location: $home/session/new.php");
      die();
    }
  } else {
    $_SESSION["message"] = "<span>No user with email $email.</span>";
    header("Location: $home/session/new.php");
    die();
  }
 ?>
