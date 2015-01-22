<?php
  include "header.php";

  // Fetches complains and prints them
  $complains = mysqli_query($con,"select * from complains;");
  if (mysqli_num_rows($complains) > 0) {
    while($row = mysqli_fetch_assoc($complains)) {
      $title = $row["title"];
      $subject = $row["subject"];
      $body = $row["body"];
      echo "<h4>$subject</h4><h2>$title</h2><p>$body</p><br><br>";
    }
  } else {
    echo "No complains yet";
  }
?>
