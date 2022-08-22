<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "factory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = $conn->prepare("INSERT INTO batch_reports_summary (batch_report_no, batch_order_no, batch_report_date, mc_out, comment, offtaker) 
        VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("sisiss", $reportNo, $orderNo, $reportDate, $mcOut, $comment, $offtaker);

function sanitize_table($tabledata)
{
    $tabledata=stripslashes($tabledata);
    $tabledata=strip_tags($tabledata);
    $tabledata=htmlentities($tabledata);
    return $tabledata;
}

$reportNo = sanitize_table($_POST['batchReportNumber']);
$orderNo = sanitize_table($_POST['batchOrderNumber']);
$reportDate = sanitize_table($_POST['batchReportDate']);
$mcOut = sanitize_table($_POST['batchReportMcOut']);
$comment = sanitize_table($_POST['remarks']);
$offtaker = sanitize_table($_POST['batchReportOfftaker']);
$sql->execute();
$conn->close();


?>