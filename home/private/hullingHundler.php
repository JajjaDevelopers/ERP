<?php session_start(); ?>
<?php $prepared_by = $_SESSION["userName"]; ?>
<?php include ("database.php"); ?>
<?php
$hulling_no = documentNumber("hulling", "hulling_no");
$hulling_date = $_POST["hullingDate"];
$customer_id = $_POST["customerId"];
$input_grade_id = $_POST["inputCode"];
$input_qty = $_POST["inputQty"];
$mc_in = $_POST["inputMc"];
$output_grade_id = $_POST["outputCode"];
$output_qty = $_POST["outputQty"];
$mc_out = $_POST["outputMc"];
$notes = $_POST["notes"];

//Capturing summary
$hullingSummary = $conn->prepare("INSERT INTO hulling (hulling_no, hulling_date, customer_id, input_grade_id, 
                                input_qty, mc_in, output_grade_id, output_qty, mc_out, notes, prepared_by)
                                VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$hullingSummary->bind_param("isssddsddss", $hulling_no, $hulling_date, $customer_id, $input_grade_id, $input_qty,
                            $mc_in, $output_grade_id, $output_qty, $mc_out, $notes, $prepared_by);
$hullingSummary->execute();
$conn->rollback();






header("location: ../forms/hulling.php")
?>