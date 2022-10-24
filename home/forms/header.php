<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Material Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <!-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> -->
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <!--Other files--->
     
  <!-- <link rel="stylesheet" href=".\ASSETS\CSS\bootsrap/css/bootstrap.css"> -->
  <script src="../assets/js/Jquery/jquery-3.6.0.js"></script>
  <script src="../assets/js/Jquery/jquery-ui/jquery-ui.js"></script>
  <link rel="stylesheet" href="../assets/js/Jquery/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="../assets/js/Jquery/jquery-ui/jquery-ui.structure.css">
  <link rel="stylesheet" href="../assets/js/Jquery/jquery-ui/jquery-ui.theme.css">
  <script src="../assets/js/receivedgoods.js"></script>
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo2.png" alt="Logo">
        <span class="d-none d-lg-block">JAJJA</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><span class="material-icons-sharp">search</span></button>
      </form>
    </div><!-- End Search Bar -->

    <!--Current Time-->
    <div class="mx-auto">
      <h1 class="text-primary" id="current_time"></h1>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
          <span class="material-symbols-sharp">
            <!-- search -->
          </span>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">
        
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <span class="material-icons-sharp">
          notifications
          </span>
          </a><!-- End Notification Icon -->

    
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php
                if(isset(  $_SESSION["userName"])){
                  echo $_SESSION["userName"];
                }
              ?>
            </span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <!-- <h6>Kibooli Felix</h6> -->
              <?php
                if(isset(  $_SESSION["fullName"]))
                {
                  ?>
                    <p class="text-info me-3"><?=$_SESSION["fullName"]?></p>
                  <?php
                }
              ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <span class="material-icons-sharp">
              person
              </span>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <span class="material-icons-sharp">
                  settings
                  </span>
                <span> Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <span class="material-icons-sharp">
                  logout
                  </span>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <span class="material-icons-sharp">
            grid_view
            </span>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Data Input Forms</li>

      <li class="nav-item">
        <div class="dropdown">
          <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#FFFFFF;border:none;">
            <span class="material-icons-sharp">
            folder
            </span>
           <span>Processing</span>
            
            </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><h6 class="dropdown-header">Processing Data Entry Forms</h6></li>
                <li><a class="dropdown-item active"  aria-current="true" href="Goods_Received_Note.php">Recieve Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item active"aria-current="true" href="batchProcessingOrder.php">Batch Processing Order</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item active"aria-current="true" href="batchReport.php">Batch Report</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="roasterydispatch.php">Dispatch</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Transfer</a></li>
                 <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Reprocessing</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Hulling</a></li> 
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#FFFFFF;border:none;">
                <span class="material-icons-sharp">
                folder
                </span>
                <span>Marketing</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header">Marketing Data Entry Forms</h6></li>
                <li><a class="dropdown-item" href="valuation.php">Valuation</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="SalesReport.php">Sales Report</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="CoffeeRelease.php">Coffee Release</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#FFFFFF;border:none;">
              <span class="material-icons-sharp">
                folder
                </span>
                <span>Roast &#38; Ground</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header">Roast &#38; Data Entry Forms</h6></li>
                <li><a class="dropdown-item" href="Goods_Received_Note.php">Recieve Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="activtySheet.php">Services</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="roasterydispatch.php">Dispatch</a></li>
              </ul>
            </div>
          </li>

          
          <!---Analytics--->
          <li class="nav-heading">Analytics</li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#FFFFFF;border:none;">
              <span class="material-icons-sharp">
                analytics
                </span>
                <span>Charts &#38;Graphs</span>
              </button>
              <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header">Roast &#38; Data Entry Forms</h6></li>
                <li><a class="dropdown-item" href="Receivednote.php">Recieve Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="activtySheet.php">Services</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="roasterydispatch.php">Dispatch</a></li>
              </ul> -->
            </div>
          </li>

          <?php
             if(isset($_SESSION["Access"])||$_SESSION["Access2"])
             {
              if($_SESSION["Access"]==1||$_SESSION["Access2"]==1)
              {
                ?>
                <li class="nav-item">
                  <div class="nav-item">
                    <span class="material-icons-sharp">
                    person_add
                    </span>
                    <a class="nav-item" href="signup.php">Create New User</a>
                  </div>
                </li>
              <?php
              }
             }
          ?>
      </aside><!-- End Sidebar-->
  <main id="main" class="main">
 