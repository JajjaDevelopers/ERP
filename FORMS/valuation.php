
<?php include_once('header.php'); ?>
    <form id="valuationForm" name="valuationForm" class="regularForm">
        <h3 class="formHeading">VALUATION REPORT</h3>
        <div style="padding: 15px 5px 5px 70%;">
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >Valuation No.:</label>
            <input type="text" id="valuationNumber" class="valuationInput" value="VAL-100001" style="width: 100px; text-align: center;">
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >Date:</label>
            <input type="date" id="valuationNumber" class="valuationInput" value="VAL-100001" style="width: 100px; text-align: center;"><br>
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >GRN No.:</label>
            <input type="text" id="valuationNumber" class="valuationInput" style="width: 100px; text-align: center;"><br>
            <label for="valuationNumber" id="valuationNumberLabel" class="valuationLabel" >Delivery Date:</label>
            <input type="date" id="valuationNumber" class="valuationInput" value="VAL-100001" style="width: 100px; text-align: center;">
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
                    <td colspan="2"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>FAQ Delivered (Kg)</td>
                    <td colspan="2"></td>
                    <td colspan="2">Exchange Rate</td>
                    <td></td>
                    <td colspan="2">Market facilitator and owner settlement rate</td>
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
                <!--
                <tr>
                    <td>Screen 1800</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Screen 1700</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Screen 1500</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Screen 1200</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rej. Black Beans</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rej. BHP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rej. 1199</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rej. 1899</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rej. Pods</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rej. Sweepings</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Actual Total Value Before Costs</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                -->
            </table>
        </div>
    </form>
    <?php include_once('footer.php'); ?>