<?php

  include "../db.php";

  // Some style :D
  echo "<style>a{margin-right:30px;}textarea{height:250px;width:600px;}table{float:left;margin-right:80px;}span{color:red;}";
  echo "h4{margin-top:30px;border-top:3px solid black;}td,th{padding-right:30px;}.message{color:green;}</style>";

  // Initialize used variables
  if (empty($_SESSION["user"])){
    $_SESSION["name"] = $_SESSION["user"] = $_SESSION["address"] = $_SESSION["phone"] =  '';
  }
  if (empty($_SESSION["message"])){
    $_SESSION["message"] = '';
  }

  // Navigation
  echo  "<a href= $home >Home</a>\n";
  echo  "<a href= $home/complain/form.php >New complain</a>\n";
  if ($_SESSION["user"] != ''){
    echo "<a href='$home/session/delete.php'>Logout</a>\n";
    if ($_SESSION["user"] == $admin){
      echo "<a href='$home/admin'>Admin interface</a>";// Admin interface!! Yay!
    }
  } else {
    echo "<a href='$home/session/new.php'>Login</a>";
    echo  "<a href='$home/user/new.php'>Register</a>\n";
  }

  // Greeting
  if (!empty($_SESSION["user"])){
    $name = $_SESSION["name"];
    echo "<h2>Wellcome $name </h2>";
  }

  // Show flash message and then empty it
  echo "<h3 class='message'>" . $_SESSION["message"]  . "</h3>";
  $_SESSION["message"] = '';

?>
