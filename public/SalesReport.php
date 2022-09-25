<?php include_once('header.php'); 
// Fetch coffee grades from the system
function CoffeeGrades(){
    global $conn;
    include("CoffeeGrades.php");
}

// Sales Report No
$query = "SELECT max(sales_report_no) FROM factory.sales_reports_summary";
if ($stmt = $conn->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($sales_report_no);
    $stmt->fetch();
    $stmt->close();
}
$newNo = $sales_report_no + 1;
if ($newNo < 10){
    $zeros = '000';
} elseif ($newNo < 100){
    $zeros = '00';
} elseif ($newNo < 1000){
    $zeros = '0';
}else {
    $zeros='';
}
$nextSalesNo = $zeros.$newNo;

// Customer List
function GetCustomerList(){
    global $conn;
    $queryCustomer = "SELECT customer_id, customer_name FROM factory.customer";
    if ($stmt = $conn->prepare($queryCustomer)) {
    $stmt->execute();
    $stmt->bind_result($customer_id, $customer_name);
    echo '<option></option>';
    while ($stmt->fetch()) {
        echo '<option value="'.$customer_id.' '.$customer_name.'">'.$customer_id.' '.$customer_name.'</option>';
    }
    $stmt->close();
}
}

?>

<form id="salesReportForm" name="salesReportForm" class="regularForm" style="height: 700px; width:900px" method="POST" action="../private/SalesReportHandler.php">
    <h2 class="formHeading">Sales Report</h2>
    <div style="margin-left: 70%;">
        <label for="salesReportNumber" id="salesReportNumberLabel" class="salesReportLabel" >Sales No.:</label>
        <input type="text" id="salesReportNumber" readonly class="shortInput" style="width: 100px; text-align: center;"
        value="<?php echo $nextSalesNo; ?>"><br>

        <label for="salesReportDate" id="salesReportNumberLabel" class="salesReportLabel" >Date:</label>
        <input type="date" id="salesReportDate" name="salesReportDate" class="shortInput" style="width: 100px; text-align: center;"><br>

        <label for="exchangeRate" class="salesReportLabel" >Exchange Rate:</label>
        <input type="number" id="exchangeRate" name="exchangeRate" class="longInputField" placeholder="Ex.Rate" style="width: 90px; margin-right: 0px;">
        <!-- <label for="batchNo" id="batchNoLabel" class="salesReportLabel" >Batch No:</label>
        <input type="number" id="batchNo" name="batchNo" class="shortInput" value="" style="width: 100px; text-align: center;"> -->
    </div>
    <div id="ajaxDiv" style="display: none;"> </div>
    <div>
        <label for="salesReportBuyer" id="salesReportBuyerLabel" class="salesReportLabel" >Buyer:</label>
        <input type="text" id="BuyerId" name="BuyerId" readonly class="longInputField" placeholder="ID" style="width: 70px; margin-right: 0px;">
        <input type="text" id="BuyerName" name="BuyerName" readonly class="longInputField" placeholder="Buyer Name" style="margin-left: 0px; margin-right: 0px;">
        <select id="salesReportBuyer" class="longInputField" name="salesReportBuyer" style="margin-left: 0px; width: 20px"
        onchange="SelectCustomer(this.value)">
            <?php GetCustomerList(); ?>
        </select><br>

        <label for="salesReportContact" id="salesReportBuyerLabel"  class="salesReportLabel" >Contact:</label>
        <input type="text" id="salesReportContact" readonly class="longInputField" placeholder="Contact Person" style="margin-right: 0px; width:150px">
        <label for="salesReportContact" id="salesReportBuyerLabel" class="salesReportLabel" >Tel:</label>
        <input type="text" id="salesReportTel" readonly class="longInputField" placeholder="Telephone" style="margin-right: 0px; width:120px">
        <br>
        <label for="salesReportCategory" id="salesReportBuyerLabel" class="salesReportLabel">Category:</label>
        <select id="salesReportCategory" class="longInputField" name="salesReportCategory" style="width: 100px;">
            <option value="Local">Local Sale</option>
            <option value="Export">Export</option>
        </select>
        
    </div>
    <div>
        <table>
            <tr>
                <th style="width: 355px;">Grade</th>
                <th style="width: 80px;">QTY (Kgs)</th>
                <th style="width: 100px;">Batch Number</th>
                <th style="width: 70px;">Price (USD/Kg)</th>
                <th style="width: 70px;">Price (UGX/Kg)</th>
                <th style="width: 100px;">Amount (USD)</th>
                <th style="width: 100px;">Amount (UGX)</th>
            </tr>
            
            <tr>
                <td>
                    <div id="item1Field" style="display: grid;">
                        <input type="text" value="" id="item1Code" name="item1Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item1Name" name="item1Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item1Select" style="margin-left: 0px; width: 20px; grid-column: 3;" class="itemSelect" onchange="setCodeAndName(this.id)">
                            <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item1Qty" name="item1Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item1Batch" name="item1Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item1UsdPx" name="item1UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item1UgxPx" name="item1UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item1UsdAmount" name="item1UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item1UgxAmount" name="item1UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item2Field" style="display: grid;">
                        <input type="text" value="" id="item2Code" name="item2Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item2Name" name="item2Name" class="itmNameInput" style="grid-column: 2; width: 270px" >
                        <select id="item2Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item2Qty" name="item2Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item2Batch" name="item2Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item2UsdPx" name="item2UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item2UgxPx" name="item2UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item2UsdAmount" name="item2UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item2UgxAmount" name="item2UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item3Field"  style="display: grid;">
                        <input type="text" value="" id="item3Code" name="item3Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item3Name" name="item3Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item3Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item3Qty" name="item3Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item3Batch" name="item3Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item3UsdPx" name="item3UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item3UgxPx" name="item3UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item3UsdAmount" name="item3UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item3UgxAmount" name="item3UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td >
                    <div id="item4Field" style="display: grid;">
                        <input type="text" value="" id="item4Code" name="item4Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item4Name" name="item4Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item4Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item4Qty" name="item4Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item4Batch" name="item4Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item4UsdPx" name="item4UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item4UgxPx" name="item4UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item4UsdAmount" name="item4UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item4UgxAmount" name="item4UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item5Field" style="display: grid;">
                        <input type="text" value="" id="item5Code" name="item5Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item5Name" name="item5Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item5Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item5Qty" name="item5Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item5Batch" name="item5Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item5UsdPx" name="item5UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item5UgxPx" name="item5UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item5UsdAmount" name="item5UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item5UgxAmount" name="item5UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item6Field" style="display: grid;">
                        <input type="text" value="" id="item6Code" name="item6Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item6Name" name="item6Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item6Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item6Qty" name="item6Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item6Batch" name="item6Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item6UsdPx" name="item6UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item6UgxPx" name="item6UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item6UsdAmount" name="item6UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item6UgxAmount" name="item6UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item7Field" style="display: grid;">
                        <input type="text" value="" id="item7Code" name="item7Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item7Name" name="item7Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item7Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item7Qty" name="item7Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item7Batch" name="item7Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item7UsdPx" name="item7UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item7UgxPx" name="item7UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item7UsdAmount" name="item7UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item7UgxAmount" name="item7UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item8Field" style="display: grid;">
                        <input type="text" value="" id="item8Code" name="item8Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item8Name" name="item8Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item8Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item8Qty" name="item8Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item8Batch" name="item8Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item8UsdPx" name="item8UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item8UgxPx" name="item8UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item8UsdAmount" name="item8UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item8UgxAmount" name="item8UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item9Field" style="display: grid;">
                        <input type="text" value="" id="item9Code" name="item9Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item9Name" name="item9Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item9Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item9Qty" name="item9Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item9Batch" name="item9Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item9UsdPx" name="item9UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item9UgxPx" name="item9UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item9UsdAmount" name="item9UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item9UgxAmount" name="item9UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <td>
                    <div id="item10Field" style="display: grid;">
                        <input type="text" value="" id="item10Code" name="item10Code" class="itmNameInput" style="grid-column: 1; width: 60px">
                        <input type="text" value="" id="item10Name" name="item10Name" class="itmNameInput" style="grid-column: 2; width: 270px">
                        <select id="item10Select" style="margin-left: 0px; width: 20px; grid-column: 3;" onchange="setCodeAndName(this.id)">
                        <?php CoffeeGrades(); ?>
                        </select>
                    </div>
                </td>
                <td><input type="number" value="" id="item10Qty" name="item10Qty" class="tableInput"></td>
                <td><input type="text" value="" id="item10Batch" name="item10Batch" class="tableInput"></td>
                <td><input type="number" value="" id="item10UsdPx" name="item10UsdPx" class="tableInput"></td>
                <td><input type="number" value="" id="item10UgxPx" name="item10UgxPx" class="tableInput"></td>
                <td><input type="number" value="" id="item10UsdAmount" name="item10UsdAmount" class="tableInput"></td>
                <td><input type="number" value="" id="item10UgxAmount" name="item10UgxAmount" class="tableInput"></td>
            </tr>
            <tr>
                <th>Total</th>
                <th><input type="number" value="" id="item1Qty" name="item1Qty" class="tableInput"></th>
                <th></th>
                <th></th>
                <th></th>
                <th><input type="number" value="" id="item1UsdAmount" name="item1UsdAmount" class="tableInput"></th>
                <th><input type="number" value="" id="item1UgxAmount" name="item1UgxAmount" class="tableInput"></th>
            </tr>
        </table>
    </div>
    <?php include_once("../private/approvalDetails.php"); ?>
    



</form>
<script>
    
    var itemCodes = [];
    var itemNames = [];
    var itemSelections = [];

    //Adding ids to the respective lists
    for (var x=1; x<=10; x++){
        itemCodes.push(("item"+x+"Code"));
        itemNames.push(("item"+x+"Name"));
        itemSelections.push(("item"+x+"Select"));

    }

    function setCodeAndName(selectId){
        var selectedItem = document.getElementById(selectId).value;
        var selectIndex = Number(itemSelections.indexOf(selectId));
        document.getElementById(itemCodes[selectIndex]).setAttribute("value", selectedItem.slice(0,6));
        document.getElementById(itemNames[selectIndex]).setAttribute("value", selectedItem.substr(8));
    }

    //Autofill customer details
    
    function SelectCustomer(buyer){
        var selectedBuyer = document.getElementById("salesReportBuyer").value;
        document.getElementById("BuyerId").setAttribute("value", selectedBuyer.slice(0,6));
        document.getElementById("BuyerName").setAttribute("value", selectedBuyer.substr(7));

        if (buyer == "") {
            document.getElementById("BuyerId").setAttribute('value', '');
            document.getElementById("BuyerName").setAttribute('value', '');
            document.getElementById("salesReportContact").setAttribute('value','');
            document.getElementById("salesReportTel").setAttribute('value', '');
            return;
        } 

        const xhttp = new XMLHttpRequest();
        // Changing customer namne
        xhttp.onload = function() {
            document.getElementById("ajaxDiv").innerHTML = this.responseText;

            var ajaxCustomerContact = document.getElementById("contactPerson").value;
            document.getElementById("salesReportContact").setAttribute('value', ajaxCustomerContact);

            var ajaxTel = document.getElementById("tel").value;
            document.getElementById("salesReportTel").setAttribute('value', ajaxTel);
        }
        xhttp.open("GET", "ajax/salesReportAjax.php?q="+buyer);
        xhttp.send();

    }


</script>
<?php   include_once('footer.php'); ?>