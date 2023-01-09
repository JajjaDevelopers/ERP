<?php $pageTitle = "Stock Counting" ?>
<?php include "../forms/header.php" ?>
<?php 
include ("../connection/databaseConn.php");
$stkCountNo = nextDocNumber("stock_counting", "count_no", "STC"); 
?>
<form class="regularForm" style="height: fit-content;">
    <h3 class="formHeading">Stock Counting</h3>
    <div style="display: grid; width:fit-content; margin-left: 70%; margin-bottom:20px">
        <label for="stkCountNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Count No:</label>
        <input type="text" class="shortInput" id="stkCountNo" name="stkCountNo" readonly value="<?= $stkCountNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="stkCountDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">As at:</label>
        <input type="date" class="shortInput" id="stkCountDate" name="stkCountDate" value="" style="grid-column: 2; grid-row: 2;" required>
    </div>
    <?php include("../forms/customerSelector.php") ?>
    <?php stockCountItems(); ?>






    <?php comment("700px") ?>
    <?php submitButton("Submit", "submit") ?>
</form>
<?php include "../forms/footer.php" ?>