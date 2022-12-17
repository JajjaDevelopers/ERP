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
                        activityServices($row);
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
                for ($row = 1; $row <= 10; $row ++){ //script for creating items should be adjusted to match $row value
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
    //create item ids
    var itmCodeList = [];
    var itmNameList = [];
    var itmSelectList = [];
    var itmQtyList = [];
    var itmRateList = [];
    var itmAmountList = [];
    // let responders = qtyList.concat(rateList);

    for (var x=1; x<=10; x++){ 
        itmCodeList.push("itm"+x+"Code");
        itmNameList.push("itm"+x+"Name");
        itmSelectList.push("itm"+x+"Select");
        itmQtyList.push("itm"+x+"Qty");
        itmRateList.push("itm"+x+"Rate");
        itmAmountList.push("itm"+x+"Amount");
    }


    //Create service ids
    function selectItemx(itmSelectId){
        
        var selectedItem = document.getElementById(itmSelectId).value;
        var selectedIndex = itmSelectList.indexOf(itmSelectId);

        document.getElementById(itmCodeList[selectedIndex]).setAttribute("value", selectedItem.slice(0,6));
        document.getElementById(itmNameList[selectedIndex]).setAttribute("value", selectedItem.substr(8));
    }
    
    // for (var x=0; x<itmSelectList.length;x++){
        // var idf = itmSelectList[0];
        // document.getElementById("itm1Select").addEventListener("change", selectItemx("itm1Select"));
    // }
    // function selectItem(selectId, selectIdList, codeIdList, nameIdList){
        
    //     var selectedItem = document.getElementById(selectId).value;
    //     var selectIndex = Number(selectIdList.indexOf(selectId));

    //     document.getElementById(codeIdList[selectIndex]).setAttribute("value", selectedItem.slice(0,6));
    //     document.getElementById(nameIdList[selectIndex]).setAttribute("value", selectedItem.substr(8));
    // }
    
    // for (var x=0; x<itmSelectList.length;x++){
    //     document.getElementById(itmSelectList[x]).addEventListener("change", selectItem(itmSelectList[x], itmSelectList, 
    //     itmCodeList, itmNameList));
    // }
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

//45M
3rd Party app 20M
farmers 25M
Transfer 50M for payment
contact David and Deus for approval