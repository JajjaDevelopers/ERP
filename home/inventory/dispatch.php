<?php $pageTitle="Goods Dispatch"; ?>
<?php include("../forms/header.php");?>
<?php include ("../connection/databaseConn.php");
$hullingNo = nextDocNumber("dispatch", "dispatch_no", "DIS"); 
?>
    
<form class="regularForm" method="POST" style="height:fit-content; width:1000px" action="../connection/dispatch.php">
    <h3 id="deliveryNoteHeading" class="formHeading">Delivery Note</h3>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="hullingNo" style="grid-column: 1; grid-row: 1; width:80px; margin-top: 5px">Dispatch No:</label>
        <input type="text" class="shortInput" id="hullingNo" name="hullingNo" value="<?= $hullingNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="hullingDate" name="hullingDate" value="<?= $today?>" style="grid-column: 2; grid-row: 2">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 3; margin-top: 10px">Time Out:</label>
        <input type="time" class="shortInput" id="timeOut" name="timeOut" value="" style="grid-column: 2; grid-row: 3">
    </div>
    <?php include("../forms/customerSelector.php") ?>
    
    <?php itemsTable(10, "Delivery Items"); ?>
    

    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="col-sm-">

            </div>
        </div>
        <label for="truckNo" class="formLabel" id="deliveryNoteInputLabel">Truck Number</label>
        <input style="width: 100px; padding-left: 5px" type="text" id="truckNo" class="longInputField" name="truckNo">
        <label style="padding-left: 20px;" for="driver" class="formLabel" id="deliveryNoteInputLabel">Driver Name</label>
        <input style="width: 200px; padding-left: 5px" type="text" id="driver" class="longInputField" name="driver"><br>
        <label style="padding-left: 20px;" for="destination" class="formLabel">Destination</label>
        <input style="width: 200px; padding-left: 5px" type="text" id="destination" class="longInputField" name="destination"><br>
        <div style="padding: 5px 0px 0px 0px;">
            <label style="padding: 5px 0px;" for="remarks" class="formLabel" id="deliveryNoteInputLabel">Remarks</label>
            <input style="width: 550px; padding-left: 5px" type="text" id="remarks" class="longInputField" name="remarks">
        </div>
    </div>
    <?php submitButton("Submit", "dispatch", "btnsubmit"); ?>
</form>
    
<?php include("../forms/footer.php");?>
<script src="../assets/js/itemSelector.js" ></script>