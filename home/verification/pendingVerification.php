<?php
$pageTitle = "Pending Verifications";
include_once ('../forms/header.php');
// include "../private/verAndApprFunctions.php";

?>
<form class="regularForm">
    <h2 class="formHeading">Pending Verifications</h2>
    <div style="margin-top: 20px;">
        <table class="table table-striped table-hover table-condensed table-bordered">
            <thead>
                <tr style="background-color: green; color: white">
                    <th style="width: 500px;">Verification Item</th>
                    <th style="width: 100px;">Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Goods Received Notes (GRN)</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Batch Reports</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Transfers</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Hulling</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Drying</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Valuations</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Sales Reports</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Releases</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Roastery Orders</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Coffee Bulking</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Stock Transfers</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Stock Adjustments</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Stock Counting</a></td>
                    <td style="text-align: right;"><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
<?php include("../forms/footer.php") ?>