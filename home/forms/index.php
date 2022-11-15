<?php 
 session_start();

 error_reporting(1);
 include ("../dashboard/inAndOut.php");
 if(isset($_SESSION["userName"]))
 {
  if((time()- $_SESSION["lastLoginTimestamp"])<900)//logs out user automatically after 15 minutes of inactivity
  {
    include_once("header.php");
    include_once("footer.php");
  }else
  {
    include "logout.php";
  }

 }else{
  include "redirect.php";
 }
?>


  
