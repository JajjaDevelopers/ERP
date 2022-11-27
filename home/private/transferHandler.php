<?php session_start(); ?>
<?php $prepared_by = $_SESSION["userName"]; ?>
<?php include ("database.php"); ?>
<?php
$transfer_no = documentNumber("transfers", "transfer_no");
$transfer_date = $_POST["transferDate"];
$transfer_from = $_POST["fromClientId"];
$transfer_to = $_POST["toClientId"];
$from_witness = $_POST["fromWitnessName"];
$to_witness = $_POST["toWitnessName"];

$summarySql = $conn->prepare("INSERT INTO transfers (transfer_no, transfer_date, transfer_from, transfer_to, 
                            from_witness, to_witness, prepared_by)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
$summarySql->bind_param("sssssss", $transfer_no, $transfer_date, $transfer_from, $transfer_to, $from_witness, 
                        $to_witness, $prepared_by);
$summarySql->execute();
$conn->rollback();





header("location: ../forms/transfer.php");
?>