<?php include "../header.php"; ?>
<!-- Form validation with javascript. -->
<script>
  function validateForm() {
    pass = true;
    var title = document.forms["complain"]["title"].value;
    document.getElementById("title").innerHTML = "*";
    if (title==null || title=="") {
      document.getElementById("title").innerHTML = "* This field is required!! Please input a title.";
      pass = false;
    }
    // Checks is logged in or guest for form validation
    <?php if (empty($_SESSION["user"])){ ?>
      var name = document.forms["complain"]["name"].value;
      var email = document.forms["complain"]["email"].value;
      document.getElementById("name").innerHTML = "*";
      document.getElementById("email").innerHTML = "*";
      if (name==null || name=="") {
        document.getElementById("name").innerHTML = "* This field is required!! Please input a name.";
        pass = false;
      }
      var atpos = email.indexOf("@");
      var dotpos = email.lastIndexOf(".");
      if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        document.getElementById("email").innerHTML = "* Thats not a right email..";
        pass = false;
      }
    <?php } ?>
    return pass;
  }
</script>
<!-- Form for complain and Guest user info  -->
<form name="complain" action="complain.php" onsubmit="return validateForm()" method="post">
  <?php if (empty($_SESSION["user"])){ ?>
  <fieldset>
    <legend>Guest information:</legend>
    <label>Name:</label>
    <input type="text" name="name" size=20>
    <span id="name">*</span>
    <br><label>Email:</label>
    <input type="text" name="email" size=20>
    <span id="email">*</span>
    <br><label>Address:</label>
    <input type="text" name="address" value="" size=20>
    <br><label>Phone:</label>
    <input type="text" name="phone" value="" size=20>
  </fieldset>
  <?php } else { ?>
    <input style="display:none;" type="text" name="uid"   value="<?php echo $_SESSION["id"]; ?>">
  <?php } ?>
  <fieldset>
    <legend>Complaint:</legend>
    <label>Subject:</label>
    <select type="text" name="subject" value="">
      <?php include "subjects.php"; ?>
    </select>
    <label>Title:</label><input type="text" name="title" value="">
    <span id="title">*</span><br>
    <textarea  name="body" value=""></textarea>
    <input style="display:none;" type="text" name="date"   value="<?php echo date('Y-m-d h:i'); ?>">
  </fieldset>

  <input type="reset">
  <input type="submit">
</form>
