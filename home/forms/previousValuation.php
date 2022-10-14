<?php include_once('header.php'); ?>

<input type="submit" id="valuationNumber" name="valuationNumber" class="shortInput" form="previousValuations"
            style="width: 100px; text-align: center;" value="Previous"><br>


<?php include_once("../connection/previousValuation.php"); ?>
    














<form id="previousValuations" class="" method="POST" action="previousValuation.php" style="display: none;">
    <input type="number" id="valuationNumber" name="valuationNumber" class="shortInput" value="<?php echo $previousValuationNo; ?>" 
    style="width: 100px; text-align: center; display:none;">
            
</form>
<script src="../assets/js/valuationJavaScript.js"></script>

<?php include_once('footer.php');?>