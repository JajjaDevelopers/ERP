<?php 
session_start();
$username = $_SESSION["userName"];
?>
<?php include("../private/database.php");?>
<?php

$batch_report_no = documentNumber("batch_reports_summary", "batch_report_no");

$sql = $conn->prepare("INSERT INTO batch_reports_summary (batch_report_no, batch_order_no, batch_report_date, 
                        customer_id, offtaker, net_input, mc_out, valuation_status, comment, prepared_by) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$batch_order_no = ($_POST['batchOrderNumber']);
$batch_report_date = $_POST['batchReportDate'];
$customer_id = ($_POST['customerId']);
$offtaker = ($_POST['batchReportOfftaker']);
$net_input = ($_POST['netInputQty']);
$mc_out = ($_POST['batchReportMcOut']);
$valuation_status = 0;
$comment = ($_POST['remarks']);

$sql->bind_param("iisssddiss", $batch_report_no, $batch_order_no, $batch_report_date, $customer_id, $offtaker,
                $net_input, $mc_out, $valuation_status, $comment, $username);
$sql->execute();
$conn->rollback();


//Update processing status in batch orders
$updateOrderSql = $conn->prepare("UPDATE batch_processing_order SET processed = '1'
                                 WHERE (batch_order_no = ?)");
$updateOrderSql->bind_param("i", $batch_order_no);
$updateOrderSql->execute();
$conn->rollback();


//inserting individual grade
$highNumber = $_POST["highNumber"];
$lowNumber = $_POST["lowNumber"];
$blacksNumber = $_POST["blacksNumber"];
$wastesNumber = $_POST["wastesNumber"];
$lossesNumber = $_POST["lossesNumber"];
$numbersList = array($highNumber, $lowNumber, $blacksNumber, $wastesNumber, $lossesNumber);

$highGradeList = array();
$lowGradeList = array();
$blacksGradeList = array();
$wastesGradeList = array();
$lossesGradeList = array();
$allLists = array($highGradeList, $lowGradeList, $blacksGradeList, $wastesGradeList, $lossesGradeList);
$listsIdentifier = array("high", "low", "blacks", "wastes", "losses");

$returnSql = $conn->prepare("INSERT INTO inventory (inventory_reference, document_number, customer_id, item_no, 
                            grade_id, mc, qty_in) VALUE (?, ?, ?, ?, ?, ?, ?)");
$itmNo = 1;
$inventory_reference = "Batch Report";

for ($x=0; $x<count($allLists); $x++){
    for ($i=1; $i <= $numbersList[$x]; $i++){
        $grdId = $_POST[($listsIdentifier[$x].'Grade'.$i.'Id')];
        $grdQty = $_POST[($listsIdentifier[$x].'Grade'.$i.'Qty')];
        if ($grdQty != 0){
            $returnSql->bind_param("sisisdd", $inventory_reference, $batch_report_no, $customer_id, $itmNo, $grdId,
                                $mc_out, $grdQty);
            $returnSql->execute();
            $conn->rollback();
            $itmNo += 1;
        }
        
    }
}


// Capturing grade input
// function captureInput(){
//     global $conn, $newBatchNo;
//     $orderNumber = sanitize_table(intval($_POST['batchOrderNumber']));
//     $pickGradeNameSql = sprintf("SELECT grade_name FROM batch_processing_order WHERE batch_order_no = '%s' ", $orderNumber);
//     $result = mysqli_query($conn, $pickGradeNameSql);
//     $gradeNameRow = mysqli_fetch_assoc($result);
//     $gradeName = $gradeNameRow['grade_name'];
//     $conn->rollback();

//     $captureNetInputSql = $conn->prepare("INSERT INTO inventory (inventory_reference, grade_id, qty_out) VALUES (?, ?, ?)");
//     $inputQty = sanitize_table($_POST['netInputQty']);
//     $captureNetInputSql->bind_param("ssd", $newBatchNo, $gradeName, $inputQty);
//     $captureNetInputSql->execute();
// }
// captureInput();


// $captureGradesSql = $conn->prepare("INSERT INTO inventory (inventory_reference, grade_id, qty_in) VALUES (?, ?, ?)");

// for ($x=0; $x < count($allGradeQty); $x++ ) {
    
//     $gradeQty = sanitize_table($_POST[$allGradeQty[$x]]);
//     if ($gradeQty > 0){
//         $captureGradesSql->bind_param("ssd", $newBatchNo, $allGradeName[$x], $gradeQty);
//         $captureGradesSql->execute();
//     }
    
// }





// $conn->close();

header("location:../forms/BatchOrderSelection.php");
exit();


?>