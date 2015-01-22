<?php
  session_start();
  include "../variables.php";

  // Empty session info
  $_SESSION["user"]    = '';
  $_SESSION["name"]    = '';
  $_SESSION["address"] = '';
  $_SESSION["phone"]   = '';
  $_SESSION["id"]      = '';
  $_SESSION["message"] = 'You just signed out.';
  header("Location: $home");
  die();
?>
