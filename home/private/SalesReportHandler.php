<?php session_start(); ?>
<?php $username = $_SESSION["userName"]; ?>
<?php include ("database.php"); ?>
<?php
// Generating grades
$salesReportGradeList = array();
$qtyOutList = array();
$priceList = array();

for ($x=1; $x<=10; $x++){
    array_push($salesReportGradeList, "item".$x."Code"); 
    array_push($qtyOutList, "item".$x."Qty"); 
    array_push($priceList, "item".$x."UgxPx");
}

//Sales Report Number
$query1 = "SELECT max(sales_report_no) AS numbers FROM sales_reports_summary"; 
$stmt = $conn->query($query1);
$result = mysqli_fetch_array($stmt);
$number = $result['numbers'];
$newNo = intval($number) + 1;

// $conn->rollback();

//capturing summary
$summarySql = $conn->prepare("INSERT INTO sales_reports_summary (sales_report_no, customer_id, sales_report_date, sale_category, sales_report_value, 
                            foreign_currency, exchange_rate, preparing_staff, sales_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

$BuyerId = sanitize_table($_POST["BuyerId"]);
$salesReportDate = $_POST["salesReportDate"];
$salesReportCategory = $_POST["salesReportCategory"];
$ugxGrandTotal = sanitize_table($_POST["ugxGrandTotal"]);
$exchangeRate = sanitize_table($_POST["exchangeRate"]);
$salesReportCurrency = sanitize_table($_POST["salesReportCurrency"]);
$preparedBy = $username;
$salesReportNotes = sanitize_table($_POST["salesReportNotes"]);

$summarySql->bind_param("isssisiss",$newNo, $BuyerId, $salesReportDate, $salesReportCategory, $ugxGrandTotal, $salesReportCurrency, 
                        $exchangeRate, $preparedBy, $salesReportNotes);
$summarySql->execute();
$conn->rollback();


//capturing details

    $qtyOutSql = $conn->prepare("INSERT INTO nucafe_inventory (document_type, document_no, grade_id, qty_out, price_ugx) 
                                VALUES (?, ?, ?, ?, ?)");
    $qtyInSql = $conn->prepare("INSERT INTO inventory (inventory_reference, document_number, grade_id, qty_in) 
                                VALUES (?, ?, ?, ?)");   
                                
    $docType = "Sales Report";
    for ($p=0; $p < count($qtyOutList); $p++){
        $qtyOut = ($_POST[$qtyOutList[$p]]) ;
        
        $gradeID = ($_POST[$salesReportGradeList[$p]]);
        $itemPx = ($_POST[$priceList[$p]]);
        if ($qtyOut > 0){
            
            $qtyOutSql->bind_param("sisii", $docType, $newNo, $gradeID, $qtyOut, $itemPx);
            $qtyOutSql->execute();
            $conn->rollback();
            
           
            
        }
        if ($qtyOut > 0){
            $qtyInSql->bind_param("sisi", $docType, $newNo, $gradeID, $qtyOut);
            $qtyInSql->execute();
            $conn->rollback();
        }
    }  



header("location:../forms/SalesReport.php") ;
?>