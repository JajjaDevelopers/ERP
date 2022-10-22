<?php
$server="localhost";
$db="factory";
$user="root";
$pwd="root";
$charset="utf8mb4";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize_table($tabledata)
{
    $tabledata=stripslashes($tabledata);
    $tabledata=strip_tags($tabledata);
    $tabledata=htmlentities($tabledata);
    return $tabledata;
}

function batchSummary(){
    global $conn;
    $sql = $conn->prepare("INSERT INTO batch_reports_summary (batch_order_no, batch_report_date, mc_out, comment, offtaker) 
            VALUES (?, ?, ?, ?, ?)");
    $orderNo = intval($_POST['batchOrderNumber']);
    $reportDate = ($_POST['batchReportDate']);
    $mcOut = ($_POST['batchReportMcOut']);
    $comment = ($_POST['remarks']);
    $offtaker = ($_POST['batchReportOfftaker']);
    $sql->bind_param("isdss", $orderNo, $reportDate, $mcOut, $comment, $offtaker);
    $sql->execute();
    $conn->rollback();
}
batchSummary();

// Output grade names
$highGradesName = array("Screen 1800", "Screen 1700", "Screen 1500", "Screen 1200");
$lowGradesName = array("Rej-1899", "Rej-1599/1299(BHP)", "PODS/P-Berry", "Sweepings/Spillages", "Rej-1199");
$rejectsName = array("Black Beans Screen 1800",  "Black Beans Screen 1700", "Black Beans Screen 1500", "Black Beans Screen 1200");
$wastesName = array("Stones", "Pre-Cleaner", "Grader Husks");
$otherLossesName = array("Handling Loss, Husks", "Drying Loss");

$allGradeName = array_merge($highGradesName, $lowGradesName, $rejectsName, $wastesName, $otherLossesName);


// Output grade name keys
$highGradesNameKey = array("highGrade1NameKey", "highGrade2NameKey", "highGrade3NameKey", "highGrade4NameKey");
$lowGradesNameKey = array("lowGrade1NameKey", "lowGrade2NameKey", "lowGrade3NameKey", "lowGrade4NameKey", "lowGrade5NameKey");
$rejectsNameKey = array("blacks18NameKey",  "blacks17NameKey", "blacks15NameKey", "blacks12NameKey");
$wastesNameKey = array("stonesNameKey", "preCleanerNameKey", "husksNameKey");
$otherLossesNameKey = array("handlingLossNameKey", "dryingLossNameKey");

$allGradeNameKey = array_merge($highGradesNameKey, $lowGradesNameKey, $rejectsNameKey, $wastesNameKey, $otherLossesNameKey);
// Output grades qty
$highGradesQty = array("highGrade1Qty", "highGrade2Qty", "highGrade3Qty", "highGrade4Qty");
$lowGradesQty = array("lowGrade1Qty", "lowGrade2Qty", "lowGrade3Qty", "lowGrade4Qty", "lowGrade5Qty");
$rejectsQty = array("blacks18Qty",  "blacks17Qty", "blacks15Qty", "blacks12Qty");
$wastesQty = array("stonesQty", "preCleanerQty", "husksQty");
$otherLossesQty = array("handlingLossQty", "dryingLossQty");

$allGradeQty = array_merge($highGradesQty, $lowGradesQty, $rejectsQty, $wastesQty, $otherLossesQty);

$latestBatchNoSql = "SELECT max(batch_report_no) AS lastNo FROM batch_reports_summary";
$getMax = $conn->query($latestBatchNoSql);
$row = mysqli_fetch_array($getMax);
$newBatchNo = $row['lastNo'];
$period = '/21/2022';
if ($newBatchNo < 10){
    $zeros = '0000';
} elseif ($newBatchNo < 100){
    $zeros = '000';
} elseif ($newBatchNo < 1000){
    $zeros = '00';
}elseif ($newBatchNo < 10000){
    $zeros = '0';
}else {
    $zeros='';
}

$newBatchNo = "BR-".$zeros.strval($newBatchNo);

// Capturing grade input
function captureInput(){
    global $conn, $newBatchNo;
    $orderNumber = sanitize_table(intval($_POST['batchOrderNumber']));
    $pickGradeNameSql = sprintf("SELECT grade_name FROM batch_processing_order WHERE batch_order_no = '%s' ", $orderNumber);
    $result = mysqli_query($conn, $pickGradeNameSql);
    $gradeNameRow = mysqli_fetch_assoc($result);
    $gradeName = $gradeNameRow['grade_name'];
    $conn->rollback();

    $captureNetInputSql = $conn->prepare("INSERT INTO inventory (inventory_reference, grade_id, qty_out) VALUES (?, ?, ?)");
    $inputQty = sanitize_table($_POST['netInputQty']);
    $captureNetInputSql->bind_param("ssd", $newBatchNo, $gradeName, $inputQty);
    $captureNetInputSql->execute();
}
captureInput();


$captureGradesSql = $conn->prepare("INSERT INTO inventory (inventory_reference, grade_id, qty_in) VALUES (?, ?, ?)");

for ($x=0; $x < count($allGradeQty); $x++ ) {
    
    $gradeQty = sanitize_table($_POST[$allGradeQty[$x]]);
    if ($gradeQty > 0){
        $captureGradesSql->bind_param("ssd", $newBatchNo, $allGradeName[$x], $gradeQty);
        $captureGradesSql->execute();
    }
    
}

$conn->close();

header("location:../forms/batchReport.php");
exit();


?>