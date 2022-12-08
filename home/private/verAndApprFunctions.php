<?php
function countPendVerifications($table){
    include "connlogin.php";
    $coutnSql = $conn->query("SELECT count(verified_by) as num FROM $table WHERE verified_by='0'");
    $result = mysqli_fetch_array($coutnSql);
    $number = $result['num'];
    return $number;
}

$grnNum = countPendVerifications("grn");

function grnVerificationList(){
    include "connlogin.php"; 
    $sql = "SELECT grn_no, grn_date, customer_name, grade_name, grn_qty, purpose, FullName 
            FROM grn
            JOIN customer USING (customer_id)
            JOIN grades USING (grade_id)
            JOIN members WHERE members.UserName=grn.prepared_by AND
            (verified_by='0')";
    $getList = $conn->prepare($sql);
    $getList->execute();
    $getList->bind_result($grn_no, $grn_date, $customer_name, $grade_name, $grn_qty, $purpose, $FullName);
    $rows = $conn->mysqli_affected_rows;
    if ($rows<0){
        ?>
        <tr>
            <td>There are no unverified GRNs currently!</td>
        </tr>
        <?php
    }else{
        while ($getList->fetch()){
            ?>
            <tr>
                <td><?= $grn_no.$rows ?></td>
                <td><?= $grn_date ?></td>
                <td><?= $customer_name ?></td>
                <td><?= $grade_name ?></td>
                <td><?= $grn_qty ?></td>
                <td><?= $purpose ?></td>
                <td><?= $FullName ?></td>
            </tr>
        <?php
        }
    }
}





?>