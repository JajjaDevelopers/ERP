<?php
$pageTitle = "GRN Verification";
include_once ('../forms/header.php');
// include "../private/verAndApprFunctions.php";
include "../connection/verifyGrn.php";
?>
<?php include ("../connection/databaseConn.php"); ?>
<?php
$grnNo = formatDocNo($grn_no, "GRN-");
?>
<form class="regularForm" action="../connection/grnVerifyFinal.php" method="POST" style="height: fit-content;">

  <?php include "../forms/grnTemplate.php" ?>
  <?php submitButton("Verify");?>
</form>

<?php include "../forms/footer.php" ?>
<script>
    document.getElementById("salesReportBuyer").style.display = "none";
    document.getElementById("customerName").value = "<?=$customer_name?>";
    document.getElementById("customerId").value = "<?=$customer_id?>";
    document.getElementById("salesReportContact").value = "<?=$contact_person?>";
    document.getElementById("salesReportTel").value = "<?= '+256'.$telephone?>";
</script>
