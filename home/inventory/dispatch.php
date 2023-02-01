<?php $pageTitle="Delivery Note"; ?>
<?php include("../forms/header.php");?>
<?php include "../private/database.php"?>
<?php include "../connection/releaseVariables.php"; ?>

<form class="regularForm" method="POST" style="height:fit-content; width:800px">

<?php require "../forms/releaseTemplate.php" ?>

    <?php submitButton("Verify", "submit", "confirm"); ?>
</form>
<?php include "../forms/footer.php" ?>
<script>
    document.getElementById("deliveryNoteHeading").innerHTML = "Delivery Note";
    document.getElementById("customerId").setAttribute("value", "<?=$custId?>");
    document.getElementById("customerName").setAttribute("value", "<?=$custName?>");
    document.getElementById("salesReportContact").setAttribute("value", "<?=$ctctPersn?>");
    document.getElementById("salesReportTel").setAttribute("value", "<?=$tel?>");
    //non displaying
    document.getElementById("salesReportBuyer").style.display = "none";
    for (var x=1; x<=10; x++){
        document.getElementById('item'+x+'Select').style.display = "none";
    }

    //item table
    <?php
        $x=1;
        $qtySum = 0;
        while ($relDetSql->fetch()){
            ?>
            document.getElementById("<?='item'.$x.'Id'?>").setAttribute("value", "<?=$grdId?>")
            document.getElementById("<?='item'.$x.'Name'?>").setAttribute("value", "<?=$grdName?>")
            document.getElementById("<?='item'.$x.'Qty'?>").setAttribute("value", "<?=$qty?>")
            <?php
            $qtySum += $qty;
            $x += 1;
        }
    ?>
    document.getElementById("totalQty").setAttribute("value", "<?=$qtySum?>");



</script>