<?php session_start(); ?>
<?php $prepared_by = $_SESSION["userName"]; ?>
<?php include ("database.php"); ?>
<?php
// Generating grades
$gradeList = array();
$qtyOutList = array();
$mcList = array();
$bagsList = array();

for ($x=1; $x<=10; $x++){
    array_push($gradeList, 'item'.$x.'Select');
    array_push($qtyOutList, 'item'.$x.'Qty');
    array_push($mcList, 'item'.$x.'Mc');
    array_push($bagsList, 'item'.$x.'Bags');
}

$dispatch_no = documentNumber("dispatch", "dispatch_no");
$dispatch_date = $_POST["hullingDate"];
$dispatch_time = $_POST["timeOut"];
$customer_id = $_POST["customerId"];
$dispatch_qty = $_POST["totalQty"];
$truck_no = $_POST["truckNo"];
$driver = $_POST["driver"];
$destination = $_POST["destination"];
$comment = $_POST["remarks"];
//Summary 
$summarySql = $conn->prepare("INSERT INTO dispatch (dispatch_no, dispatch_date, dispatch_time, customer_id, dispatch_qty, destination, 
                            truck_no, driver, prepared_by, comment) VALUES (?,?,?,?,?,?,?,?,?,?) ");
$summarySql -> bind_param("isssdsssss", $dispatch_no, $dispatch_date, $dispatch_time, $customer_id, $dispatch_qty, $destination, 
$truck_no, $driver, $prepared_by, $comment);
$summarySql->execute();
$conn->rollback();   

//details
$detailsSql = $conn->prepare("INSERT INTO inventory (inventory_reference, document_number, item_no, customer_id, grade_id, qty_out) 
                            VALUES (?,?,?,?,?,?)");
$inventory_reference = "Dispatch";
$itemNo = 0;
for ($i=0; $i<count($gradeList); $i++){
    $gradeQty = $_POST[$qtyOutList[$i]];
    $gradeId = substr(($_POST[$gradeList[$i]]), 0,6);
    
    
    if ($gradeQty > 0){
        $itemNo += 1;
        $detailsSql->bind_param("siissi", $inventory_reference, $dispatch_no, $itemNo, $customer_id, $gradeId, $gradeQty);
        $detailsSql->execute();
    }
}









header("location: ../forms/dispatch")
?>