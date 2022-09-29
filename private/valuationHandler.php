<?php 
session_start();

$servername = $_SESSION["servername"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = $_SESSION["dbname"];
$conn = new mysqli($servername, $username, $password, $dbname);

function sanitize_table($tabledata)
{
    $tabledata=stripslashes($tabledata);
    $tabledata=strip_tags($tabledata);
    $tabledata=htmlentities($tabledata);
    return $tabledata;
}



$summarySql = $conn->prepare("INSERT INTO valuation_report_summary (valuation_no, valuation_date, batch_report_no, customer_id, exchange_rate, 
                            costs, prepared_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
$valuationNo = $_POST['valuationNumber'];
$valuationDate = $_POST['valuationDate'];
$batchReportNo = $_POST['batchNo'];
$customerId = $_POST['valuationSupplier'];
$exchangeRate = $_POST['exchangeRate'];
$costs = $_POST['subTotalCostsUgx'];
$preparedBy = $username;
$summarySql->bind_param("ssssdds", $valuationNo, $valuationDate, $batchReportNo, $customerId, $exchangeRate, $costs, $preparedBy);
$summarySql->execute();
$conn->rollback();







header("location:../public/valuation.php") ;
?>