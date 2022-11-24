<?php $pageTitle="Batch Report"; ?>
<?php include_once ("header.php");
include ("../connection/databaseConn.php");
include ("../ajax/batchReportReturnsAjax.php");
?>
<?php 
require_once ("../connection/batchReportVariables.php");
?>
<form id="batchReportForm" class="regularForm"action="../connection/batchReport.php" method="POST" style="width: 900px;">
    <h3 id="batchReportHeading" class="formHeading">Production Report</h3>
    <?php
        include "../alerts/message.php";
     ?>
    <div id="ajaxDiv1" style="display: none">
        
    </div>
    <div>
        <div style="margin-left: 70%">
            <label for="batchReportNumber">Batch No.:</label>
            <?php
                $newBatchNo = nextDocNumber("batch_reports_summary", "batch_report_no", "BR");
                echo '<label id="batchReportNumber" class="shortInput" name="batchReportNumber">'.$newBatchNo .'</label>'.'<br>';
            ?>
            <label for="batchOrderNumber">Order No.:</label>
            <input type="number" id="batchOrderNumber" class="shortInput" name="batchOrderNumber" value="<?= '00'.$batchOrderNumber ?>"><br>
            <label for="batchReportDate">Date:</label>
            <input type="date" id="batchReportDate" class="shortInput" name="batchReportDate">
            <br>
        </div>
        <div style="padding-top: 50px; margin-bottom: 5px; ">
            <?php customerFill(); ?>
            <label for="batchReportOfftaker">Offtaker</label>
            <select id="batchReportOfftaker" class="shortInput" name="batchReportOfftaker">
                <option>Self</option>
                <option>Nucafe</option>
            </select>
        </div>
        
    </div>
    <div>
        
        <div style="display: grid;">
            <table id="batchInputTable" style="width: 300px; grid-row: 1; grid-column: 1;">
                <tr>
                    <th>INPUT:</th>
                    <th style="width: 100px;">KGs</th>
                </tr>
                <tr>
                    <td>INPUT <?= $inputGradeName?></td>
                    <td><input type="number" id="inputQty" name="inputQty" class="tableInput" value="<?= $netInputQty ?>"></td>
                </tr>
                <tr>
                    <td>Add Spill.Priv.Batch</td>
                    <td><input type="number" id="addSpillQty" name="addSpillQty" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Less Spill C/F</td>
                    <td><input type="number" id="lessSpillQty" name="lessSpillQty" class="tableInput"></td>
                </tr>
                <tr>
                    <td>NET INPUT</td>
                    <td><input type="number" id="netInputQty" readonly name="netInputQty" class="tableInput" value="<?= $netInputQty ?>"></td>
                </tr>
            </table>
            <div style="display: inline-block; grid-row: 1; grid-column: 2;">
                Avg. MC In: <input type="number" id="batchReportMcIn" class="shortInput" name="batchReportMcIn" style="width: 60px;"
                readonly value="<?= $inputMc ?>">
                Avg. MC Out: <input type="doubleval" id="batchReportMcIn" class="shortInput" name="batchReportMcOut" style="width: 60px;"
                value="<?= $inputMc ?>"><br>
                Remarks:<br><textarea name="remarks" style="width: 300px; padding: 3px " placeholder="Any comment or remarks"></textarea>
            </div>
        </div>
        
        <h4 style="margin-top: 20px;">RETURNS</h4>
        <div id="arabicaBatchReturnsAjax">
            <?php 
                getGrades($coffeeType, "HIGH", "", "high", "High Grades"); //HIgh grades
                getGrades($coffeeType, "LOW", "", "low", "Low Grades"); //Low grades
                getGrades($coffeeType, "HIGH", "Blacks", "blacks", "Color Sorter Rejects"); //Blacks beans
                getGrades("NONE", "WASTES", "", "wastes", "Wastes"); //Wastes
                getGrades("NONE", "OTHER LOSSES", "", "losses", "Other Losses"); //Other Losses 
            ?>
        </div>

        <table style="margin-top: 10px;">
            <tr>
                <th class="batchItemLabel">OVERALL OUT-TURN</th>
                <td class="batchItemBags"><input type="number" id="overallTotalBags" readonly name="overallTotalBags" class="tableInput"></td>
                <td class="batchItemKgs"><input type="number" id="overallTotalQty" readonly name="overallTotalQty" class="tableInput"></td>
                <td class="batchItemPercent"><input type="number" id="overallTotalPer" readonly name="overallTotalPer" class="tableInput"></td>
            </tr>
        </table>
    </div>
    <div>
        <h4 style="margin-top: 20px;">BATCH RECEIPTS SUMMARY (INPUT)</h4>
        <table>
            <tr>
                <th style="width: 80px;">DATE</th>
                <th style="width: 50px;">GRN</th>
                <th style="width: 50px;">MC</th>
                <th class="batchItemKgs">KGS</th>
                <th class="batchItemLabel">ORIGIN / CLIENT</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <?php include_once("../private/approvalDetails.php"); ?>
</form>
<script>
    // get grade Ids    
    function categoryItemsFreq(){
        var coffeeType = "<?= $coffeeType?>";
        
        const xhttp = new XMLHttpRequest();
        
        xhttp.onload = function() {
            var itemFrequency = JSON.parse(this.responseText);
        }
        xhttp.open("GET", "../ajax/batchReportOrdersAjax.php?q="+coffeeType);
        xhttp.send();
    }
    


    // Get oder input details
    document.getElementById("batchOrderNumber").addEventListener('change', updateOrder);
    function updateOrder(){
        var str = document.getElementById("batchOrderNumber").value;
        if (str == "") {
            document.getElementById("inputQty").setAttribute('value', '');
            document.getElementById("batchReportMcIn").setAttribute('value', '');
            return;
        } 
        const xhttp = new XMLHttpRequest();
        // Changing customer namne
        xhttp.onload = function() {
            document.getElementById("ajaxDiv1").innerHTML = this.responseText;
                    
            // set input qty
            var ajaxInputQty = document.getElementById("orderAjaxQty").value;
            document.getElementById("inputQty").setAttribute('value', ajaxInputQty);
            var inputQty = Number(document.getElementById("inputQty").value);
            var addSpill = Number(document.getElementById("addSpillQty").value);
            var lessSpill = Number(document.getElementById("lessSpillQty").value);
            document.getElementById("netInputQty").setAttribute('value', (inputQty + addSpill - lessSpill));
            
            var ajaxMcIn = document.getElementById("orderAjaxMc").value;
            document.getElementById("batchReportMcIn").setAttribute('value', ajaxMcIn);
            document.getElementById("batchReportMcOut").setAttribute('value', ajaxMcIn);

            var ajaxCoffeeType = document.getElementById("orderAjaxCoffeeType").value;
            document.getElementById("batchReportCoffeeType").setAttribute('value', ajaxCoffeeType);

        }
        xhttp.open("GET", "../ajax/batchReportInputAjax.php?q="+str);
        xhttp.send();
        getBatchReturns(str);
    }


    //Batch returns
    function getBatchReturns(no){
        
        const xhttp = new XMLHttpRequest();
        // Changing customer namne
        xhttp.onload = function() {
            document.getElementById("batchReturnsAjax").innerHTML = this.responseText;

            var receivedJson = document.getElementById("allIdsJson").innerHTML;
            var gradeLists = JSON.parse(receivedJson);
            document.getElementById("checkDiv").innerHTML = gradeLists[0][0];
        }
        xhttp.open("GET", "../ajax/batchReportReturnsAjax.php?q="+no);
        xhttp.send();
    }

    // function returnCoffeeTypeTemplate(){
    //     var selectedCoffeeType = document.getElementById("coffeeTypeSelector").value;
    //     var arabicaDiv = document.getElementById("arabicaBatchReturnsAjax");
    //     var robustaDiv = document.getElementById("robustaBatchReturnsAjax");
    //     if (selectedCoffeeType == "Robusta"){
    //         robustaDiv.style.display = "block";
    //         arabicaDiv.style.display = "none";
    //     }else if (selectedCoffeeType == "Arabica"){
    //         arabicaDiv.style.display = "block";
    //         robustaDiv.style.display = "none";
    //     }else{
    //         arabicaDiv.style.display = "none";
    //         robustaDiv.style.display = "none";
    //     }

    // }
    
</script>

<script src="../assets/js/batchReport.js"></script>
<?php include_once ("footer.php")?>

