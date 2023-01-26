<?php $pageTitle="Verify Release"; ?>
<?php include("../forms/header.php");?>
<?php include "../connection/releaseVariables.php" ?>
<?php include ("../connection/databaseConn.php");
$relNo = formatDocNo($relNo, "RLS"); 
?>


<form class="regularForm" method="POST" style="height:fit-content; width:800px">

<?php require "../forms/releaseTemplate.php" ?>













    <?php submitButton("Verify", "submit", "confirm"); ?>
</form>
<?php include "../forms/footer.php" ?>