<?php session_start(); ?>
<?php $prepared_by = $_SESSION["userName"]; ?>
<?php include ("database.php"); ?>
<?php
$transfer_no = documentNumber("transfers", "transfer_no");
$transfer_date = $_POST["transferDate"];
$transfer_from = $_POST["fromClientName"];
$transfer_to = $_POST["toClientName"];
$from_witness = $_POST["toClientName"];

$summarySql = $conn->prepare("INSERT INTO transfers (transfer_no, transfer_date, transfer_from, transfer_to, 
                            from_witness, to_witness, prepared_by) VALUE (?, ?, ?, ?, ?, ?, ?)");
$summarySql->bind_param("isss", $transfer_no, $transfer_date, $transfer_from, $transfer_to);





header("location: ../forms/transfer.php");
?>