<?php
  include "../db.php";

  // Add a select form option for each subject
  $subject = mysqli_query($con,"select * from subjects;");
  if (mysqli_num_rows($subject) > 0) {
    while($row = mysqli_fetch_assoc($subject)) {
      $title = $row["title"];
      echo "<option value=\"$title\">$title</option>";
    }
  } else {
    echo "<option value=\"Any subject\">Any subject (No subject added yet)</option>";
  }
?>
