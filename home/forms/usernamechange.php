<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class=" text-center">
    <form action="../connection/changeusername.php" method="POST">
      <div class="form-floating">
        <input type="text" name="newName" class="form-control">
        <label for="username">Enter New Username</label>
      </div>
      <div class="form-floating mt-3">
        <input type="password" name="pass" class="form-control">
        <label for="username">Enter your password to change name</label>
      </div>
      <input type="submit" name="changeName" class="btn btn-primary my-3 btn-lg text-center" value="Change Username">
    </form>
  </div>
</body>
</html>