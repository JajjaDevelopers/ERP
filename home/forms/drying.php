<?php $pageTitle="Coffee Drying"; ?>
<?php
include("../private/database.php");
include("header.php");
$dryingNo = nextDocNumber("drying", "drying_no", "DRY");
?>

<form action="../connection/drying.php" method="POST" class="regularForm" style="height: 700px ;">
  <h3 class="formHeading">DRYING FORM</h3>
  <?php
    include "../alerts/message.php";
  ?>
  
  <div style="display: grid; width:fit-content; margin-left: 70%; margin-bottom:20px">
    <label for="dryingNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Drying No:</label>
    <input type="text" class="shortInput" id="dryingNo" name="dryingNo" value="<?= $dryingNo ?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
    <label for="dryingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
    <input type="date" class="shortInput" id="dryingDate" name="dryingDate" value="" style="grid-column: 2; grid-row: 2">
  </div>
 

  <?php
    include("../private/openCustomerPicker.php");
      GetCustomerList();
    include("../private/closeCustomerPicker.php")  
  ?>
<label style="margin-top: 20px;">Drying Summary</label>
  <table >
    <tr><th style="width: 320px;">Details</th>
      <th style="width: 100px;">Value</th>
    </tr>
    <tr>
      <td>Input: <?= gradePicker("item", ""); ?></td>
      <td><input type="number" id="inputQty" name="inputQty" class="tableInput" placeholder="Input Kgs" step="0.01"></td>
    </tr>
    <tr>
        <td>Output Qty</td>
        <td><input type="number" id="outputQty" name="outputQty" class="tableInput" placeholder="Output Kgs" step="0.01"></td>
    </tr>
    <tr>
        <td>Drying Loss</td>
        <td><input type="number" id="dryLoss" name="dryLoss" class="tableInput" placeholder="Loss Kgs"></td>
    </tr>
    <tr>
      <td>Input Moisture (%)</td>
      <td><input type="number" id="inputMc" name="inputMc" class="tableInput" step="0.01"></td>
    </tr>
    <tr>
      <td>Output Moisture (%)</td>
      <td><input type="number" id="outputMc" name="outputMc" class="tableInput" step="0.01"></td>
    </tr>
  </table>
  <?php documentNotes("700px") ?>
<?php include ("../private/approvalDetails.php") ?>


</form>
<script src="../assets/js/gradePicker.js"></script>
<?php include("footer.php") ?>
<script>
  document.getElementById("inputQty").addEventListener("blur", getDryingLoss);
  document.getElementById("outputQty").addEventListener("blur", getDryingLoss);
  function getDryingLoss(){
    var inputQtyVar = Number(document.getElementById("inputQty").value);
    var outputQtyVar = Number(document.getElementById("outputQty").value);
    document.getElementById("dryLoss").setAttribute("value", inputQtyVar-outputQtyVar);
  }
</script>