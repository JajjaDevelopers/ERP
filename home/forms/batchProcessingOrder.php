<?php $pageTitle="Batch Processing Order"; ?>
<?php include_once('header.php'); ?>
<?php include ("../connection/databaseConn.php"); ?>
  <!-- <div class="container"> -->

<form class="regularForm" method="POST" style="height: 800px;">
    <legend class="formHeading">Batch Processing Order</legend>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="grnNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Order No:</label>
        <input type="text" class="shortInput" id="grnNo" name="grnNo" value="<?php echo nextDocNumber('batch_processing_order', 'batch_order_no', 'BPO-'); ?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="date" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="date" name="grnDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
    <?php require("customerSelector.php"); ?>




















    <?php include_once("../private/approvalDetails.php"); ?>
</form>

<?php include_once('footer.php'); ?>