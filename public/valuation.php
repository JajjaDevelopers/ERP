
<?php include_once('header.php'); ?>
    <form id="valuationForm" name="valuationForm" class="regularForm" style="height: 700px;">
        <h3 class="formHeading">VALUATION REPORT</h3>
        <div style="padding: 15px 5px 5px 70%;">
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >Valuation No.:</label>
            <input type="text" id="valuationNumber" class="shortInput" value="VAL-100001" style="width: 100px; text-align: center;"><br>
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >Date:</label>
            <input type="date" id="valuationNumber" class="shortInput" value="VAL-100001" style="width: 100px; text-align: center;"><br>
            <label for="valuationGrnNumber" id="valuationNumberLabel" class="valuationLabel" >GRN No.:</label>
            <input type="text" id="valuationGrnNumber" class="shortInput" style="width: 100px; text-align: center;"><br>
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >Delivery Date:</label>
            <input type="date" id="valuationNumber" class="shortInput" value="VAL-100001" style="width: 100px; text-align: center;">
        </div>
        <div>
            <label for="valuationSupplier" id="valuationSupplierLabel" class="regularLabel">Supplier:</label>
            <input type="text" id="valuationSupplier" class="longInputField" style="width: 400px;"><br>
            <label for="valuationContactPerson" id="valuationContactPersonLabel" class="regularLabel">Contact Person:</label>
            <input type="text" id="valuationContactPerson" class="longInputField">
            <label for="valuationTelephone" id="valuationTelephoneLabel" class="regularLabel" style="padding-left: 20px;">Telephone:</label>
            <input type="tel" id="valuationTelephone" class="longInputField" style=" width:150px"><br>
        </div>
        <div style="padding-top: 20px;">
            <div id="testDiv">

            </div>
            <table id="valuationsTable">
                <tr>
                    <th colspan="8">VALUATION SCHEDULE</th>
                </tr>
                <tr>
                    <td>Kibooko Delivered (Kg)</td>
                    <td colspan="2"><input type="number" value="" id="kibookoQty" name="kibookoQty" class="tableInput"></td>
                    <td colspan="3">FAQ Delivered (Kg)</td>
                    <td colspan="2"><input type="number" value="12000" id="FAQQty" name="FAQQty" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Exchange Rate</td>
                    <td colspan="2"><input type="number" value="3500" id="exchangeRate" name="exchangeRate" class="tableInput"></td>
                    <td colspan="5">Market facilitator and owner settlement rate</td>
                    
                </tr>
                <tr>
                    <th style="width: 200px;">Grade/Screen</th>
                    <th style="width: 60px;">Actual Yield (%)</th>
                    <th style="width: 80px;">QTY (Kg)</th>
                    <th style="width: 60px;">Price (US$)/Kg</th>
                    <th style="width: 60px;">Price (Cts/lb)</th>
                    <th style="width: 60px;">Price (Ugx/Kg)</th>
                    <th style="width: 80px;">Amount (US$)</th>
                    <th style="width: 100px;">Amount (UGX)</th>
                </tr>
                
                <tr>
                    <td>Screen 1800</td>
                    <td><input type="number" value="" id="highGrade1Yield" readonly name="highGrade1Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade1Qty" name="highGrade1Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade1PriceUs" name="highGrade1PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade1PriceCts" name="highGrade1PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade1PriceUgx" name="highGrade1PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade1AmountUs" readonly name="highGrade1AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade1AmountUgx" readonly name="highGrade1AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Screen 1700</td>
                    <td><input type="number" value="" id="highGrade2Yield" readonly name="highGrade2Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade2Qty" name="highGrade2Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade2PriceUs" name="highGrade2PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade2PriceCts" name="highGrade2PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade2PriceUgx" name="highGrade2PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade2AmountUs" readonly name="highGrade2AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade2AmountUgx" readonly name="highGrade2AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Screen 1500</td>
                    <td><input type="number" value="" id="highGrade3Yield" readonly name="highGrade3Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade3Qty" name="highGrade3Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade3PriceUs" name="highGrade3PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade3PriceCts" name="highGrade3PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade3PriceUgx" name="highGrade3PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade3AmountUs" readonly name="highGrade3AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade3AmountUgx" readonly name="highGrade3AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Screen 1200</td>
                    <td><input type="number" value="" id="highGrade4Yield" readonly name="highGrade4Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade4Qty" name="highGrade4Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade4PriceUs" name="highGrade4PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade4PriceCts" name="highGrade4PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade4PriceUgx" name="highGrade4PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade4AmountUs" readonly name="highGrade4AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="highGrade4AmountUgx" readonly name="highGrade4AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Rej. Black Beans</td>
                    <td><input type="number" value="" id="lowGrade1Yield" readonly name="lowGrade1Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade1Qty" name="lowGrade1Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade1PriceUs" name="lowGrade1PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade1PriceCts" name="lowGrade1PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade1PriceUgx" name="lowGrade1PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade1AmountUs" readonly name="lowGrade1AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade1AmountUgx" readonly name="lowGrade1AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Rej. BHP</td>
                    <td><input type="number" value="" id="lowGrade2Yield" readonly name="lowGrade2Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade2Qty" name="lowGrade2Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade2PriceUs" name="lowGrade2PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade2PriceCts" name="lowGrade2PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade2PriceUgx" name="lowGrade2PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade2AmountUs" readonly name="lowGrade2AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade2AmountUgx" readonly name="lowGrade2AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Rej. 1199</td>
                    <td><input type="number" value="" id="lowGrade3Yield" readonly name="lowGrade3Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade3Qty" name="lowGrade3Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade3PriceUs" name="lowGrade3PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade3PriceCts" name="lowGrade3PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade3PriceUgx" name="lowGrade3PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade3AmountUs" readonly name="lowGrade3AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade3AmountUgx" readonly name="lowGrade3AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Rej. 1899</td>
                    <td><input type="number" value="" id="lowGrade4Yield" readonly name="lowGrade4Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade4Qty" name="lowGrade4Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade4PriceUs" name="lowGrade4PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade4PriceCts" name="lowGrade4PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade4PriceUgx" name="lowGrade4PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade4AmountUs" readonly name="lowGrade4AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade4AmountUgx" readonly name="lowGrade4AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Rej. Pods</td>
                    <td><input type="number" value="" id="lowGrade5Yield" readonly name="lowGrade5Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade5Qty" name="lowGrade5Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade5PriceUs" name="lowGrade5PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade5PriceCts" name="lowGrade5PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade5PriceUgx" name="lowGrade5PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade5AmountUs" readonly name="lowGrade5AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade5AmountUgx" readonly name="lowGrade5AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <td>Rej. Sweepings</td>
                    <td><input type="number" value="" id="lowGrade6Yield" readonly name="lowGrade6Yield" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade6Qty" name="lowGrade6Qty" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade6PriceUs" name="lowGrade6PriceUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade6PriceCts" name="lowGrade6PriceCts" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade6PriceUgx" name="lowGrade6PriceUgx" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade6AmountUs" readonly name="lowGrade6AmountUs" class="tableInput"></td>
                    <td><input type="number" value="" id="lowGrade6AmountUgx" readonly name="lowGrade6AmountUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <th>Actual Total Value Before Costs</th>
                    <td><input type="number" value="" id="totalYield" readonly name="totalYield" class="tableInput"></td>
                    <td><input type="number" value="" id="totalQty" readonly name="totalYield" class="tableInput"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="number" value="" id="grandTotaltUs" readonly name="grandTotaltUs" class="tableInput"></td>
                    <td><input type="number" value="" id="grandTotaltUgx" readonly name="grandTotaltUgx" class="tableInput"></td>
                </tr>
                <tr>
                    <th>Less Costs</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Sub-total Costs</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Total Value after Costs</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
               
            </table>
        </div>
    </form>
    <?php include_once('footer.php'); ?>