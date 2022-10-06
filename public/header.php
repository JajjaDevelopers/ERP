<?php
session_start();
$_SESSION["servername"] = "localhost";
$_SESSION["username"] = "root";
$_SESSION["password"] = "root";
$_SESSION["dbname"] = "factory";

$servername = $_SESSION["servername"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = $_SESSION["dbname"];
$conn = new mysqli($servername, $username, $password, $dbname);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUCAFE FACTORY</title>
    
    <link rel="stylesheet" href=".\ASSETS\CSS\bootsrap/css/bootstrap.css">
    <link rel="stylesheet" href=".\ASSETS\CSS\forms.css">
    <script src=".\ASSETS\SCRIPTS\Jquery/jquery-3.6.0.js"></script>
    <script src=".\ASSETS\SCRIPTS\Jquery/jquery-ui/jquery-ui.js"></script>
    <link rel="stylesheet" href=".\ASSETS\SCRIPTS\Jquery/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href=".\ASSETS\SCRIPTS\Jquery/jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href=".\ASSETS\SCRIPTS\Jquery/jquery-ui/jquery-ui.theme.css">
    <script src=".\ASSETS\SCRIPTS\receivedgoods.js"></script>
    <link rel="stylesheet" href=".\ASSETS\CSS\main.css">
</head>
<body>
         <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-secondary navbar-dark" style="background-color: green;">
    <div class="container">
      <button 
        class="navbar-toggler" 
        type="button" data-bs-toggle="collapse" 
        data-bs-target="#navmenu"
      >
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="#learn" class="nav-link ">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">Processing</a>
          </li> -->
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Processing
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="Receivednote.php">Recieve Goods</a></li>
                <li><a class="dropdown-item" href="batchReport.php">Batch Report</a></li>
                <li><a class="dropdown-item" href="roasterydispatch.php">Dispatch</a></li>
                <li><a class="dropdown-item" href="#">Transfer</a></li>
                <li><a class="dropdown-item" href="#">Reprocessing</a></li>
                <li><a class="dropdown-item" href="hullerDisplay.php">Hulling</a></li> 
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Marketing
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="valuation.php">Valuation</a></li>
                <li><a class="dropdown-item" href="SalesReport.php">Sales Report</a></li>
                <li><a class="dropdown-item" href="CoffeeRelease.php">Coffee Release</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="#instructors" class="nav-link">Membership</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Roast & Ground
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="Receivednote.php">Recieve Goods</a></li>
                <li><a class="dropdown-item" href="activtySheet.php">Services</a></li>
                <li><a class="dropdown-item" href="roasterydispatch.php">Dispatch</a></li>
                <!-- <li><a class="dropdown-item" href="Receivednote.html">Recieve Goods</a></li>
                <li><a class="dropdown-item" href="activtySheet.html">Services</a></li>
                <li><a class="dropdown-item" href="roasteryDeliveryNote.html">Dispatch</a></li> -->
              </ul>

              <li class="nav-item">
            <a href="logout.php" class="nav-link">Log out</a>
          </li>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

