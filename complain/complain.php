<?php
include "../db.php";

// Check for user Session
if (empty($_SESSION["user"])){
  $name    = $_REQUEST["name"];
  $email   = $_REQUEST["email"];
  $address = $_REQUEST["address"];
  $phone   = $_REQUEST["phone"];

  // Insert guest user info
  $sql = "INSERT INTO users (name, email, address, phone) VALUES ('$name','$email','$address','$phone')";
  if (mysqli_query($con,$sql) === TRUE) {
    echo "New record created successfully <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  // Fetch user to get his newly created id or get uid from the request
  $user_query = mysqli_query($con,"select * from users WHERE email = '$email' LIMIT 1;");
  $user = mysqli_fetch_assoc($user_query);
  $uid = $user["id"];
} else {
  $uid = $_REQUEST['uid'];
}

$title   = $_REQUEST["title"];
$subject = $_REQUEST["subject"];
$body    = $_REQUEST["body"];
$date    = $_REQUEST["date"];

// Insert complain into database with uid
$sql = "INSERT INTO complains (subject, body, uid, title, created) VALUES ('$subject','$body','$uid','$title','$date')";
if (mysqli_query($con,$sql) === TRUE) {
  echo "New record created successfully <br>";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

// Set flash message and redirect
$_SESSION["message"] = "New complain with subject " . $_REQUEST["subject"] . " created";
header("Location: $home");
die();

?>
