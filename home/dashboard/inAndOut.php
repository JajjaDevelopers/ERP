<?php 
session_start();
$username = $_SESSION["userName"];
?>
<?php include("../private/database.php");?>

<?php
$daysList = array();
$currentDate = new DateTime();
$currentDateString = $currentDate->format('Y-m-d');
array_push($daysList, $currentDateString);

for ($x=1; $x<=30; $x++){
    $prevDay = $currentDate->sub(new DateInterval('P1D'));
    $prevDateString = $prevDay->format('Y-m-d');
    array_push($daysList, $prevDateString);
    $currentDate = $prevDay;
}

$dailyReceivedList = array();
$dailyDispatchedList = array();

$receivedQuery = $conn->prepare("SELECT sum(grn_qty) AS qty FROM grn WHERE grn_date=?");
function getDailyQty(){ 
    include("../private/database.php");
    global $daysList, $dailyReceivedList, $receivedQuery;
    
    for ($i=0; $i<count($daysList); $i++){
        $date = $daysList[$i];
        $receivedQuery->bind_param("s", $date);
        $receivedQuery->execute();
        $receivedQuery->bind_result($dailyQty);
        $receivedQuery->fetch();
        if ($dailyQty == ""){
            $dailyQty = 0;
        }
        array_push($dailyReceivedList, $dailyQty);
    }
    $receivedQuery->close();
}
getDailyQty();


$dispatchedQuery = $conn->prepare("SELECT sum(dispatch_qty) AS qty1 FROM dispatch WHERE dispatch_date=?");
function getDailyOut(){
    include("../private/database.php");
    global $daysList, $dailyDispatchedList, $dispatchedQuery;
    
    for ($i=0; $i<count($daysList); $i++){
        $date1 = $daysList[$i]; //'2022-11-09'; //$daysList[$i];
        $dispatchedQuery->bind_param("s", $date1);
        $dispatchedQuery->execute();
        $dispatchedQuery->bind_result($dailyQty);
        $dispatchedQuery->fetch();
        if ($dailyQty == ""){
            $dailyQty = 0;
        }
        array_push($dailyDispatchedList, $dailyQty);
    }
    $dispatchedQuery->close();
}
getDailyOut();

$dates = json_encode($daysList);
$dailyReceived = json_encode($dailyReceivedList);
$dailyDispatched = json_encode($dailyDispatchedList);
$data=json_encode(array($daysList,$dailyReceivedList,$dailyDispatchedList));
echo $data;
?>


<!-- The html below tests response of this data generated here to the index.php page -->
<select>
    <?php
    for ($p=0; $p<count($dailyReceivedList); $p++){
        ?>
        <option><?= $dailyReceivedList[$p] ?></option>
        <?php
    }
    ?>
</select>
<select>
    <?php
    for ($p=0; $p<count($dailyDispatchedList); $p++){
        ?>
        <option><?= $dailyDispatchedList[$p] ?></option>
        <?php
    }
    ?>
</select>
First Date: <?= date_format($currentDate, "Y-m-d")  ?>

<select>
    <?php
    for ($p=0; $p<count($daysList); $p++){
        ?>
        <option><?= $daysList[$p] ?></option>
        <?php
    }
    ?>
</select>


<!-- Getting current month qty in -->
<?php
$currentMonthQtyInSql = $conn->prepare("SELECT sum(grn_qty) AS grnQty FROM grn WHERE (MONTH(grn_date)=MONTH(now()) 
                                        AND YEAR(grn_date)=YEAR(now()))");
$currentMonthQtyInSql->execute();
$currentMonthQtyInSql->bind_result($currentMonthQtyIn);
$currentMonthQtyInSql->fetch();
$currentMonthQtyInSql->close();
if ($currentMonthQtyIn == ""){
    $currentMonthQtyIn = 0;
}

$currentMonthNameSql = $conn->prepare("SELECT monthname(now()), year(now())");
$currentMonthNameSql->execute();
$currentMonthNameSql->bind_result($currentMonthName, $currentYearValue);
$currentMonthNameSql->fetch();
$currentMonthNameSql->close();
?>
<input type="text" value="<?= $currentMonthName.' '.$currentYearValue ?>">
<input type="number" value="<?=  $currentMonthQtyIn?>">

<?php
// Getting previous month qty in
// Need to check January results! May return December of current year of of the last year

$year = $currentYearValue;
if ($currentMonthName == 'January'){
    $year = $currentYearValue - 1;
}
$previousMonthQtyInSql = $conn->prepare("SELECT sum(grn_qty) AS grnQty FROM grn WHERE (MONTH(grn_date)=MONTH(now())-1 
                                        AND YEAR(grn_date)=?)");
$previousMonthQtyInSql->bind_param("i",$year);
$previousMonthQtyInSql->execute();
$previousMonthQtyInSql->bind_result($previousMonthQtyIn);
$previousMonthQtyInSql->fetch();
$previousMonthQtyInSql->close();

if ($previousMonthQtyIn == ""){
    $previousMonthQtyIn = 0;
}

$newCurrentDate = new DateTime();
$prevMonthDate = $newCurrentDate->sub(new DateInterval('P1M'));
$prevMonthDateString = $prevMonthDate->format('Y-m-d');
$previousMonthNameSql = $conn->prepare("SELECT monthname(?)");
$previousMonthNameSql->bind_param("s", $prevMonthDateString);
$previousMonthNameSql->execute();
$previousMonthNameSql->bind_result($previousMonthName);
$previousMonthNameSql->fetch();
$previousMonthNameSql->close();

if ($currentMonthName == 'January'){
    $previousMonthName = 'December';
}
?>
<input type="text" value="<?= $previousMonthName.' '.$year ?>">
<input type="number" value="<?=  $previousMonthQtyIn ?>">


<?php
// Getting current month qty out
$currentMonthQtyOutSql = $conn->prepare("SELECT sum(dispatch_qty) AS dispQty FROM dispatch WHERE (MONTH(dispatch_date)=MONTH(now()) 
                                        AND YEAR(dispatch_date)=YEAR(now()))");
$currentMonthQtyOutSql->execute();
$currentMonthQtyOutSql->bind_result($currentMonthQtyOut);
$currentMonthQtyOutSql->fetch();
$currentMonthQtyOutSql->close();

?>
<input type="text" value="<?= 'Qty out '.$currentMonthName.' '.$currentYearValue ?>">
<input type="number" value="<?=  $currentMonthQtyOut?>">


<?php
// Getting previous month qty out
$previousMonthQtyOutSql = $conn->prepare("SELECT sum(dispatch_qty) AS dispQty FROM dispatch WHERE (MONTH(dispatch_date)=MONTH(now())-1 
                                        AND YEAR(dispatch_date)=?)");
$previousMonthQtyOutSql->bind_param("i",$year);
$previousMonthQtyOutSql->execute();
$previousMonthQtyOutSql->bind_result($previousMonthQtyOut);
$previousMonthQtyOutSql->fetch();
$previousMonthQtyOutSql->close();
if ($previousMonthQtyOut == ""){
    $previousMonthQtyOut = 0;
}

?>
<input type="text" value="<?= $previousMonthName.' '.$year ?>">
<input type="number" value="<?=  $previousMonthQtyOut ?>">


<?php
// Getting current Quarter qty in
$qtCurrentDate = new DateTime();
$quarterValuesList = array(1, 2, 3, 4);
$quarterNamesList = array('Quarter-2', 'Quarter-3', 'Quarter-4', 'Quarter-1');

$currentQuarterQtyInSql = $conn->prepare("SELECT sum(grn_qty) AS grnQty FROM grn WHERE (QUARTER(grn_date)=QUARTER(now()) 
                                        AND YEAR(grn_date)=YEAR(now()))");
$currentQuarterQtyInSql->execute();
$currentQuarterQtyInSql->bind_result($currentQuarterQtyIn);
$currentQuarterQtyInSql->fetch();
$currentQuarterQtyInSql->close();
if ($currentQuarterQtyIn == ""){
    $currentQuarterQtyIn = 0;
}

$getQtrSql = $conn->prepare("SELECT quarter(now()), year(now())");
$getQtrSql->execute();
$getQtrSql->bind_result($currentQtrValue, $currentYearValue);
$getQtrSql->fetch();
$getQtrSql->close();
$currentQtr = array_search($currentQtrValue, $quarterValuesList);
$quarterString = $quarterNamesList[$currentQtr];


?>
<input type="text" value="<?= $quarterString ?>">
<input type="number" value="<?=  $currentQuarterQtyIn?>">


<?php
//Getting previous Quarter qty in
$qtrYear = $currentYearValue;
if ($currentQtrValue == 2){
    $qtrYear = $currentYearValue - 1;
}
$previousQuarterQtyInSql = $conn->prepare("SELECT sum(grn_qty) AS grnQty FROM grn WHERE (QUARTER(grn_date)=QUARTER(now())-1 
                                        AND YEAR(grn_date)=?)");
$previousQuarterQtyInSql->bind_param("i", $qtrYear);
$previousQuarterQtyInSql->execute();
$previousQuarterQtyInSql->bind_result($previousQuarterQtyIn);
$previousQuarterQtyInSql->fetch();
$previousQuarterQtyInSql->close();
if ($previousQuarterQtyIn == ""){
    $previousQuarterQtyIn = 0;
}

$previousQtrValue = $currentQtrValue - 1;
$previousQtr = array_search($previousQtrValue, $quarterValuesList);
$previousQtrString = $quarterNamesList[$previousQtr];
?>
<input type="text" value="<?= $previousQtrString ?>">
<input type="number" value="<?=  $previousQuarterQtyIn ?>">



<?php
//Getting current quarter qty out
$currentQuarterQtyOutSql = $conn->prepare("SELECT sum(dispatch_qty) AS dispQty FROM dispatch WHERE (QUARTER(dispatch_date)=QUARTER(now()) 
                                        AND YEAR(dispatch_date)=YEAR(now()))");
$currentQuarterQtyOutSql->execute();
$currentQuarterQtyOutSql->bind_result($currentQuarterQtyOut);
$currentQuarterQtyOutSql->fetch();
$currentQuarterQtyOutSql->close();
if ($currentQuarterQtyOut == ""){
    $currentQuarterQtyOut = 0;
}

?>
<input type="text" value="<?= $quarterString.' Out' ?>">
<input type="number" value="<?=  $currentQuarterQtyOut?>">


<?php
//Getting previous quarter qty out
$previousQuarterQtyOutSql = $conn->prepare("SELECT sum(dispatch_qty) AS dispQty FROM dispatch WHERE (QUARTER(dispatch_date)=QUARTER(now())-1 
                                        AND YEAR(dispatch_date)=?)");
$previousQuarterQtyOutSql->bind_param("i", $year);
$previousQuarterQtyOutSql->execute();
$previousQuarterQtyOutSql->bind_result($previousQuarterQtyOut);
$previousQuarterQtyOutSql->fetch();
$previousQuarterQtyOutSql->close();
if ($previousQuarterQtyOut == ""){
$previousQuarterQtyOut = 0;
}


?>
<input type="text" value="<?= $previousQtrString.' Out' ?>">
<input type="number" value="<?=  $previousQuarterQtyOut ?>">
