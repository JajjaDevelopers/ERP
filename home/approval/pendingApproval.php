<?php
$pageTitle = "Pending Approval";
include_once ('../forms/header.php');
// include "../private/verAndApprFunctions.php";

?>
<form class="regularForm">
    <h2 class="formHeading">Pending Approval</h2>
    <div>
        <table class="table table-striped table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th style="width: 500px;">Approval Item</th>
                    <th style="width: 100px;">Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="../approval/grnApprovalList.php">Goods Received Notes (GRN)</a></td>
                    <td><a href="../approval/grnApprovalList.php"><?= $grnApprNum ?></a></td>
                </tr>
            </tbody>
        </table>















    </div>
</form>
<?php include("../forms/footer.php") ?>