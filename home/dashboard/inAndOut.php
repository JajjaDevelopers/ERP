<?php 
session_start();
$username = $_SESSION["userName"];
?>
<?php include("../private/database.php");?>

<?php
$currentDate = date_create();
$firstDate = date_sub($currentDate,date_interval_create_from_date_string("31 days"));
$daysList = array();
for ($x=0; $x<=31; $x++){
    $nextDate = date_add($firstDate, date_interval_create_from_date_string($x." days"));
    array_push($daysList, date_format($nextDate, "Y-m-d"));

}

$dailyReceivedList = array();
$dailyDispatchedList = array();
function getDailyQty($qtyColumn, $table, $dateColumn, $listStore){
    include("../private/database.php");
    global $daysList;
    $receivedQuery = $conn->prepare("SELECT sum($qtyColumn) AS qty FROM $table WHERE $dateColumn=?");
    for ($i=0; $i<count($daysList); $i++){
        $date = $daysList[$i];
        $receivedQuery->bind_param("s", $date);
        $receivedQuery->execute();
        $receivedQuery->bind_result($dailyQty);
        $receivedQuery->fetch();
        $receivedQuery->close();
        array_push($listStore, $dailyQty);
    }
}


getDailyQty("grn_qty", "grn", "grn_date", $dailyReceivedList);
getDailyQty("dispatch_qty", "dispatch", "dispatch_date", $dailyDispatchedList);

$dates = json_encode($daysList);
$dailyReceived = json_encode($dailyReceivedList);
$dailyDispatched = json_encode($dailyDispatchedList);

?>

<select>
    <?php
    for ($p=0; $p<count($daysList); $p++){
        ?>
        <option><?= $daysList[$p] ?></option>
        <?php
    }
    ?>
</select>