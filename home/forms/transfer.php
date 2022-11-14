<?php include_once('header.php'); 
include ("../connection/databaseConn.php");
$transferNo = nextDocNumber("transfers", "transfer_no", "GTN-");
?>
<form action="../connection/grn.php" class="regularForm" method="POST" style="height: 800px;">
    <legend class="formHeading">Goods Transfer Note</legend>
    <?php
        include "../alerts/message.php";
    ?>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="transfer" style="grid-column: 1; grid-row: 1; width:90px; margin-top: 5px">Transfer No:</label>
        <input type="text" class="shortInput" id="transfer" name="transfer" value="<?= $transferNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="date" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="transferDate" name="transferDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
<div>
    <label>Summary</label>
    <table>
        <tr>
            <th>Details</th>
            <th style="width: 400px;">From</th>
            <th>To</th>
        </tr>
        <tr>
            <td>Client</td>
            <td><select id="fromClient"></select></td>
            <td><select id="toClient"></select></td>
        </tr>
        <tr>
            <td>Warehouse Section</Section></td>
            <td><select id="fromWh" class="itemSelect"></select></td>
            <td><select id="toWh"></select></td>
        </tr>
        <tr>
            <td>Witnessed</Section></td>
            <td><select id="fromWitness"></select></td>
            <td><select id="toWitness"></select></td>
        </tr>
    </table>
</div>









    <?php include_once("../private/approvalDetails.php"); ?>
</form>
<?php include_once('footer.php');?>