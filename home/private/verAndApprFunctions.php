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
                <td><a href="verifyGrn.php?grnNo=<?= $grn_no.$rows ?>" ><?= $grn_no.$rows ?></a></td>
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


//Retrieve grn details
function getGrnDetails($grnNo){
    include "connlogin.php";
    $grnSql = $conn->prepare("SELECT * FROM grn WHERE grn_no=$grnNo");
    $grnSql->execute();
    $grnSql->bind_result($grn_no, $grn_date, $grn_time_in, $customer_id, $grade_id, $grn_mc, $no_of_bags, $grn_qty, 
                        $grn_status, $batch_order_no, $purpose, $origin, $delivery_person, $truck_no, $driver, 
                        $quality_remarks, $prepared_by, $verified_by, $approved_by);
$grnSql->fetch();

}

//Document number formatter
function formatDocNo($docNo, $prefix){
    $docNumber = "";
  if ($docNo === 0){
    $docNumber = $prefix."-0001";
  }else{
    if ($docNo<10){
        $docNumber = $prefix."-000".$docNo;
    }
    elseif ($docNo<100){
        $docNumber = $prefix."-00".$docNo;
    }elseif ($docNo<1000){
        $docNumber = $prefix."-0".$docNo;
    }else{
      $docNumber = $prefix."-".$docNo;}
    }
  return $docNumber;

}








?>