<?php
  include "../header.php";

  //Checks for right admin
  if ($_SESSION["user"] == $admin) {

    // Calculate last year
    $current_date = date_create(date('Y-m-d'));
    $lastYear = date_sub($current_date,date_interval_create_from_date_string("1 year"));
    $lastYearstr = date_format($lastYear,"Y/m/d");
    $post_since_last_year = 0;

    //Admin interface
    echo "<a href=\"new_subject.php\">Add a new subject</a><br>";

    //Table for number of complains per subject
    $subjects = mysqli_query($con,"select * from subjects;");
    if (mysqli_num_rows($subjects) > 0) {
      echo'<table><tr><th>Subjects</th><th>Complains Count</th><th></th></tr>';
      while($row = mysqli_fetch_assoc($subjects)) {
        $title = $row["title"];
        $count_query = mysqli_query($con,"select COUNT(*) FROM complains WHERE subject = '$title';");
        $count =  mysqli_fetch_assoc($count_query);
        echo "<tr><td>$title</td>";
        echo "<td>" . $count['COUNT(*)'] . "</td>";
        echo "<td><form action='delete_subject.php' method='post'><button name='title' value='$title'>Delete</button></form></td></tr>";
      }
      echo "</table>";
    } else {
      echo "<h3>Hurry!! You have no subjects</h3>";
    }

    // Complains with user name and delete button
    $complains = mysqli_query($con,"SELECT * FROM complains;");
    if (mysqli_num_rows($complains) > 0) {
      echo'<td><table><tr><th>Title of complain</th><th>Created by</th><th>Created at</th><th>';
      while($row = mysqli_fetch_assoc($complains)) {
        $title = $row["title"];
        $date = $row["created"];
        $id =  $row["id"];
        $uid = $row["uid"];
        $user_query = mysqli_query($con,"SELECT name FROM users WHERE id = '$uid';");
        $user = mysqli_fetch_assoc($user_query);
        $name = $user["name"];
        echo "<tr><td>$title</td>";
        echo "<td>$name</td>";
        echo "<td>$date</td>";
        echo "<td><form action='../complain/delete.php' method='post'><button name='id' value='$id'>Delete</button></form></td></tr>";

        // Counts complains since last year
        $date = date_create(str_split($date,10)[0]); // Split sting to include only the y/m/d
        if ($date > $lastYear){
          $post_since_last_year += 1;
        }
      }
      echo "</table>";
    } else {
      echo "<h3>No compalains yet!! You better get some feedback!</h3>";
    }

    echo "<br><h3>$post_since_last_year Posts since Last year ($lastYearstr)</h3>";

  } else {
    echo "Get out of here!!! You no admin!";
  }
?>
