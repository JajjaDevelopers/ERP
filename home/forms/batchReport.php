<?php include_once ("header.php");
include ("../connection/databaseConn.php");
?>
<form id="batchReportForm" class="regularForm"action="../connection/batchReport.php" method="POST" style="width: 900px;">
    <h3 id="batchReportHeading" class="formHeading">Production Report</h3>
    <div id="ajaxDiv" style="display: none;"></div>
    <!-- <div id="ajaxDiv1" ></div> -->
    <div style="display: grid;">
        <div style="grid-row: 1; grid-column: 1; padding-top: 50px; margin-bottom: 5px; ">
            <!-- <label for="batchReportClient">Client</label>
            <input type="text" id="customerId" name="customerId" class="shortInput" readonly value="" style="margin: 0px; width: 70px">
            <input type="text" id="customerName" name="customerName" class="longInputField" readonly value="" style="margin: 0px; width: 300px">
            <select id="batchReportClient" class="longInputField" name="batchReportClient" style="width: 20px; margin: 0px;"
            onchange="updateOrder(this.value)"> -->
            <!-- <?php //selectBatchReportCustomer();?> -->
            <!-- </select><br> -->
            <?php require("../connection/batchReportCustomer.php"); ?>
            
        
            <label for="batchReportOfftaker">Offtaker</label>
            <select id="batchReportOfftaker" class="shortInput" name="batchReportOfftaker">
                <option>Self</option>
                <option>Nucafe</option>
            </select>
            <label for="batchOrderNumber">Order No.:</label>
            <select type="text" id="batchOrderNumber" class="shortInput" name="batchOrderNumber">

            </select>
        </div>
        <div style="grid-row: 1; grid-column: 2;">
            <label for="batchReportNumber">Batch No.:</label>
            <?php
            $newBatchNo = nextDocNumber("batch_reports_summary", "batch_report_no", "BR");
            echo '<label id="batchReportNumber" class="shortInput" name="batchReportNumber">'.$newBatchNo .'</label>'.'<br>';
            ?>
            <label for="batchReportDate">Date:</label>
            <input type="date" id="batchReportDate" class="shortInput" name="batchReportDate">
            <br>
            
            
            
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
                    <td>INPUT FAQ</td>
                    <td><input type="number" id="inputQty" name="inputQty" class="tableInput" value="0"></td>
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
                    <td><input type="number" id="netInputQty" readonly name="netInputQty" class="tableInput"></td>
                </tr>
            </table>
            <div style="display: inline-block; grid-row: 1; grid-column: 2;">
                Avg. MC In: <input type="number" id="batchReportMcIn" class="shortInput" name="batchReportMcIn" style="width: 60px;">
                Avg. MC Out: <input type="doubleval" id="batchReportMcIn" class="shortInput" name="batchReportMcOut" style="width: 60px;"><br>
                Remarks:<br><textarea name="remarks" style="width: 300px; padding: 3px " placeholder="Any comment or remarks"></textarea>
            </div>
        </div>
        
        <h4 style="margin-top: 20px;">RETURNS</h4>
        <h5 style="margin-top: 10px;">High Grades</h5>
        <table id="highGradeReturnsTable">
            <tr>
                <th class="batchItemLabel">GRADE</th>
                <th class="batchItemBags">BAGS</th>
                <th class="batchItemKgs">KGs</th>
                <th class="batchItemPercent">%</th>
            </tr>
            <tr>
                <td id="highGrade1Name" name="highGrade1Name" >Screen 1800</td>
                <td><input type="number" id="highGrade1Bags" readonly name="highGrade1Bags" class="tableInput"></td>
                <td><input type="number" id="highGrade1Qty" name="highGrade1Qty" class="tableInput"></td>
                <td><input type="number" id="highGrade1Per" readonly name="highGrade1Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="highGrade2Name" name="highGrade2Name">Screen 1700</td>
                <td><input type="number" id="highGrade2Bags" readonly name="highGrade2Bags" class="tableInput"></td>
                <td><input type="number" id="highGrade2Qty" name="highGrade2Qty" class="tableInput"></td>
                <td><input type="number" id="highGrade2Per" readonly name="highGrade2Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="highGrade3Name" name="highGrade3Name">Screen 1500</td>
                <td><input type="number" id="highGrade3Bags" readonly name="highGrade3Bags" class="tableInput"></td>
                <td><input type="number" id="highGrade3Qty" name="highGrade3Qty" class="tableInput"></td>
                <td><input type="number" id="highGrade3Per" readonly name="highGrade3Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="highGrade4Name" name="highGrade4Name">Screen 1200</td>
                <td><input type="number" id="highGrade4Bags" readonly name="highGrade4Bags" class="tableInput"></td>
                <td><input type="number" id="highGrade4Qty" name="highGrade4Qty" class="tableInput"></td>
                <td><input type="number" id="highGrade4Per" readonly name="highGrade4Per" class="tableInput"></td>
            </tr>
            <tr>
                <th>SUB TOTAL</th>
                <td><input type="number" id="highGradeSubtotalBags" readonly name="highGradeSubtotalBags" class="tableInput"></td>
                <td><input type="number" id="highGradeSubtotalQty" readonly name="highGradeSubtotalQty" class="tableInput"></td>
                <td><input type="number" id="highGradeSubtotalPer" readonly name="highGradeSubtotalPer" class="tableInput"></td>
            </tr>
        </table>
        <h5 style="margin-top: 10px;">Low Grades</h5>
        <table id="lowGradeReturnsTable">
            <tr>
                <th class="batchItemLabel">GRADE</th>
                <th class="batchItemBags">BAGS</th>
                <th class="batchItemKgs">KGs</th>
                <th class="batchItemPercent">%</th>
            </tr>
            <tr>
                <td id="lowGrade1Name" name="lowGrade1Name">Rej-1899</td>
                <td><input type="number" id="lowGrade1Bags" readonly name="lowGrade1Bags" class="tableInput"></td>
                <td><input type="number" id="lowGrade1Qty" name="lowGrade1Qty" class="tableInput"></td>
                <td><input type="number" id="lowGrade1Per" readonly name="lowGrade1Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="lowGrade2Name" name="lowGrade2Name">Rej-1599/1299(BHP)</td>
                <td><input type="number" id="lowGrade2Bags" readonly name="lowGrade2Bags" class="tableInput"></td>
                <td><input type="number" id="lowGrade2Qty" name="lowGrade2Qty" class="tableInput"></td>
                <td><input type="number" id="lowGrade2Per" readonly name="lowGrade2Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="lowGrade3Name" name="lowGrade3Name">PODS/P-Berry</td>
                <td><input type="number" id="lowGrade3Bags" readonly name="lowGrade3Bags" class="tableInput"></td>
                <td><input type="number" id="lowGrade3Qty" name="lowGrade3Qty" class="tableInput"></td>
                <td><input type="number" id="lowGrade3Per" readonly name="lowGrade3Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="lowGrade4Name" name="lowGrade4Name">Sweepings/Spillages</td>
                <td><input type="number" id="lowGrade4Bags" readonly name="lowGrade4Bags" class="tableInput"></td>
                <td><input type="number" id="lowGrade4Qty" name="lowGrade4Qty" class="tableInput"></td>
                <td><input type="number" id="lowGrade4Per" readonly name="lowGrade4Per" class="tableInput"></td>
            </tr>
            <tr>
                <td id="lowGrade5Name" name="lowGrade5Name">Rej-1199</td>
                <td><input type="number" id="lowGrade5Bags" readonly name="lowGrade5Bags" class="tableInput"></td>
                <td><input type="number" id="lowGrade5Qty" name="lowGrade5Qty" class="tableInput"></td>
                <td><input type="number" id="lowGrade5Per" readonly name="lowGrade5Per" class="tableInput"></td>
            </tr>
            <tr>
                <th id="lowGradeSubtotalName">SUB TOTAL</th>
                <td><input type="number" id="lowGradeSubtotalBags" readonly name="lowGradeSubtotalBags" class="tableInput"></td>
                <td><input type="number" id="lowGradeSubtotalQty" readonly name="lowGradeSubtotalQty" class="tableInput"></td>
                <td><input type="number" id="lowGradeSubtotalPer" readonly name="lowGradeSubtotalPer" class="tableInput"></td>
            </tr>
        </table>
        <table id="colorSorterRejectsTable" style="margin-top: 10px;">
            <tr>
                <th class="batchItemLabel">Color Sorter Rejects</th>
                <th class="batchItemBags">BAGS</th>
                <th class="batchItemKgs">KGs</th>
                <th class="batchItemPercent">%</th>
            </tr>
            <tr>
                <td id="blacks18Name" name="blacks18Name" class="batchItemLabel">Black Beans Screen 1800</td>
                <td><input type="number" id="blacks18Bags" readonly name="blacks18Bags" class="tableInput"></td>
                <td><input type="number" id="blacks18Qty" name="blacks18Bags" class="tableInput"></td>
                <td><input type="number" id="blacks18Per" readonly name="blacks18Bags" class="tableInput"></td>
            </tr>
            <tr>
                <td id="blacks17Name" name="blacks17Name" class="batchItemLabel">Black Beans Screen 1700</td>
                <td><input type="number" id="blacks17Bags" readonly name="blacks17Bags" class="tableInput"></td>
                <td><input type="number" id="blacks17Qty" name="blacks17Bags" class="tableInput"></td>
                <td><input type="number" id="blacks17Per" readonly name="blacks17Bags" class="tableInput"></td>
            </tr>
            <tr>
                <td id="blacks15Name" name="blacks15Name" class="batchItemLabel">Black Beans Screen 1500</td>
                <td><input type="number" id="blacks15Bags" readonly name="blacks15Bags" class="tableInput"></td>
                <td><input type="number" id="blacks15Qty" name="blacks15Bags" class="tableInput"></td>
                <td><input type="number" id="blacks15Per" readonly name="blacks15Bags" class="tableInput"></td>
            </tr>
            <tr>
                <td id="blacks12Name" name="blacks12Name" class="batchItemLabel">Black Beans Screen 1200</td>
                <td><input type="number" id="blacks12Bags" readonly name="blacks12Bags" class="tableInput"></td>
                <td><input type="number" id="blacks12Qty" name="blacks12Bags" class="tableInput"></td>
                <td><input type="number" id="blacks12Per" readonly name="blacks12Bags" class="tableInput"></td>
            </tr>
            <tr>
                <th class="batchItemLabel">SUB TOTAL</th>
                <td><input type="number" id="rejectsSubtotalBags" readonly name="rejectsSubtotalBags" class="tableInput"></td>
                <td><input type="number" id="rejectsSubtotalQty" readonly name="rejectsSubtotalQty" class="tableInput"></td>
                <td><input type="number" id="rejectsSubtotalPer" readonly name="rejectsSubtotalPer" class="tableInput"></td>
            </tr>
        </table>
        <h5 style="margin-top: 10px;">Wastes</h5>
        <table id="wastesTable" style="margin-top: 10px;">
            <tr>
                <th class="batchItemLabel">Grade</th>
                <th class="batchItemBags">BAGS</th>
                <th class="batchItemKgs">KGs</th>
                <th class="batchItemPercent">%</th>
            </tr>
            <tr>
                <td name="stonesName" class="batchItemLabel">Stones</td>
                <td><input type="number" id="stonesBags" readonly name="stonesBags" class="tableInput"></td>
                <td><input type="number" id="stonesQty" name="stonesQty" class="tableInput"></td>
                <td><input type="number" id="stonesPer" readonly name="stonesPer" class="tableInput"></td>
            </tr>
            <tr>
                <td name="preCleanerName" class="batchItemLabel">Pre-Cleaner</td>
                <td><input type="number" id="preCleanerBags" readonly name="preCleanerBags" class="tableInput"></td>
                <td><input type="number" id="preCleanerQty" name="preCleanerQty" class="tableInput"></td>
                <td><input type="number" id="preCleanerPer" readonly name="preCleanerPer" class="tableInput"></td>
            </tr>
            <tr>
                <td name="graderHusksName" class="batchItemLabel">Grader Husks</td>
                <td><input type="number" id="husksBags" readonly name="husksBags" class="tableInput"></td>
                <td><input type="number" id="husksQty" name="husksQty" class="tableInput"></td>
                <td><input type="number" id="husksPer" readonly name="husksPer" class="tableInput"></td>
            </tr>
            <tr>
                <th class="batchItemLabel">SUB TOTAL</th>
                <td><input type="number" id="wastesSubtotalBags" readonly name="wastesSubtotalBags" class="tableInput"></td>
                <td><input type="number" id="wastesSubtotalQty" readonly name="wastesSubtotalQty" class="tableInput"></td>
                <td><input type="number" id="wastesSubtotalPer" readonly name="wastesSubtotalPer" class="tableInput"></td>
            </tr>
        </table>
        <table id="otherLossesTable" style="margin-top: 10px;">
            <tr>
                <th class="batchItemLabel">Other Losses (Estimated)</th>
                <th class="batchItemBags"></th>
                <th class="batchItemKgs"></th>
                <th class="batchItemPercent"></th>
            </tr>
            <tr>
                <td>Handling Loss, Husks</td>
                <td><input type="number" id="handlingLossBags" readonly name="handlingLossBags" class="tableInput"></td>
                <td><input type="number" id="handlingLossQty" name="handlingLossQty" class="tableInput"></td>
                <td><input type="number" id="handlingLossPer" readonly name="handlingLossPer" class="tableInput"></td>
            </tr>
            <tr>
                <td>Drying Loss</td>
                <td><input type="number" id="dryingLossBags" readonly name="dryingLossBags" class="tableInput"></td>
                <td><input type="number" id="dryingLossQty" name="dryingLossQty" class="tableInput"></td>
                <td><input type="number" id="dryingLossPer" readonly name="dryingLossPer" class="tableInput"></td>
            </tr>
            <tr>
                <th>SUB TOTAL</th>
                <td><input type="number" id="otherLossSubtotalBags" readonly name="otherLossSubtotalBags" class="tableInput"></td>
                <td><input type="number" id="otherLossSubtotalQty" readonly name="otherLossSubtotalQty" class="tableInput"></td>
                <td><input type="number" id="otherLossSubtotalPer" readonly name="otherLossSubtotalPer" class="tableInput"></td>
            </tr>
        </table>
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
    <button type="submit" class="btn btn-primary btn-lg">Record</button>
</form>
<script>
    //pick available customer orders
    document.getElementById("salesReportBuyer").addEventListener('change', checkCustomerOrders);
    
    function checkCustomerOrders(){
        var customerId = document.getElementById("customerId").value;
        if (customerId == "") {
            document.getElementById("batchOrderNumber").setAttribute('value', '');
            return;
        } 
        const xhttp = new XMLHttpRequest();
        // Changing customer namne
        xhttp.onload = function() {
            document.getElementById("batchOrderNumber").innerHTML = this.responseText;
        }
        xhttp.open("GET", "../ajax/batchReportOrdersAjax.php?q="+customerId);
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
            document.getElementById("ajaxDiv").innerHTML = this.responseText;
                    
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

        }
        xhttp.open("GET", "../ajax/batchReportInputAjax.php?q="+str);
        xhttp.send();
        
    }
    
</script>

<script src="../assets/js/batchReport.js"></script>
<?php include_once ("footer.php")?>

