<?php
  include "../header.php";

  //Checks for right admin
  if ($_SESSION["user"] == $admin) {

    echo "<h1>Add a new subject</h1>";

    // Checks if form is submited or not
    if (!isset ($_REQUEST["title"])) {
?>
<form action="" method="post">
  Subject: <input type="text" name="title" value="" size=20>
  <input type="submit">
</form>
<?php } else {

    // Get subject title and insert into database
    $title = $_REQUEST["title"];
    $sql = "INSERT INTO subjects (title) VALUES ('$title')";
    if (mysqli_query($con,$sql) === TRUE) {
      echo "New record created successfully <br>";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Set flash message and redirect
    $_SESSION["message"] = "Subject " . $_REQUEST['title'] . " added successfully";
    header("Location: $home/admin/new_subject.php");
    die();
    }
  } else {
    echo "Get out of here!!! You no admin!";
  }
?>
