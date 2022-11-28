<?php $pageTitle="Coffee Drying"; ?>
<?php
include("../private/database.php");
include("header.php");
$dryingNo = nextDocNumber("drying", "drying_no", "DRY");
?>

<form class="regularForm" style="height: 700px ;">
  <h3 class="formHeading">DRYING FORM</h3>
  <?php
    include "../alerts/message.php";
  ?>
  
  <div style="display: grid; width:fit-content; margin-left: 70%; margin-bottom:20px">
    <label for="hullingNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Drying No:</label>
    <input type="text" class="shortInput" id="hullingNo" name="hullingNo" value="<?= $dryingNo ?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
    <label for="hullingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
    <input type="date" class="shortInput" id="hullingDate" name="hullingDate" value="" style="grid-column: 2; grid-row: 2">
  </div>
 

  <?php
    include("../private/openCustomerPicker.php");
      GetCustomerList();
    include("../private/closeCustomerPicker.php")  
  ?>
<label>Drying Details</label>
  <table >
    <tr><th style="width: 320px;">DETAILS</th>
      <th style="width: 100px;">Qty</th>
    </tr>
    <tr>
      <td>Input: <?= gradePicker("item", ""); ?></td>
      <td><input type="number" class="tableInput"></td>
    </tr>
    <tr>
        <td>Drying Loss</td>
        <td><input type="number" class="tableInput"></td>
    </tr>
    <tr>
      <td>LOSS</td>
      <td><input class="tableInput"></td>
    </tr>
  </table>

<?php include ("../private/approvalDetails.php") ?>


</form>
<script src="../assets/js/gradePicker.js"></script>
<?php include("footer.php") ?>