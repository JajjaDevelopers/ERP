<?php
require_once "header.php";
?>
<div class="text-center text-warning mt-4">
  <?php
  //message for successful sign Up by a person
  $error="";
  if(isset($_GET["error"]))
  {
    // if$_SESSION["success"]=$_GET["message"];
    echo("<p>You have signed up successful. You can now login!</p>");
  }

  //message upon password reset
  if(isset($_GET["newpwd"]))
  {
    if($_GET["newpwd"]=="newpasswordupdated")
    {
      echo "Thine password hast been updated successfully";
    }
 }
?>
</div>
<div class="container mt-5" id="divlogin">
  <div class="card my-4">
    <div class="card-header">
      <h3 class="text-center text-primary" >LOGIN</h3>
    </div>
    <div class="card-body">
    <form action="connection/formlogin.php" method="post">
  <div class="row">
    <div class="col-md-12 justify-content-center">

      <div class="form-group">
        <label for="username"><strong>User Name or Email Address</strong></label>
        <input type="text" name="username" class="form-control">
      </div>
      <div class="form-group">
        <label for="username"><strong>Password</strong></label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="form-group text-center">
        <div class="text-success text-center">
          <?php
          include "alerts/errorlogin.php";
          ?>
        </div>
        <input type="submit" name="submit" class="btn btn-primary my-3 btn-lg " id="loginbtn" value="Login">
      </div>
    </div>
  </div>
  </form>
</div>

<div class="card-footer">
  <h4><a href="reset-password.php">Forgotten Password?</a></h4>
</div>
  
  </div>
</div>
  
<?php
require_once "footer.php";
?>