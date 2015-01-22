<?php
  include "../db.php";

  // Requests variables
  $name    = $_REQUEST["name"];
  $pass    = $_REQUEST["password"];
  $email   = $_REQUEST["email"];
  $address = $_REQUEST["address"];
  $phone   = $_REQUEST["phone"];

  // Insert user into database
  $sql = "INSERT INTO users (name, password, email, address, phone) VALUES ('$name','$pass','$email','$address','$phone')";
  if (mysqli_query($con,$sql) === TRUE) {
    echo "New record created successfully <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  // Fetch user to get his newly created id
  $result = mysqli_query($con,"select id from users WHERE email = '$email' LIMIT 1;");
  $user = mysqli_fetch_assoc($result);

  // New session
  $_SESSION["user"] = $email;
  $_SESSION["name"] = $name;
  $_SESSION["address"] = $address;
  $_SESSION["phone"] = $phone;
  $_SESSION['id'] = $user['id'];

  // Set flash message and redirect
  $_SESSION["message"] = "Wellcome " .   $_SESSION["name"] . ". Registration was successfull.";
  header("Location: $home");
  die();
?>
