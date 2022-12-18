<?php
$pageTitle = "Pending Verifications";
include_once ('../forms/header.php');
// include "../private/verAndApprFunctions.php";

?>
<form class="regularForm">
    <h2 class="formHeading">Pending Verifications</h2>
    <div>
        <table class="table table-striped table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th style="width: 500px;">Verification Item</th>
                    <th style="width: 100px;">Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="../verification/grnVerifyList.php">Goods Received Notes (GRN)</a></td>
                    <td><a href="../verification/grnVerifyList.php"><?= $grnVerNum ?></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
<?php include("../forms/footer.php") ?>