<?php
include "connlogin.php";
include "functions.php";
include "verAndApprFunctions.php";
$clientId = $_GET["client"];
$grdId = $_GET["grd"];
$frmDate = $_GET["frmDt"];
$toDate = $_GET["toDt"];

$grdFullName = getName("grades", "grade_name", "grade_id", $grdId);
$cltName = getName("customer", "customer_name", "customer_id", $clientId);

//Opening balance
$opnSql = $conn->prepare("SELECT (sum(qty_in)-sum(qty_out)) AS bal FROM inventory WHERE (customer_id=? AND grade_id=?
            AND trans_date < ?)");
$opnSql->bind_param("sss", $clientId, $grdId, $frmDate);
$opnSql->execute();
$opnSql->bind_result($bal);
$opnSql->fetch();
$opnSql->close();
$balance = intval($bal);

//transactions
$sql = $conn->prepare("SELECT inventory_reference, document_number, trans_date, customer_id, customer_name, 
        grade_id, grade_name, qty_in, qty_out FROM inventory JOIN customer USING (customer_id)
        JOIN grades USING (grade_id) WHERE (customer_id=? AND grade_id=? AND (trans_date BETWEEN ? AND ?))");
$sql->bind_param("ssss", $clientId, $grdId, $frmDate, $toDate);
$sql->execute();
$sql->bind_result($ref, $docNo, $transDate, $clId, $clName, $grdId, $grdName, $qtyIn, $qtyOut);

// if ($rows >= 0){
    ?>
    <div style="border: 1px solid green; padding: 5px; border-radius: 10px">
        <label><?=$grdFullName?> Transactions Report from <?=$frmDate?> to <?=$toDate?> for <?=$cltName?></label>
        <table class="table table-striped table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reference</th>
                    <th>Doc No</th>
                    <th>Qty In</th>
                    <th>Qty Out</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><?=$frmDate?></td>
                <td><?="Opening Balance"?></td>
                <td></td>
                <td><?=0?></td>
                <td><?=0?></td>
                <td><?=$balance?></td>
            </tr>
        <?php
        while ($sql->fetch()){
            $balance = $balance+$qtyIn-$qtyOut;
            ?>
            <tr>
                <td><?=$transDate?></td>
                <td><?=$ref?></td>
                <td><?= formatDocNo($docNo,"") ?></td>
                <td><?=$qtyIn?></td>
                <td><?=$qtyOut?></td>
                <td><?=$balance?></td>
            </tr>
            <?php
        }
        $sql->close();
        ?>
        </tbody>
        </table>
    </div>
    <?php
// }












?>