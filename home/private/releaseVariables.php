<?php
include "connlogin.php";
include "functions.php";
$releaseNo = intval($_GET['relNo']);
$detSql = $conn->prepare("SELECT request_date, dispatch_date, customer_id, total_qty, prep_by, prep_date, verified_by, ver_date, 
                        appr_by, appr_date, comment, destination, initiated_by, customer_name, contact_person, telephone
                        FROM release_request JOIN customer USING (customer_id) WHERE release_no=?");
$detSql->bind_param("s", $releaseNo);
$detSql->execute();
$detSql->bind_result($relsDate, $dispDate, $custId, $qty, $prepBy, $preDate, $verBy, $verDate, $apprBy, $apprDate, $comt,
                    $destn, $initiator, $custName, $ctctPersn, $tel);
$detSql->fetch();








$relsNo = formatDocNo($releaseNo, "RLS");
$date = $relsDate;
?>