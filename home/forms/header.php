<?php 
 session_start();

 error_reporting(1);
 
 if(isset($_SESSION["userName"]))
 {
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $pageTitle ?></title>
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

     
  <link rel="stylesheet" href="../assets/css/bootsrap/css/bootstrap.min.css">
  <script src="../assets/js/Jquery/jquery-3.6.0.js"></script>
  <script src="../assets/js/Jquery/jquery-ui/jquery-ui.js"></script>
  <link rel="stylesheet" href="../assets/js/Jquery/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="../assets/js/Jquery/jquery-ui/jquery-ui.structure.css">
  <link rel="stylesheet" href="../assets/js/Jquery/jquery-ui/jquery-ui.theme.css">
  <!--CSS FILES-->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
  <script src="../assets/plotly/plotly-2.16.1.min.js"></script>
</head>
<style>
  #settingslist{
    background-color:green;
  }
  #settingslist li a,#searchbtn{
    color:#EAC117;
  }
  #settingslist li a:hover{
    color:white;
    background-color: brown;
  }
  #searchbtn:hover{
    color:green;
  }
  #searchbtn:focus{
    color:blue;
  }
  #searchform{
    border:none;
  }
 
  #openbtn,#closebtn,#current_time,#username{
    background-color: green;
    color:#EAC117;
  }
  #openbtn:hover,#closebtn:hover,#current_time:hover,#username:hover{
    background-color:#765341;
    color:white;
  }
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo2.jpg" alt="Logo">
        <span class="d-none d-lg-block">NGL</span>
      </a>
      <button class="btn" id="openbtn" style="display:none;">&#9776;Open Sidebar</button>
      <button class="btn" id="closebtn">&#9776; Close Sidebar</button>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" id="searchform" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" id="searchbtn" title="Search"><span class="material-icons-sharp">search</span></button>
      </form>
    </div><!-- End Search Bar -->

    <!--Current Time-->
    <div class="mx-auto">
      <button class="btn" id="current_time">Time</button>
    </div>

    <div class=" drop down mx-auto">
      <button class="btn dropdown-toggle" id="username" type="button" id="dropDownMenueButton1" data-bs-toggle="dropdown" aria-expanded="false">
       <?=$_SESSION["userName"];?>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="settingslist">
        <li> <a class="dropdown-item d-flex align-items-center" href="settings.php">
                <span class="material-icons-sharp">
                  settings
                  </span>
                <span> Settings</span>
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item d-flex align-items-center" href="logout.php">
              <span class="material-icons-sharp">
                  logout
              </span>
              <span>Log Out</span>
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
      </ul>
    </div>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
       <div class="nav-item">
          <a href="index.php" class="btn" role="button">
            <span class="material-icons-sharp">
                grid_view
            </span>
            <span>Dashboard</span>
          </a>
        </div>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
       <div class="nav-item">
          <a href="../verification/pendingVerification.php" class="btn" role="button">
            <span class="material-icons-sharp">
                verified
            </span>
            <span>Verification &#38; Approval </span>
          </a>
        </div>
      </li>

      <li class="nav-heading">OPERATIONS</li>

      <li class="nav-item">
        <div class="dropdown">
          <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-icons-sharp">
            factory
            </span>
           <span style="margin-bottom:10px;">Processing</span>
            </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" class="listdata">
                <li><h6 class="dropdown-header text-dark"> Processing Activities</h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item " href="../forms/Goods_Received_Note.php">Recieve Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/batchProcessingOrder.php">Batch Processing Order</a></li>
                <li><hr class="dropdown-divider"></li>
                <!-- <li><a class="dropdown-item" href="batchReport.php">Batch Report</a></li>
                <li><hr class="dropdown-divider"></li> -->
                <li><a class="dropdown-item" href="../forms/BatchOrderSelection.php">Batch Report</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/dispatch.php">Dispatch</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/transfer.php">Transfer</a></li>
                 <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/drying.php">Drying</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/hulling.php">Hulling</a></li> 
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-sharp">
                currency_pound
                </span>
                <span>Marketing</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header text-dark">Marketing Activities</h6></li>
              <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/valuation.php">Valuation</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/SalesReport.php">Sales Report</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/dispatch.php">Dispatch</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="material-icons-sharp">
                coffee_maker
                </span>
                <span>Roast &#38; Ground</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header">Roast &#38; Ground Activities</h6></li>
                <li><a class="dropdown-item" href="../forms/Goods_Received_Note.php">Recieve Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/activtySheet.php">Services</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/dispatch.php">Dispatch</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-sharp">
                work
                </span>
                <span>Administration</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><h6 class="dropdown-header text-dark">Administration Support</h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/pettyCash.php">Petty Cash Request</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/fundsRequisition.php">Funds Requisition</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-sharp">
                groups_2
                </span>
                <span>Membership &#38; Production</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header text-dark">Membership</h6></li>
              <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/newClient.php">New Client</a></li>
              </ul>
            </div>
          </li>
          
          <!---Analytics--->
          <li class="nav-heading">Analytics</li>

          <li class="nav-item">
            <div class="dropdown" >
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
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
             if(isset($_SESSION["Access"]))
             {
              if($_SESSION["Access"]==1)
              {
                ?>
                <li class="nav-item">
                  <div class="nav-item">
                    <a href="../forms/signup.php" class="btn" role="button">
                    <span class="material-icons-sharp">
                      person_add
                      </span>
                      <span>Create New User</span>
                    </a>
                  </div>
                </li>
              <?php
              }
             }
          ?>
          <li class="nav-heading">Settings</li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-sharp">
                storefront
                </span>
                <span>Inventory</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><h6 class="dropdown-header text-dark">Inventory Settings</h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/NewItem.php">Add New Item</a></li>
                
              </ul>
            </div>
          </li>
      </aside><!-- End Sidebar-->
  <main id="main" class="main">
<?php
}else{
  include "redirect.php";
 }
 ?>