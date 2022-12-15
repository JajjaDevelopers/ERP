<?php $pageTitle="Activity Sheet"; ?>
<?php include_once('header.php'); ?>
<?php
include ("../connection/databaseConn.php");
$activityNo = nextDocNumber("roastery_activity_summary", "activity_sheet_no", "RST");
?>

<form class="regularForm" action="../private/activitySheetHandler.php" method="POST" style="height: fit-content;">
   
    <h3 id="activitySheetHeading" class="formHeading">Roasting Order Form</h3>
    <div style="display: grid; width:fit-content; margin-left: 70%; margin-bottom:20px">
        <label for="hullingNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">Hulling No:</label>
        <input type="text" class="shortInput" id="hullingNo" name="hullingNo" value="<?= $activityNo?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
        <label for="hullingDate" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
        <input type="date" class="shortInput" id="hullingDate" name="hullingDate" value="" style="grid-column: 2; grid-row: 2">
    </div>
    <?php include("../forms/customerSelector.php") ?>
    
    <div id="servicesTable" >
        <label>Activities and Services</label>
        
        <table class="table table-striped table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th style="width: 350px;">Activity Name</th>
                    <th style="width: 100px;">Quantity</th>
                    <th style="width: 100px;">Rate</th>
                    <th style="width: 150px;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for ($row = 1; $row <= 10; $row ++){
                        activitySheetItems($row);
                    }
                ?>
            
                <tr id="totalRow">
                    <td class="emptyCell"></td>
                    <td class="emptyCell"></td>
                    <th>Total</th>
                    <th><input type="text" id="totalAmount" name="totalAmount" class="tableInput" readonly></th>
                </tr>
            </tbody>
        </table>
    </div>

    <div  id="inventoryTable" style="display: none;">
        <label>Stock Changes</label>
        <table class="table table-striped table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th style="width: 350px;">Item Name</th>
                    <th style="width: 100px;">Input Quantity</th>
                    <th style="width: 100px;">Output Quantity</th>
                    <th style="width: 150px;"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                for ($row = 1; $row <= 10; $row ++){
                    activitySheetItems($row);
                }
            ?>
            <tr id="totalRow">
                <td class="emptyCell"></td>
                <td class="emptyCell"></td>
                <th>Total</th>
                <th><input type="text" id="totalAmount" name="totalAmount" class="tableInput" readonly></th>
            </tr>
            </tbody>
        </table>
    </div>

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
    <div style="display: grid;">
        <div id="previousButton" style="grid-column: 1; grid-row: 1; display: none">
            <input type="button" value="Back" class="btn  btn-primary my-3 btn-lg text-white" name="btnsubmit">
        </div>
        <div id="nextButton" style="grid-column: 2; grid-row: 1;">
            <input type="button" value="Next" class="btn  btn-primary my-3 btn-lg text-white" name="btnsubmit">
        </div>
        <div id="submitButton" style="grid-column: 2; grid-row: 1; display: none">
            <?php include "../forms/submitButton.php" ?>
        </div>
    </div>
    
   
</form>
<?php include_once('footer.php'); ?>
<script>
//     var qtyList = ['roastingQty', 'grindingQty', 'sortingQty', 'packaging250Qty', 'packaging500Qty', 'packaging1KgQty', 'packagingOtherQty'];
// var rateList = ['roastingRate', 'grindingRate', 'sortingRate', 'packaging250Rate', 'packaging500Rate', 'packaging1KgRate', 'packagingOtherRate'];
// var amountList = ['roastingAmount', 'grindingAmount', 'sortingAmount', 'packaging250Amount', 'packaging500Amount', 'packaging1KgAmount', 'packagingOtherAmount'];
// let responders = qtyList.concat(rateList);

// function convertString(strNum){
//     var myStr = "";
//     if (typeof strNum === 'string'){
//         myStr = strNum.replace(/,/g, '');
//         return myStr;
//     }else {
//         return strNum;
//     }
// }

// function updateAmount(){
//     var amountValues = [];
//     var grandTotal = 0;
//     for (var i=0; i<qtyList.length; i++){
//         var qty = document.getElementById(qtyList[i]).value;
//         var qtyNum = Number(qty);
//         var rate = document.getElementById(rateList[i]).value;
//         var rateNum = Number(rate);

//         var amount = qtyNum * rateNum;
//         if (amount !== 0){
//             document.getElementById(amountList[i]).setAttribute('value', amount.toLocaleString());
//         }
        
//         // amountValues.push(amount);
//         grandTotal += amount;
       
//     }
    
//     document.getElementById('totalAmount').setAttribute('value', grandTotal.toLocaleString());
   
//     }

//     for (var r=0; r<responders.length; r++){
//         document.getElementById(responders[r]).addEventListener("blur", updateAmount);
//     }

    //toggle between tables
    var nextBtn = document.getElementById("nextButton");
    var nextTbl = document.getElementById("inventoryTable");
    var prevTbl = document.getElementById("servicesTable");
    var sbmtBtn = document.getElementById("submitButton");
    var prevBtn = document.getElementById("previousButton");

    function switchToInventory(){
        nextBtn.style.display = "none";
        prevTbl.style.display = "none";
        nextTbl.style.display = "block";
        sbmtBtn.style.display = "block";
        prevBtn.style.display = "block";
    }

    //previous table display
    
    function switchToServices(){
        nextBtn.style.display = "block";
        prevTbl.style.display = "block";
        nextTbl.style.display = "none";
        sbmtBtn.style.display = "none";
        prevBtn.style.display = "none";
    }


    document.getElementById("nextButton").addEventListener("click", switchToInventory);
    document.getElementById("previousButton").addEventListener("click", switchToServices);
</script>
