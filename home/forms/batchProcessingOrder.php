<?php $pageTitle="Batch Processing Order"; ?>
<?php include_once('header.php'); ?>
<?php include ("../connection/databaseConn.php"); ?>
  <!-- <div class="container"> -->
<div id="ajaxDiv1" style="display:none"></div>
<form class="regularForm" method="POST" style="height: 800px;" action="../connection/batchProcessingOrder.php">
    <legend class="formHeading">Batch Processing Order</legend>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="grnNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Order No:</label>
        <input type="text" class="shortInput" id="grnNo" name="grnNo" value="<?php echo nextDocNumber('batch_processing_order', 'batch_order_no', 'BPO-'); ?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="date" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="date" name="grnDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
    <?php require "../connection/batchOrderCustomerPicker.php" ?>

    <div>
      <table>
        <tr>
          <th style="width: 100px;">GRN No.</th>
          <th style="width: 100px;">Delivery Date</th>
          <th style="width: 100px;">Grade</th>
          <th style="width: 100px;">Quantity (Kg)</th>
          <th style="width: 100px;">AV. MC</th>
        </tr>
        <?php
          $grn = "grn";
          for ($row=1; $row<=5; $row++){
            ?>
            <tr>
            <td><select type="text" id="<?= $grn.$row.'Id'?>" name="<?= $grn.$row.'Id'?>" class="tableInput"
            onchange="getGrnDetails(this.id)"></select></td>
            <td><input type="text" value="" id="<?= $grn.$row.'Date'?>" readonly name="<?= $grn.$row.'Date'?>" class="tableInput"></td>
            <td><input type="text" value="" id="<?= $grn.$row.'Grade'?>" readonly name="<?= $grn.$row.'Grade'?>" class="tableInput"></td>
            <td><input type="number" value="" id="<?= $grn.$row.'Qty'?>" readonly name="<?= $grn.$row.'Qty'?>" class="tableInput"></td>
            <td><input type="number" value="" id="<?= $grn.$row.'Mc'?>" readonly name="<?= $grn.$row.'Mc'?>" class="tableInput"></td>
            </tr>
            <?php
          }
        ?>
        <tr>
          <td colspan="3">Total</td>
          <!-- <td>Delivery Date</td>
          <td>Grade</td> -->
          <td><input type="number" value="0" id="batchTotalQty" readonly name="batchTotalQty" class="tableInput"></td>
          <td><input type="number" value="0" id="avgMc" readonly name="avgMc" class="tableInput"></td>
        </tr>
      </table>
    </div>






    <?php include_once("../private/approvalDetails.php"); ?>
</form>

<?php include_once('footer.php'); ?>


<script>
  // document.getElementById("salesReportBuyer").addEventListener("onchange", getGrades(this.value))
  
  function SelectCustomer(buyer){
    

    //update custmer list
    function cust(){
      
      var selectedBuyer = document.getElementById("salesReportBuyer").value;
      document.getElementById("customerId").setAttribute("value", selectedBuyer.slice(0,6));
      document.getElementById("customerName").setAttribute("value", selectedBuyer.substr(7));

      if (buyer == "") {
          document.getElementById("customerId").setAttribute('value', '');
          document.getElementById("customerName").setAttribute('value', '');
          document.getElementById("salesReportContact").setAttribute('value','');
          document.getElementById("salesReportTel").setAttribute('value', '');
          return;
      }

      const xhttp = new XMLHttpRequest();
      // Changing customer namne
      xhttp.onload = function() {
        
          document.getElementById("ajaxDiv").innerHTML = this.responseText;

          var ajaxCustomerName = document.getElementById("name").value;
          document.getElementById("customerName").setAttribute('value', ajaxCustomerName);

          var ajaxCustomerContact = document.getElementById("contactPerson").value;
          document.getElementById("salesReportContact").setAttribute('value', ajaxCustomerContact);

          var ajaxTel = document.getElementById("tel").value;
          document.getElementById("salesReportTel").setAttribute('value', ajaxTel);
      }
      xhttp.open("GET", "../ajax/salesReportAjax.php?q="+buyer);
      xhttp.send();
    }


    // Getting grns
    function getGrades(){
      if (buyer == " ") {
          return;
      } 
      const xhttp = new XMLHttpRequest();
      // Updating grades based on coffee type
      xhttp.onload = function() {
        for (var grn=1; grn<=5; grn++){
          document.getElementById("grn"+grn+"Id").innerHTML = this.responseText;
        }
      }
      xhttp.open("GET", "../ajax/batchOrderAjax.php?q="+buyer);
      xhttp.send();
    } 
    cust();
    getGrades();
  }

  //get grn details
    function getGrnDetails(grnId){
      var currentGrn = document.getElementById(grnId).value;
      var idList = [];
      var dateList = [];
      var gradeList = [];
      var qtyList = [];
      var mcList = [];
      for (var row=1; row<=5; row++){
        idList.push("grn"+row+"Id");
        dateList.push("grn"+row+"Date");
        gradeList.push("grn"+row+"Grade");
        qtyList.push("grn"+row+"Qty");
        mcList.push("grn"+row+"Mc");
      }
      var grnIndex = idList.indexOf(grnId);
        // var grnId = document.getElementById("grn"+row+"Id").value;
        if (document.getElementById(idList[grnIndex]).value == "") {
          document.getElementById(dateList[grnIndex]).setAttribute('value', '');
          document.getElementById(gradeList[grnIndex]).setAttribute('value', '');
          document.getElementById(qtyList[grnIndex]).setAttribute('value','');
          document.getElementById(mcList[grnIndex]).setAttribute('value', '');
          return;
        } 
      
      
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("ajaxDiv1").innerHTML = this.responseText;

        
        
        var ajaxGrnDate = document.getElementById("grnDate").value;
        document.getElementById(dateList[grnIndex]).setAttribute('value', ajaxGrnDate); //grn date

        var ajaxGrnGrade = document.getElementById("grnGrade").value;
        document.getElementById(gradeList[grnIndex]).setAttribute('value', ajaxGrnGrade); //grn grade

        var ajaxGrnQty = document.getElementById("grnQty").value;
        document.getElementById(qtyList[grnIndex]).setAttribute('value', ajaxGrnQty); //grn qty

        var ajaxGrnMc = document.getElementById("grnMc").value;
        document.getElementById(mcList[grnIndex]).setAttribute('value', ajaxGrnMc); //grn mc
    }
    xhttp.open("GET", "../ajax/grnDetails.php?q="+currentGrn);
    xhttp.send();
    }


    // Create grn detail IDs
    
  </script>