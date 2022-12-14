<?php $pageTitle="Activity Sheet"; ?>
<?php include_once('header.php'); ?>
<?php
include ("../connection/databaseConn.php");
$activityNo = nextDocNumber("hulling", "hulling_no", "RST");
?>
<div>
<form id="activitySheetForm" name="activitySheetForm" class="regularForm" action="../private/activitySheetHandler.php" method="POST">
    <div>
        <h3 id="activitySheetHeading" class="formHeading">Roasting Order Form</h3>
        <div style="display: grid; width:fit-content; margin-left: 70%; margin-bottom:20px">
        <label for="hullingNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Hulling No:</label>
        <input type="text" class="shortInput" id="hullingNo" name="hullingNo" value="<?= $activityNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="hullingDate" name="hullingDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
    <?php include("../forms/customerSelector.php") ?>
    </div>
    <div id="roastingActivitiesTable">
        <table>
            <th colspan="4">Activities Order</th>
            <tr>
                <th style="width: 50px;">#Code</th>
                <th style="width: 350px;">Activity Name</th>
                <th style="width: 100px;">Quantity</th>
                <th style="width: 100px;">Rate</th>
                <th style="width: 150px;">Amount</th>
            </tr>
            <tr>
                <td><input id="roastingCode" name="roastingCode" readonly value="RSTG" class="remarks"></td>
                <td><input type="text" value="Coffee Roasting" id="roastingName" name="roastingName" class="remarks"></td>
                <td ><input type="number" value="0" id="roastingQty" name="roastingQty" class="tableInput"></td>
                <td ><input type="number" value="0" id="roastingRate" name="roastingRate" class="tableInput"></td>
                <td><input type="text" value="0" id="roastingAmount" name="roastingAmount" class="tableInput" readonly></td>
            </tr>
            <tr>
                <td><input id="grindingCode" name="grindingCode" readonly value="GRDG" class="remarks"></td>
                <td><input type="text" value="Coffee Grinding" id="grindingName" name="grindingName" class="remarks"></td>
                <td><input type="number" id="grindingQty" name="grindingQty" class="tableInput"></td>
                <td><input type="number" id="grindingRate" name="grindingRate" class="tableInput"></td>
                <td><input type="text" id="grindingAmount" name="grindingAmount" class="tableInput" readonly></td>
            </tr>
            <tr>
                <td><input id="sortingCode" name="sortingCode" readonly value="SOTG" class="remarks"></td>
                <td><input type="text" value="Coffee Sorting" id="sortingName" name="sortingName" class="remarks"></td>
                <td><input type="number" id="sortingQty" name="sortingQty" class="tableInput"></td>
                <td><input type="number" id="sortingRate" name="sortingRate" class="tableInput"></td>
                <td><input type="text" id="sortingAmount" name="sortingAmount" class="tableInput" readonly></td>
            </tr>
            <tr>
                <td><input id="packaging250Code" name="packaging250Code" readonly value="P250" class="remarks"></td>
                <td><input type="text" value="Coffee Packaging 250g" id="packing250Name" name="packaging250Name" class="remarks"></td>
                <td><input type="number" id="packaging250Qty" name="packaging250Qty" class="tableInput"></td>
                <td><input type="number" id="packaging250Rate" name="packaging250Rate" class="tableInput"></td>
                <td><input type="text" id="packaging250Amount" name="packaging250Amount" class="tableInput" readonly></td>
            </tr>
            <tr>
                <td><input id="packaging500Code"  name="packaging500Code" readonly value="P500" class="remarks"></td>
                <td><input type="text" value="Coffee Packaging 500g" id="packing500Name" name="packaging500Name" class="remarks"></td>
                <td><input type="number" id="packaging500Qty"  name="packaging500Qty" class="tableInput"></td>
                <td><input type="number" id="packaging500Rate" name="packaging500Rate" class="tableInput"></td>
                <td><input type="text" id="packaging500Amount" name="packaging500Amount" class="tableInput" readonly></td>
            </tr>
            <tr>
                <td><input id="packaging1KgCode" name="packaging1KgCode" readonly value="P1KG" class="remarks"></td>
                <td><input type="text" value="Coffee Packaging 1Kg" id="packing1kgName" name="packaging1KgName" class="remarks"></td>
                <td><input type="number" id="packaging1KgQty" name="packaging1KgQty" class="tableInput"></td>
                <td><input type="number" id="packaging1KgRate" name="packaging1KgRate" class="tableInput"></td>
                <td><input type="text" id="packaging1KgAmount" name="packaging1KgAmount" class="tableInput" readonly></td>
            </tr>
            <tr>
                <td><input id="packagingOtherCode" name="packagingOtherCode" readonly value="POTHR" class="remarks"></td>
                <td><input type="text" value="Coffee Packaging Other" id="packingOtherName" name="packagingOtherName" class="remarks"></td>
                <td><input type="number" id="packagingOtherQty" name="packagingOtherQty" class="tableInput"></td>
                <td><input type="number" id="packagingOtherRate" name="packagingOtherRate" class="tableInput"></td>
                <td><input type="text" id="packagingOtherAmount" name="packagingOtherAmount" class="tableInput" readonly></td>
            </tr>
            <tr id="totalRow">
                <td class="emptyCell"></td>
                <td class="emptyCell"></td>
                <td class="emptyCell"></td>
                <th>Total</th>
                <th><input type="text" id="totalAmount" name="totalAmount" class="tableInput" readonly></th>
            </tr>
        </table>
        <table style="margin-top: 30px; width: 100%">
            <tr>
                <th>Special Requests</th>
                <th>Coffee Roast Profile</th>
            </tr>
            <tr>
                <td><input type="text" id="specialRequest" class="remarks" name="specialRequest"></td>
                <td><input type="text" id="roastProfile" class="remarks" name="roastProfile"></td>
            </tr>
        </table>
        
        <?php include "../forms/submitButton.php" ?>
    </div>
</form>
</div>
<script>
    var qtyList = ['roastingQty', 'grindingQty', 'sortingQty', 'packaging250Qty', 'packaging500Qty', 'packaging1KgQty', 'packagingOtherQty'];
var rateList = ['roastingRate', 'grindingRate', 'sortingRate', 'packaging250Rate', 'packaging500Rate', 'packaging1KgRate', 'packagingOtherRate'];
var amountList = ['roastingAmount', 'grindingAmount', 'sortingAmount', 'packaging250Amount', 'packaging500Amount', 'packaging1KgAmount', 'packagingOtherAmount'];
let responders = qtyList.concat(rateList);

function convertString(strNum){
    var myStr = "";
    if (typeof strNum === 'string'){
        myStr = strNum.replace(/,/g, '');
        return myStr;
    }else {
        return strNum;
    }
}

function updateAmount(){
    var amountValues = [];
    var grandTotal = 0;
    for (var i=0; i<qtyList.length; i++){
        var qty = document.getElementById(qtyList[i]).value;
        var qtyNum = Number(qty);
        var rate = document.getElementById(rateList[i]).value;
        var rateNum = Number(rate);

        var amount = qtyNum * rateNum;
        if (amount !== 0){
            document.getElementById(amountList[i]).setAttribute('value', amount.toLocaleString());
        }
        
        // amountValues.push(amount);
        grandTotal += amount;
        
        

    }
    
    document.getElementById('totalAmount').setAttribute('value', grandTotal.toLocaleString());
   
}

for (var r=0; r<responders.length; r++){
    document.getElementById(responders[r]).addEventListener("blur", updateAmount);
}

    </script>
    <?php include_once('footer.php'); ?>