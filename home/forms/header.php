<?php 
 session_start();

 error_reporting(1);
 
 if(isset($_SESSION["userName"]))
 {
?>

<?php
session_start();
include "../private/verAndApprFunctions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $pageTitle ?></title>

  <!-- Material Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/bootsrap/css/bootstrap.min.css">
  <script src="../assets/js/Jquery/jquery-3.6.0.js"></script>
  <script src="../assets/js/Jquery/jquery-ui/jquery-ui.js"></script>

  <!--CSS FILES-->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/newstyles.css">
  <script src="../assets/plotly/plotly-2.16.1.min.js"></script>
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo2.jpg" alt="Logo">
        <span class="d-none d-lg-block">NGL</span>
      </a>
      <button class="btn" id="openbtn">&#9776;Open Sidebar</button>
      <button class="btn" id="closebtn" style="display:none;">&#9776; Close Sidebar</button>
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
        <li> <a class="dropdown-item d-flex align-items-center" href="../forms/settings.php">
                <span class="material-icons-sharp">
                  settings
                  </span>
                <span> Settings</span>
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item d-flex align-items-center" href="../forms/logout.php">
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
  <aside id="sidebar" class="sidebar" style="display:none; color:white; width:310px">

    <ul class="sidebar-nav" id="sidebar-nav" style="color:white">
    <li class="nav-item">
       <div class="nav-item">
          <a href="../forms/index.php" class="btn" role="button">
            <span class="material-icons-sharp">
                grid_view
            </span>
            <span>Dashboard</span>
          </a>
        </div>
      </li><!-- End Dashboard Nav -->
      <!-- <li class="nav-item">
       <div class="nav-item">
          <a href="../verification/pendingVerification.php" class="btn" role="button">
            <span class="material-icons-sharp">
                verified
            </span>
            <span>Verification &#38; Approval </span>
          </a>
        </div>
      </li> -->
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-icons-sharp">
              verified
            </span>
            <span style="margin-bottom:10px;">Verification &#38; Approval</span>
            
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" class="listdata">
            <li><h6 class="dropdown-header text-dark">Pending...</h6></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li>
              <a class="dropdown-item " href="../verification/pendingVerification.php">
                Verification
                <span><?php getAllPendingVerifications($totalPendVer); ?></span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="../approval/pendingApproval.php">
                Approval
                <span><?php getAllPendingApprovals($totalPendAppr); ?></span>
              </a>
            </li>
          </ul>
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
            <li><a class="dropdown-item " href="../inventory/Goods_Received_Note.php">Recieve Goods</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../processing/batchProcessingOrder.php">Batch Processing Order</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li><a class="dropdown-item" href="batchReport.php">Batch Report</a></li>
            <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="../processing/BatchOrderSelection.php">Batch Report</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../inventory/dispatch.php">Dispatch</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../inventory/transfer.php">Transfer</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../processing/drying.php">Drying</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../processing/hulling.php">Hulling</a></li> 
            <li><a class="dropdown-item" href="../inventory/release.php">Release Request</a></li> 
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
                <li><a class="dropdown-item" href="../marketing/valuation.php">Valuation</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../marketing/SalesReport.php">Sales Report</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/dispatch.php">Dispatch</a></li>
                <li><a class="dropdown-item" href="../inventory/release.php">Release Request</a></li> 
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
                <li><a class="dropdown-item" href="../inventory/Goods_Received_Note.php">Recieve Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../forms/activtySheet.php">Services</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/dispatch.php">Dispatch</a></li>
                <li><a class="dropdown-item" href="../inventory/release.php">Release Request</a></li> 
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-sharp">
                  local_grocery_store
                </span>
                <span>Inventroy</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><h6 class="dropdown-header">Inventory Activities</h6></li>
                <li><a class="dropdown-item" href="../inventory/Goods_Received_Note.php">Receive Goods</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/bulking.php">Bulking</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/transfer.php">Transfer</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/dispatch.php">Dispatch</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/adjustment.php">Adjustment</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/stkCountCustomer.php">Stock Count</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../inventory/release.php">Release Request</a></li> 
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
          <li class="nav-heading">Reports &#38; Analytics</li>

          <li class="nav-item">
            <div class="dropdown" >
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
              <span class="material-icons-sharp">
                analytics
                </span>
                <span>Charts &#38;Graphs</span>
              </button>
            </div>
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
              <span class="material-icons-sharp">receipt</span>
                <span>Transactions</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../transactions/grnList.php">Goods Received</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../reports/stockTransactions.php">Batch Reports</a></li>
              </ul>
            </div>
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="material-icons-sharp">
                assignment
                </span>
                <span>Stock Reports</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../reports/stockBalances.php">Stock Balances</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../reports/stockTransactions.php">Stock Transactions</a></li>
              </ul>
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
                <li><a class="dropdown-item" href="../inventory/NewItem.php">Add New Item</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-sharp">
                settings
                </span>
                <span>General Settings</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><h6 class="dropdown-header text-dark">General Settings</h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../settings/exchangeRate.php">Exchange Rate</a></li>
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