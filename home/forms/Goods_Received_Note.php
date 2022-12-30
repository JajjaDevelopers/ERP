<?php include ("../connection/databaseConn.php"); ?>
<?php
$pageTitle="Goods Received Note";
$grnNo = nextDocNumber('grn', 'grn_no', 'GRN');
?>
<?php include_once('header.php'); ?>

  <!-- <div class="container"> -->
  <form action="../connection/grn.php" class="regularForm" method="POST" style="height:fit-content;">
    <?php include "../forms/grnTemplate.php" ?>
    <?php submitButton("Submit", "Submit");?>
      
  </form>

  <?php include_once('footer.php'); ?>
  <script>
    $("#usersDiv").hide();
    $("#typeName").hide();
    $("#purposeName").hide();
    $("#gradeName").hide();
    function getGrades(str){
      if (str == " ") {
          return;
      } 
      const xhttp = new XMLHttpRequest();
      // Updating grades based on coffee type
      xhttp.onload = function() {
          document.getElementById("gradeId").innerHTML = this.responseText;
      }
      xhttp.open("GET", "../ajax/grnAjax.php?q="+str);
      xhttp.send();
    }   
  </script>