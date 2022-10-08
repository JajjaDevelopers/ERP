<?php
require_once "header.php";
?>
<div class="container mt-5" id="divsignup">
  <form action="connection/formsignup.php" method="post">
  <div class="row">
    <div class="col-md-12 justify-content-center">
    <div>
        <h3 class="text-center text-primary" >Sign Up</h3>
           <!---Displaying errors--->
          <div class="container text-center text-danger bg-light">
          <?php
          include "alerts/errorsignup.php";
          ?>
          </div>
    </div>
      <div class="form-floating">
        <input type="text" name="fullname" class="form-control" >
        <label for="fullname"><strong>Full Name</strong></label>
      </div>
      <div class="form-floating mt-3">
        <input type="text" name="username" class="form-control">
        <label for="username"><strong>User Name</strong></label>
      </div>
      <div class="form-floating mt-3">
        <input type="email" name="email" class="form-control" >
        <label for="email"><strong>Email Address</strong></label>
      </div>
      <div class="form-floating mt-3">
        <input type="telephone" name="tel" class="form-control">
        <label for="tel"><strong>Tel</strong></label>
      </div>
      <div class="form-floating mt-3">
        <input type="password" name="pwd" class="form-control" >
        <label for="password"><strong>Password</strong></label>
      </div>
      <div class="form-floating mt-3">
        <input type="password" name="confpwd" class="form-control" >
        <label for="password"><strong>Confirm Password</strong></label>
      </div>
      <div class="form-group text-center">
        <input type="submit" name="submit" class="btn btn-primary my-3 btn-lg " id="signupbtn" value="Sign Up">
      </div>
    </div>
  </div>
  </form>
</div>
<?php
require_once "footer.php";
?>