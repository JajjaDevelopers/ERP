<?php




$query = "SELECT batch_report_no, `grn`.`customer_id` ,customer_name, grn_no, contact_person, telephone FROM batch_reports_summary 
            JOIN batch_processing_order USING (batch_order_no) 
            JOIN grn USING (batch_order_no) 
            JOIN customer USING (customer_id) WHERE (batch_report_no=2)";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($batch_report_no, $customer_id, $customer_name, $grn_no, $contact_person, $telephone);
    while ($stmt->fetch()) {
        //printf("%s, %s, %s, %s, %s, %s\n", $batch_report_no, $customer_id, $customer_name, $grn_no, $contact_person, $telephone);
    }
    $stmt->close();
}
?>