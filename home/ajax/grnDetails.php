<?php include "../connection/databaseConn.php"; ?>

<?php

$grnSql = $conn->prepare("SELECT grn_date, grade_id, grn_qty, grn_mc FROM grn WHERE grn_no=?");

$grnNo = ($_GET['q']);

$grnSql->bind_param("s", $grnNo);
$grnSql->execute();
$allGrades = $grnSql -> get_result();

$gradeRow = $allGrades -> fetch_assoc();
$grn_date = $gradeRow['grn_date'];
$grade_name = $gradeRow['grade_id'];
$grn_qty = $gradeRow['grn_qty'];
$grn_mc = $gradeRow['grn_mc'];
?>

<input id="grnDate" value="<?= $grn_date?>"></input>;
<input id="grnGrade" value="<?= $grade_name?>"></input>;
<input id="grnQty" value="<?= $grn_qty?>"></input>;
<input id="grnMc" value="<?= $grn_mc?>"></input>;










