
<?php include_once('header.php'); ?>
    <div>
    <form id="activitySheetForm" name="activitySheetForm" class="regularForm">
        <div id="topSummuryDiv">
            <h3 id="activitySheetHeading" class="formHeading">Roasting Order Form</h3>
            <label for="activityNumber" id="activityNumberLabel" class="activitySheetLabel" style="padding-top: 15px;">Order No.:</label>
            <input type="text" id="activityNumber" class="activitySheetInput" value="ASN-100001">
            <label for="activityDate" id="activityDateLabel" class="activitySheetLabel">Date:</label>
            <input type="date" id="activityDate" class="activitySheetInput">
            <div style="padding: opx; margin: 0px;">
                <label for="activityCustomer" id="activityCustomerLabel" class="activitySheetLabel">Customer:</label>
                <input type="text" id="activityCustomer" class="longInputField" style="width: 400px;"><br>
                <label for="activityContactPerson" id="activityContactPersonLabel" class="activitySheetLabel">Contact Person:</label>
                <input type="text" id="activityContactPerson" class="longInputField">
                <label for="activityTelephone" id="activityTelephoneLabel" class="activitySheetLabel" style="padding-left: 20px;">Telephone:</label>
                <input type="tel" id="activityTelephone" class="longInputField" style=" width:150px"><br>
                <label for="activityEmail" id="activityEmailLabel" class="activitySheetLabel" style="padding-left: 0px;">Email:</label>
                <input type="email" id="activityEmail" class="longInputField" style=" width:250px">
                <label for="activityAddress" id="activityAddressLabel" class="activitySheetLabel" style="padding-left: 20px;">Address:</label>
                <input type="text" id="activityAddress" class="longInputField">
            </div>
        </div>
        <div id="roastingActivitiesTable">
            <table>
                <th colspan="4">Activities Order</th>
                <tr>
                    <th style="width: 350px;">Activity</th>
                    <th style="width: 100px;">Quantity</th>
                    <th style="width: 100px;">Rate</th>
                    <th style="width: 150px;">Amount</th>
                </tr>
                <tr>
                    <td>Coffee Roasting</td>
                    <td ><input type="number" value="0" id="roastingQty" name="roastingQty" class="tableInput"></td>
                    <td><input type="number" value="0" id="roastingRate" name="roastingRate" class="tableInput"></td>
                    <td><input type="number" value="0" id="roastingAmount" name="roastingAmount" class="tableInput" readonly></td>
                </tr>
                <tr>
                    <td>Coffee Grinding</td>
                    <td><input type="number" id="grindingQty" name="grindingQty" class="tableInput"></td>
                    <td><input type="number" id="grindingRate" name="grindingRate" class="tableInput"></td>
                    <td><input type="number" id="grindingAmount" name="grindingAmount" class="tableInput" readonly></td>
                </tr>
                <tr>
                    <td>Coffee Sorting</td>
                    <td><input type="number" id="sortingQty" name="sortingQty" class="tableInput"></td>
                    <td><input type="number" id="sortingRate" name="sortingRate" class="tableInput"></td>
                    <td><input type="number" id="sortingAmount" name="sortingAmount" class="tableInput" readonly></td>
                </tr>
                <tr>
                    <td>Coffee Packaging 250g</td>
                    <td><input type="number" id="packaging250Qty" name="packaging250Qty" class="tableInput"></td>
                    <td><input type="number" id="packaging250Rate" name="packaging250Rate" class="tableInput"></td>
                    <td><input type="number" id="packaging250Amount" name="packaging250Amount" class="tableInput" readonly></td>
                </tr>
                <tr>
                    <td>Coffee Packaging 500g</td>
                    <td><input type="number" id="packaging500Qty"  name="packaging500Qty" class="tableInput"></td>
                    <td><input type="number" id="packaging500Rate" name="packaging500Rate" class="tableInput"></td>
                    <td><input type="number" id="packaging500Amount" name="packaging500Amount" class="tableInput" readonly></td>
                </tr>
                <tr>
                    <td>Coffee Packaging 1Kg</td>
                    <td><input type="number" id="packaging1KgQty" name="packaging1KgQty" class="tableInput"></td>
                    <td><input type="number" id="packaging1KgRate" name="packaging1KgRate" class="tableInput"></td>
                    <td><input type="number" id="packaging1KgAmount" name="packaging1KgAmount" class="tableInput" readonly></td>
                </tr>
                <tr>
                    <td>Coffee Packaging Other</td>
                    <td><input type="number" id="packagingOtherQty" name="packagingOtherQty" class="tableInput"></td>
                    <td><input type="number" id="packagingOtherRate" name="packagingOtherRate" class="tableInput"></td>
                    <td><input type="number" id="packagingOtherAmount" name="packagingOtherAmount" class="tableInput" readonly></td>
                </tr>
                <tr id="totalRow">
                    <td class="emptyCell"></td>
                    <td class="emptyCell"></td>
                    <th>Total</th>
                    <th><input type="number" id="totalAmount" name="totalAmount" class="tableInput" readonly></th>
                </tr>
            </table>
            <table style="margin-top: 30px; width: 100%">
                <tr>
                    <th>Special Requests</th>
                    <th>Coffee Roast Profile</th>
                </tr>
                <tr>
                    <td><input type="text" id="specialRequest" class="remarks"></td>
                    <td><input type="text" id="roastProfile" class="remarks"></td>
                </tr>
            </table>
            <div id="activityApprovalDIv">
                <div id="activityPrepareDiv">
                    <input type="submit" id="activityConfirmButton" value="Confirm" class="controlButtons">
                    <input type="submit" id="activityCancelButton" value="Cancel" class="controlButtons">
                </div>
            </div>
        </div>
    </form>
    </div>

    <?php include_once('footer.php'); ?>