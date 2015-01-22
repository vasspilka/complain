<?php include "../header.php"; ?>
<!-- Form validation with javascript. -->
<script>
function validateForm() {
  var name = document.forms["user"]["name"].value;
  var email = document.forms["user"]["email"].value;
  var password = document.forms["user"]["password"].value;
  document.getElementById("name").innerHTML = "*";
  document.getElementById("email").innerHTML = "*";
  document.getElementById("password").innerHTML = "*";
  pass = true;
  if (name==null || name=="") {
    document.getElementById("name").innerHTML = "* This field is required!! Please input a name.";
    pass = false;
  }
  if (password==null || password=="") {
    document.getElementById("password").innerHTML = "* Password is needed!";
    pass = false;
  }
  var atpos = email.indexOf("@");
  var dotpos = email.lastIndexOf(".");
  if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=email.length) {
    document.getElementById("email").innerHTML = "* Thats not a right email..";
    pass = false;
  }
  return pass;
}
</script>
<!-- Form for user -->
<form name="user" action="register.php" onsubmit="return validateForm()" method="get">
  <fieldset>
    <legend>Required:</legend>
    <br><label>Email:</label>
    <input type="text" name="email" value="" size=20>
    <span id="email">*</span>
    <br><label>Password:</label>
    <input type="text" name="password" value="" size=20>
    <span id="password">*</span>
    <br><label>Name:</label>
    <input type="text" name="name" value="" size=20>
    <span id="name">*</span>
  </fieldset>
  <fieldset>
    <legend>Optional:</legend>
    <br><label>Address:</label>
    <input type="text" name="address" value="" size=20>
    <br><label>Phone:</label>
    <input type="text" name="phone" value="" size=20>
  </fieldset>
  <input type="reset">
  <input type="submit">
</form>
