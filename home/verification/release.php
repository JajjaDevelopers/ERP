<?php $pageTitle="Verify Release"; ?>
<?php include("../forms/header.php");?>
<?php include "../connection/releaseVariables.php" ?>
<?php include ("../connection/databaseConn.php");
 
?>


<form class="regularForm" method="POST" style="height:fit-content; width:800px">

<?php require "../forms/releaseTemplate.php" ?>













    <?php submitButton("Verify", "submit", "confirm"); ?>
</form>
<?php include "../forms/footer.php" ?>
<script>
    document.getElementById("customerId").setAttribute("value", "<?=$custId?>");
    document.getElementById("customerName").setAttribute("value", "<?=$custName?>");
    document.getElementById("salesReportContact").setAttribute("value", "<?=$ctctPersn?>");
    document.getElementById("salesReportTel").setAttribute("value", "<?=$tel?>");
    //non displaying
    document.getElementById("salesReportBuyer").style.display = "none";


</script>