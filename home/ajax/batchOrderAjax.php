<?php include "../connection/databaseConn.php"; ?>

<?php

$gradeSql = $conn->prepare("SELECT grn_no FROM grn WHERE (customer_id=? AND purpose='Processing' AND batch_order_no=0 )");

$customer_id = ($_GET['q']);

$gradeSql->bind_param("s", $customer_id);
$gradeSql->execute();
$allGrns = $gradeSql -> get_result();
$rows = $conn -> affected_rows;

echo '<option></option>';
for ($gradeNo=1; $gradeNo <= $rows; $gradeNo++){
    $gradeRow = $allGrns -> fetch_assoc();
    $id = $gradeRow['grn_no'];
    // $gradeName = $gradeRow['grade_name'];

    echo '<option value="'.$id.'">'.$id.'</option>';
   
}




?>