<?php require ("header.php") ?>
<?php include ("../connection/databaseConn.php");
$hullingNo = nextDocNumber("hulling", "hulling_no", "HLP"); 
?>
<form id="hullingForm" name="hullingForm" class="regularForm" style="height: 930px;" method="POST" action="../connection/valuation.php">
    <h3 class="formHeading">HULLING REPORT</h3>
    <?php
    include "../alerts/message.php";
    ?>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="hullingNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Hulling No:</label>
        <input type="text" class="shortInput" id="hullingNo" name="hullingNo" value="<?= $hullingNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="hullingDate" name="hullingDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
    <?php include("../forms/customerSelector.php") ?>
    <table>
        <tr>
            <th style="width: 150px;">Details</th>
            <th>Grade</th>
            <th style="width: 70px;">Moisture</th>
            <th style="width: 100px;">Bags</th>
            <th style="width: 100px;">Qty (Kg)</th>
        </tr>
        <?php
        $detailsId = array("input", "output", "husks", "otherLoss");
        $details = array("Input", "Output", "Husks", "Other Loss");
        for ($i=0; $i<count($detailsId); $i++){
        ?>
        <tr>
            <td><?= $details[$i]?></td>
            <td><?php gradePicker($detailsId[$i])?></td>
            <td><input type="number" value="" name="<?= $detailsId[$i].'Mc'?>" class="tableInput" min="10" max="18" step="0.01" ></td> 
            <td><input type="number" value="" id="<?= $detailsId[$i].'Bags'?>" name="<?= $detailsId[$i].'Bags'?>" class="tableInput" step="0.1"></td>
            <td><input type="number" value="" id="<?= $detailsId[$i].'Qty'?>" name="<?= $detailsId[$i].'Qty'?>" class="tableInput" step="0.01"></td>
        </tr>
        <?php
        }
        ?>

        <tr>
            <td colspan="3">Total</td>
            <!-- <td></td>
            <td><input type="number" value="" id="totalYield" readonly name="totalYield" class="tableInput"></td> -->
            <td><input type="number" value="" id="totalYield" readonly name="totalYield" class="tableInput" step="0.1"></td>
            <td><input type="number" value="" id="totalYield" readonly name="totalYield" class="tableInput" step="0.01"></td>
        </tr>
    </table>
    <?php documentNotes("700px") ?>


    <?php include_once("../private/approvalDetails.php"); ?>
</form>
<script src="../assets/js/gradePicker.js"></script>
<?php require ("footer.php") ?>
