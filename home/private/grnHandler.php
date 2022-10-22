<?php 
session_start();
$username = $_SESSION["username"];
?>
<?php include("../private/database.php");?>

<?php
$grnNo = documentNumber("grn", "grn_no");
$grnDate = $_POST["grnDate"];
$timein = $_POST["timein"];
$customerId = sanitize_table($_POST["customerId"]);
$coffeeGrade = sanitize_table($_POST["coffeegrades"]);
$mc = sanitize_table($_POST["mc"]);
$bags = sanitize_table($_POST["bags"]);
$gradeweight = sanitize_table($_POST["gradeweight"]);
$purpose = sanitize_table($_POST["purpose"]);
$origin = sanitize_table($_POST["origin"]);
$deliveryPerson = sanitize_table($_POST["deliveryPerson"]);
$truckNumber = sanitize_table($_POST["truckNumber"]);
$driverName = sanitize_table($_POST["driverName"]) ;
$remarks = sanitize_table($_POST["remarks"]);


$grnStmt = "INSERT INTO grn (grn_no, grn_date, grn_time_in, customer_id, grade_id, grn_mc, no_of_bags, grn_qty, 
                        purpose, origin, delivery_person, truck_no, driver, quality_remarks, prepared_by) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$grnSql = $conn -> prepare($grnStmt);
$grnSql -> bind_param("issssdiisssssss", $grnNo, $grnDate, $timein, $customerId, $coffeeGrade, $mc, $bags, $gradeweight, 
                    $purpose, $origin, $deliveryPerson, $truckNumber, $driverName, $remarks, $username);
$grnSql -> execute();

$grnDetailStmt = "INSERT INTO inventory (inventory_reference, document_number, grade_id, qty_in)
                VALUES (?, ?, ?, ?)";
$grnDetails = $conn-> prepare($grnDetailStmt);
$ref = "GRN";
$grnDetails -> bind_param("sisi", $ref, $grnNo, $coffeeGrade, $gradeweight);
$grnDetails -> execute();


header("location:../forms/Goods_Received_Note.php")
?>
