<?php include_once('header.php'); 
include ("../connection/databaseConn.php");
$transferNo = nextDocNumber("transfers", "transfer_no", "GTN-");
?>
<form action="../connection/grn.php" class="regularForm" method="POST" style="height: 800px;">
    <legend class="formHeading">Goods Transfer Note</legend>
    <div style="display: grid; width:fit-content; margin-left: 70%;">
        <label for="transfer" style="grid-column: 1; grid-row: 1; width:90px; margin-top: 5px">Transfer No:</label>
        <input type="text" class="shortInput" id="transfer" name="transfer" value="<?= $transferNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="date" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="transferDate" name="transferDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
<div>
    <label>Summary</label>
    <table>
        <?php $cellWidth="200px"?>
        <tr>
            <th>Details</th>
            <th >From</th>
            <th>To</th>
        </tr>
        <tr>
            <td>Client</td>
            <td>
                <input id="fromClientName" class="itmNameInput" style="width: <?= $cellWidth?>;" readonly>
                <select id="fromClientSelect" name="fromClientSelect" class="dropdown" onchange="setCustomer(this.id)" >
                    <?php GetCustomerList(); ?>
                </select>
            </td>
            <td>
                <input id="toClientName" class="itmNameInput" style="width: <?= $cellWidth?>;" readonly>
                <select id="toClientSelect" name="toClientSelect" class="dropdown" onchange="setCustomer(this.id)">
                    <?php GetCustomerList(); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Warehouse Section</Section></td>
            <td>
                <!-- <input id="fromSectionName" class="itmNameInput" style="width: ;"> -->
                <select id="fromBlock" name="fromBlock" class="shortInput" onchange="getWareHouseSection(this.id)" >
                    <?php selectWarehouseBlock(); ?>
                </select>
                <select id="fromSection" name="fromSection" class="shortInput"></select>
            </td>
            <td>
                <select id="toBlock" name="toBlock" class="shortInput" onchange="getWareHouseSection(this.id)">
                    <?php selectWarehouseBlock(); ?>
                </select>
                <select id="toSection" name="toSection" class="shortInput"></select>
            </td>
        </tr>
        <tr>
            <td>Witnessed</Section></td>
            <td>
                <input id="fromWitnessName" class="itmNameInput">
                
            </td>
            <td>
                <input id="toWitnessName" class="itmNameInput">
                
            </td>
        </tr>
    </table>

    <label style="margin-top: 20px;">Transfer Items</label>
    <table style="margin-top: 5px;">
        <tr>
            <th style="width: 40px;">No.</th>
            <th>Grade</th>
            <th>Moisture</th>
            <th>Bags</th>
            <th>Quantity</th>
        </tr>
        <?php
        for ($i=1; $i<=5; $i++){

        
         ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <input id="<?= 'item'.$i.'Name'?>" class="itmNameInput" style="width: 300px;" readonly>
                <select id="<?= 'item'.$i.'Select'?>" name="<?= 'item'.$i.'Select'?>" class="dropdown" onchange="selectItem(this.id, 5)" >
                <?php coffeeGrades(); ?></select>
            </td>
            <td><input type="number" id="<?= 'item'.$i.'Mc'?>" name="<?= 'item'.$i.'Mc'?>" class="tableInput" style="width: 60px;" step="0.01"></td>
            <td><input type="number" id="<?= 'item'.$i.'Bags'?>" name="<?= 'item'.$i.'Bags'?>" class="tableInput" style="width: 60px;" step="0.1"></td>
            <td><input type="number" id="<?= 'item'.$i.'Qty'?>" name="<?= 'item'.$i.'Qty'?>" class="tableInput" style="width: 100px;" step="0.01"></td>
        </tr>
        <?php
        }
        ?>
    </table>


</div>




    <?php include_once("../private/approvalDetails.php"); ?>
</form>
<?php include_once('footer.php');?>
<script src="../assets/js/itemSelector.js" ></script>
<script>
    function setCustomer(selectId){
        var selectIdList = ["fromClientSelect", "toClientSelect"];
        var nameIdList = ["fromClientName", "toClientName"];

        var selected = document.getElementById(selectId).value;
        var index = selectIdList.indexOf(selectId);
        document.getElementById(nameIdList[index]).setAttribute("value", selected.substr(7))
    }


    function getWareHouseSection(blockId){
        var blockNo = document.getElementById(blockId).value;
        const xhttp = new XMLHttpRequest();
      // Changing customer namne
        xhttp.onload = function() {
        let blockList = ["fromBlock", "toBlock"];
        let sectionList = ["fromSection", "toSection"];
        var index = blockList.indexOf(blockId);

        document.getElementById(sectionList[index]).innerHTML = this.responseText;

        // var ajaxCustomerName = document.getElementById("name").value;
        // document.getElementById("customerName").setAttribute('value', ajaxCustomerName);

        // var ajaxCustomerContact = document.getElementById("contactPerson").value;
        // document.getElementById("salesReportContact").setAttribute('value', ajaxCustomerContact);

        // var ajaxTel = document.getElementById("tel").value;
        // document.getElementById("salesReportTel").setAttribute('value', ajaxTel);
      }
      xhttp.open("GET", "../ajax/getWareHouseSection.php?q="+blockNo);
      xhttp.send();
    }
</script>