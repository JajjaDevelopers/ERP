<?php
$pageTitle = "GRN Pending Verifications";
include_once ('../forms/header.php');
include "../private/verAndApprFunctions.php";
?>
<form class="regularForm" style="width: 1000px;">
    <h2 class="formHeading">GRNs Pending Verification</h2>
    <div>
        <table>
            <tr>
                <th style="width: 80px;">GRN No.</th>
                <th style="width: 100px;">Date</th>
                <th style="width: 300px;">Client</th>
                <th style="width: 100px;">Grade</th>
                <th style="width: 100px;">Qty (Kgs)</th>
                <th style="width: 100px;">Purpose</th>
                <th style="width: 100px;">Captured By</th>
            </tr>
            <?php grnVerificationList(); ?>
        </table>















    </div>















<?php include("../forms/footer.php") ?>