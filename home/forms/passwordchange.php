<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
     #changepwdbtn:hover{
           background-color:green;
      }
      #changepwdbtn:focus{
          background-color:#765341;
      }
  </style>
<body>
  <div class="container text-center">
    <form action="../connection/changepassword.php" method="POST" style="border:none;">
      <div class="form-floating">
        <input type="password" name="newPassword" class="form-control">
        <label for="newpassword">Enter New Password</label>
      </div>
      <div class="form-floating mt-3">
        <input type="password" name="newPasswordConf" class="form-control">
        <label for="newpassword">Confirm New Password</label>
      </div>
      <input type="submit" id="changepwdbtn" name="changebtn" class="btn btn-primary my-3 btn-lg" value="Change Password">
    </form>
  </div>
</body>
</html>