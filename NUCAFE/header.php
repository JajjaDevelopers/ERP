<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NUCAFE</title>
  <link href=".\ASSETS\bootsrap\css\bootstrap.min.css" rel="stylesheet">
  <link href=".\ASSETS\stylesheet.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <script src=".\ASSETS\jquery-3.6.0.js"></script>
    <script src=".\ASSETS\jquery-ui/jquery-ui.js"></script>
    <script src=".\ASSETS\jquery.js"></script> -->
    <!-- <link rel="stylesheet" href=".\ASSETS\jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href=".\ASSETS\jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href=".\ASSETS\jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet"href=".\ASSETS\owlcarousel\dist\assets\owl.carousel.min.css">
    <link rel="stylesheet" href=".\ASSETS\owlcarousel\dist\assets\owl.theme.default.css"> -->
</head>
<body>
  <!-----Header section--->
  <div class="row">
    <div class="col-1" id="img" >
      <img src="images\Logo.jpg" alt="NUCAFE LOGO" id="logo"/>
    </div>
    <div class="col-11">
    <nav class="navbar navbar-expand-lg navbar-dark" id="nav" style="background-color: green;">
    <div class="container-fluid">
      <a class="navbar-brand h1 text-warning" href=".\index.php">NUCAFE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>NUCAFE
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="header">
          <li class="nav-item" >
            <a class="nav-link active" aria-current="page" href="./index.php" class="navlist">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" class="navlist">Login</a>
          </li>
          
          <?php
             if(isset(  $_SESSION["userName"]))
             {
                echo '<li class="nav-item"> <a class="nav-link " href="logout.php" 
                class="navlist">Log Out</a></li>';
             } else
             {
              echo'<li class="nav-item">
                <a class="nav-link" href="signup.php" class="navlist">Signup</a>
                </li>';
             }
          ?>
        </ul>
      </div>
    </div>
  </nav>
    </div>
  </div>
