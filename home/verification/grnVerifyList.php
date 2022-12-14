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
                <th style="width: 60px;">GRN No.</th>
                <th style="width: 80px;">Date</th>
                <th style="width: 250px;">Client</th>
                <th style="width: 250px;">Grade</th>
                <th style="width: 70px;">Qty (Kgs)</th>
                <th style="width: 100px;">Purpose</th>
                <th style="width: 150px;">Captured By</th>
            </tr>
            <?php grnVerificationList(); ?>
        </table>















    </div>















<?php include("../forms/footer.php") ?>