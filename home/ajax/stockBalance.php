<?php
include "../private/database.php";
$type = $_GET["type"];
$category = $_GET["category"];
$grade = $_GET["grade"];
$date = $_GET["date"];

//Filters
//Coffee Type filter sql
if ($type == "all"){
    $balSql = $conn->prepare("SELECT grade_id, grade_name, sum(qty_in) AS qty_in, sum(qty_out) AS qty_out, 
                        (sum(qty_in) - sum(qty_out)) AS balance FROM inventory
                        JOIN grades USING (grade_id) WHERE trans_date<=?  GROUP BY grade_id");
    $balSql->bind_param("s", $date);
}else {
    if ($category == "all"){
        $balSql = $conn->prepare("SELECT grade_id, grade_name, sum(qty_in) AS qty_in, sum(qty_out) AS qty_out, 
                        (sum(qty_in) - sum(qty_out)) AS balance FROM inventory
                        JOIN grades USING (grade_id) WHERE (coffee_type=? AND trans_date<=?)
                        GROUP BY grade_id");
        $balSql->bind_param("ss", $type, $date);
    }else{
        if ($grade == "all"){
            $balSql = $conn->prepare("SELECT grade_id, grade_name, sum(qty_in) AS qty_in, sum(qty_out) AS qty_out, 
                        (sum(qty_in) - sum(qty_out)) AS balance FROM inventory
                        JOIN grades USING (grade_id) 
                        WHERE (coffee_type=? AND type_category=? AND trans_date<=?) GROUP BY grade_id");
            $balSql->bind_param("sss", $type, $category, $date);
        }else{
            $balSql = $conn->prepare("SELECT grade_id, grade_name, sum(qty_in) AS qty_in, sum(qty_out) AS qty_out, 
                        (sum(qty_in) - sum(qty_out)) AS balance FROM inventory
                        JOIN grades USING (grade_id) 
                        WHERE (coffee_type=? AND type_category=? AND grade_id=? AND trans_date<=?)
                        GROUP BY grade_id");
            $balSql->bind_param("ssss", $type, $category, $grade, $date);

        }
        
    }
    
}

$balSql->execute();
$balSql->bind_result($grade_id, $grade_name, $qty_in, $qty_out, $balance)
?>
<table class="table table-striped table-hover table-condensed table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Qty In</th>
            <th>Qty Out</th>
            <th>Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($balSql->fetch()){
            ?>
        <tr>
            <td><?= $grade_id ?></td>
            <td><?= $grade_name ?></td>
            <td><?= $qty_in ?></td>
            <td><?= $qty_out ?></td>
            <td><?= $balance ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>