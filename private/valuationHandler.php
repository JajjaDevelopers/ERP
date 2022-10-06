<?php 
session_start();

// $servername = $_SESSION["servername"];
$username = $_SESSION["username"];
// $password = $_SESSION["password"];
// $dbname = $_SESSION["dbname"];
include ("connlogin.php");
// $conn = new mysqli($servername, $username, $password, $dbname);
// $number = documentNumber("valuation_report_summary", "valuation_no");
$nextNoSql = "SELECT max(valuation_no) AS numbers FROM valuation_report_summary";
$nextNoQuery = $conn->query($nextNoSql);
$nextNoResult = mysqli_fetch_array($nextNoQuery);
$number = $nextNoResult['numbers'];


function sanitize_table($tabledata)
{
    $tabledata=stripslashes($tabledata);
    $tabledata=strip_tags($tabledata);
    $tabledata=htmlentities($tabledata);
    return $tabledata;
}

$summarySql = $conn->prepare("INSERT INTO valuation_report_summary (valuation_no, valuation_date, batch_report_no, customer_id, exchange_rate, 
                            costs, prepared_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
$valuationNo = intval($number) +1;
$valuationDate = $_POST['valuationDate'];
$batchReportNo = $_POST['batchNo'];
$customerId = $_POST['valuationSupplier'];
$exchangeRate = $_POST['exchangeRate'];
$costs = $_POST['subTotalCostsUgx'];
$preparedBy = $username;
$summarySql->bind_param("ssssdds", $valuationNo, $valuationDate, $batchReportNo, $customerId, $exchangeRate, $costs, $preparedBy);
$summarySql->execute();
$conn->rollback();

$highGradesName = array("Screen 1800", "Screen 1700", "Screen 1500", "Screen 1200");
$lowGradesName = array("Black Beans", "Rej-1599/1299(BHP)", "Rej-1199", "Rej-1899", "PODS/P-Berry", "Sweepings/Spillages");
$allGradeName = array_merge($highGradesName, $lowGradesName);

$highGradesQty = array("highGrade1Qty", "highGrade2Qty", "highGrade3Qty", "highGrade4Qty");
$lowGradesQty = array("lowGrade1Qty", "lowGrade2Qty", "lowGrade3Qty", "lowGrade4Qty", "lowGrade5Qty", "lowGrade6Qty");
$allGradeQty = array_merge($highGradesQty, $lowGradesQty);

$highGradesPriceUgx = array("highGrade1PriceUgx", "highGrade2PriceUgx", "highGrade3PriceUgx", "highGrade4PriceUgx");
$lowGradesPriceUgx = array("lowGrade1PriceUgx", "lowGrade2PriceUgx", "lowGrade3PriceUgx", "lowGrade4PriceUgx", "lowGrade5PriceUgx", "lowGrade6PriceUgx");
$allGradePriceUgx = array_merge($highGradesPriceUgx, $lowGradesPriceUgx);

// Posting valuations items into nucafe invetory
$quantityInSql = $conn->prepare("INSERT INTO nucafe_inventory (document_type, document_no, grade_id, qty_in, price_ugx) VALUES (?, ?, ?, ?, ?)"); // nucafe inventory
$quantityOutSql = $conn->prepare("INSERT INTO inventory (inventory_reference, grade_id, qty_out) VALUES (?, ?, ?)"); // General inventory

$docType = "Valuation Report";
for ($x=0; $x < count($allGradeQty); $x++ ) {
    
    $gradeName = $allGradeName[$x];
    $gradeQty = sanitize_table($_POST[$allGradeQty[$x]]);
    $gradePrice = sanitize_table($_POST[$allGradePriceUgx[$x]]);
    if ($gradeQty > 0){
        $quantityInSql->bind_param("sisdd", $docType, $valuationNo, $gradeName, $gradeQty, $gradePrice);
        $quantityInSql->execute();

        $quantityOutSql->bind_param("ssd", $valuationNo, $gradeName, $gradeQty);
        $quantityOutSql->execute();
    }
    
}

header("location:../public/valuation.php") ;
?>