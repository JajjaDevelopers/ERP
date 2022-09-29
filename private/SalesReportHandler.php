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

$summarySql = $conn->prepare("INSERT INTO sales_reports_summary (customer_id, sales_report_date, sale_category, sales_report_value, 
                            foreign_currency, exchange_rate, preparing_staff, sales_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$BuyerId = sanitize_table($_POST["BuyerId"]);
$salesReportDate = $_POST["salesReportDate"];
$salesReportCategory = $_POST["salesReportCategory"];
$ugxGrandTotal = sanitize_table($_POST["ugxGrandTotal"]);
$exchangeRate = sanitize_table($_POST["exchangeRate"]);
$salesReportCurrency = sanitize_table($_POST["salesReportCurrency"]);
$preparedBy = $username;
$salesReportNotes = sanitize_table($_POST["salesReportNotes"]);

$summarySql->bind_param("sssisiss", $BuyerId, $salesReportDate, $salesReportCategory, $ugxGrandTotal, $salesReportCurrency, 
                        $exchangeRate, $preparedBy, $salesReportNotes);
$summarySql->execute();
$conn->rollback();















header("location:../public/SalesReport.php") ;
?>