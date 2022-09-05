<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="mainscript.js"></script>
    <title>Roast & Ground Dispatch</title>
</head>
<body> -->
<?php include("header.php");?>
    
    <form id="deliveryNoteForm" class="regularForm">
        <h3 id="deliveryNoteHeading" class="formHeading">Roastery Delivery Note</h3>
        <!--Date div --> 
        <div id="deliveryNoteDiv1" class="formSectionDiv">
            <div id="deliveryNoteNumberDiv" class="innerDiv">
                <label for="deliveryNoteNumber" class="formLabel" id="deliveryNoteInputLabel">Delivery No.:</label>
                <input type="text" id="deliveryNoteNumber" class="deliveryNoteInput" name="deliveryNoteNumber" value="DN-001">
            </div>
            <div id="deliveryNoteDateDiv" class="innerDiv">
                <label for="deliveryNoteDate" class="formLabel">Date:</label>
                <input type="date" id="deliveryNoteDate" class="dnInput" name="deliveryNoteDate">
            </div>
            <div id="deliveryNoteTimeDiv" class="innerDiv">
                <label for="deliveryNoteTimeIn" class="formLabel" id="deliveryNoteTimeInLabel">Time Out:</label>
                <input type="time" id="deliveryNoteTimeIn" class="deliveryNoteInput" name="deliveryNoteTimeIn">
            </div>
        </div>
        <div id="deliveryNoteDiv2" class="formSectionDiv">
            <div>
                <label for="deliveryNoteCustomer" class="formLabel" id="deliveryNoteInputLabel">Customer</label>
                <input type="text" id="deliveryNoteCustomer" class="longInputField" name="deliveryNoteCustomer">
            </div>
            <div>
                <label for="deliveryNoteContact" class="formLabel" id="deliveryNoteInputLabel">Contact Person</label>
                <input type="text" id="deliveryNoteContact" class="longInputField" name="deliveryNoteContact">
            </div>
        </div>
        <div id="deliveryNoteDiv3" class="formSectionDiv">
            <div>
                <table >
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 100px;">Item Code</th>
                        <th style="width: 350px;">Item Name / Grade</th>
                        <th style="width: 100px;">Quantity</th>
                        <th style="width: 80px;">Bags</th>
                        <th style="width: 50px;">%</th>
                    </tr>
                    <tr>
                        <td><input type="number" id="itmNo" class="itmNoInput"  name="itmNo"></td>
                        <td><input id="itmCode" class="itmCodeInput" value="NR-SC18"  name="itmCode"></td>
                        <td><input id="itmName" class="itmNameInput"  name="itmName" value="Natural Robusta Screen 1800"></td>
                        <td><input type="number" id="itmQty" class="itmQtyInput"  name="itmQty"></td>
                        <td><input type="number" id="itmBags" class="itmBagsInput"  name="itmBags"></td>
                        <td><input id="itmPercent" class="itmPercentInput"  name="itmPercent" value=""></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="deliveryNoteDiv4" class="formSectionDiv">
            <table id="tableSummary">
                <tr>
                    <td style="width: 350px; text-align: center; ">Total</td>
                    <td style="width: 100px;"><input type="number" id="itmQty" class="itmQtyInput"  name="itmQty"></td>
                    <td style="width: 80px;"><input type="number" id="itmBags" class="itmBagsInput"  name="itmBags"></td>
                    <td style="width: 50px;"><input id="itmPercent" class="itmPercentInput"  name="itmRemarks" value=""></td>
                </tr>
            </table>
            <div style="padding-top: 20px;">
                <label for="deliveryNoteTruckNumber" class="formLabel" id="deliveryNoteInputLabel">Truck Number</label>
                <input style="width: 100px; padding-left: 5px" type="text" id="deliveryNoteTruckNumber" class="longInputField" name="deliveryNoteContact">
                <label style="padding-left: 20px;" for="deliveryNoteDriver" class="formLabel" id="deliveryNoteInputLabel">Driver Name</label>
                <input style="width: 200px; padding-left: 5px" type="text" id="deliveryNoteDriver" class="longInputField" name="deliveryNoteContact"><br>
                <div style="padding: 5px 0px 0px 0px;">
                    <label style="padding: 5px 0px;" for="deliveryNoteDriver" class="formLabel" id="deliveryNoteInputLabel">Remarks</label>
                    <input style="width: 550px; padding-left: 5px" type="text" id="deliveryNoteDriver" class="longInputField" name="deliveryNoteContact">
                </div>
            </div>
            <div id="confirmationDiv">
                    <input type="submit" id="confirmButton" value="Confirm" class="controlButtons">
                    <input type="submit" id="cancelButton" value="Cancel" class="controlButtons">
            </div>
            <div id="approvalSectionDiv">
                <div id="preparedDiv" class="approvalDiv">
                    <label for="preparedBy" class="approvalLabel" id="deliveryNoteInputLabel">Prepare by:</label>
                    <label class="approveInput" id="deliveryNoteInputLabel">Isaac Wasukira</label>
                </div>
                <div id="verifiedDiv" class="approvalDiv">
                    <label for="verifiedBy" class="approvalLabel" id="deliveryNoteInputLabel">Verrified by:</label>
                    <label class="approveInput" id="deliveryNoteInputLabel">Pending Verification</label>
                </div>
                <div id="approvedDiv" class="approvalDiv">
                    <label class="approvalLabel" id="deliveryNoteInputLabel">Approved by:</label>
                    <label class="approveInput" id="deliveryNoteInputLabel">Pending Approval</label>
                </div>
            </div>
        </div>
    </form>
    
<?php include("footer.php");?>