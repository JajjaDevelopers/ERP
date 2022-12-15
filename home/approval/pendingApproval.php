<?php
$pageTitle = "Pending Approval";
include_once ('../forms/header.php');
include "../private/verAndApprFunctions.php";

?>
<form class="regularForm">
    <h2 class="formHeading">Pending Approval</h2>
    <div>
        <table>
            <tr>
                <th style="width: 500px;">Approval Item</th>
                <th style="width: 100px;">Number</th>
            </tr>
            <tr>
                <td><a href="../approval/grnApprovalList.php">Goods Received Notes (GRN)</a></td>
                <td><a href="../approval/grnApprovalList.php"><?= $grnApprNum ?></a></td>
            </tr>
        </table>















    </div>
</form>
<?php include("../forms/footer.php") ?>