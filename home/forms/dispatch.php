<?php include("header.php");?>
<?php include ("../connection/databaseConn.php");
$hullingNo = nextDocNumber("dispatch", "dispatch_no", "DIS"); 
?>
    
<form id="deliveryNoteForm" class="regularForm" method="POST" style="height: 800px;">
    <h3 id="deliveryNoteHeading" class="formHeading">Delivery Note</h3>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="hullingNo" style="grid-column: 1; grid-row: 1; width:80px; margin-top: 5px">Dispatch No:</label>
        <input type="text" class="shortInput" id="hullingNo" name="hullingNo" value="<?= $hullingNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="hullingDate" name="hullingDate" value="" style="grid-column: 2; grid-row: 2">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 3; margin-top: 10px">Time Out:</label>
        <input type="time" class="shortInput" id="hullingDate" name="hullingDate" value="" style="grid-column: 2; grid-row: 3">
    </div>
    <?php include("../forms/customerSelector.php") ?>
    
    <?php itemsTable(10, "Delivery Items"); ?>

    <div style="padding-top: 20px;">
        <label for="deliveryNoteTruckNumber" class="formLabel" id="deliveryNoteInputLabel">Truck Number</label>
        <input style="width: 100px; padding-left: 5px" type="text" id="deliveryNoteTruckNumber" class="longInputField" name="deliveryNoteContact">
        <label style="padding-left: 20px;" for="deliveryNoteDriver" class="formLabel" id="deliveryNoteInputLabel">Driver Name</label>
        <input style="width: 200px; padding-left: 5px" type="text" id="deliveryNoteDriver" class="longInputField" name="deliveryNoteContact"><br>
        <div style="padding: 5px 0px 0px 0px;">
            <label style="padding: 5px 0px;" for="deliveryNoteDriver" class="formLabel" id="deliveryNoteInputLabel">Remarks</label>
            <input style="width: 550px; padding-left: 5px" type="text" id="deliveryNoteDriver" class="longInputField" name="deliveryNoteContact">
        </div>
    </div>
    <?php include_once("../private/approvalDetails.php"); ?>
</form>
    
<?php include("footer.php");?>
<script src="../assets/js/itemSelector.js" ></script>