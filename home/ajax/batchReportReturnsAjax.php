<?php include "../private/database.php"; ?>
<?php
if($conn->connect_error) {
  exit('Could not connect');
}
?>
<?php
//Get Coffee Type
$typeSql = $conn->prepare("SELECT coffee_type FROM grades
                            JOIN grn USING (grade_id)
                            JOIN batch_processing_order USING (batch_order_no)
                            WHERE batch_order_no=?");
$batch_order_no = $_GET['q'];
$typeSql->bind_param("i", $batch_order_no);
$typeSql->execute();
$typeSql->bind_result($type);
$typeSql->fetch();
$typeSql->close();
$typ1 = $type;


//Generate grades
$gradeSql = $conn->prepare("SELECT grade_id, grade_name FROM grades WHERE (coffee_type=? AND grade_type=?) ORDER BY grade_rank");
function getGrades($offeeType, $gradeType, $gradeNamePrefix, $tableHeader){
    global $conn, $gradeSql;
    $gradeSql->bind_param("ss", $offeeType, $gradeType);
    $gradeSql->execute();
    $allGrades = $gradeSql -> get_result();
    $rows = $conn -> affected_rows;
    ?>
    <h5 style="margin-top: 10px;"><?= $tableHeader?></h5>
    <table id="highGradeReturnsTable">
        <tr>
            <th class="batchItemLabel">GRADE</th>
            <th class="batchItemBags">BAGS</th>
            <th class="batchItemKgs">KGs</th>
            <th class="batchItemPercent">%</th>
        </tr>
    <?php
    for ($gradeNo=1; $gradeNo <= $rows; $gradeNo++){
        $gradeRow = $allGrades -> fetch_assoc();
        $grade_id = $gradeRow ['grade_id'];
        $grade_name = $gradeNamePrefix.' '.$gradeRow ['grade_name'];
        ?>
        <tr>
            <td id="highGrade1Name" name="highGrade1Name" ><?= $grade_name?></td>
            <td><input type="number" id="highGrade1Bags" readonly name="highGrade1Bags" class="tableInput"></td>
            <td><input type="number" id="highGrade1Qty" name="highGrade1Qty" class="tableInput"></td>
            <td><input type="number" id="highGrade1Per" readonly name="highGrade1Per" class="tableInput"></td>
        </tr>
        <?php
    }
        ?>
        <tr>
            <th>SUB TOTAL</th>
            <td><input type="number" id="highGradeSubtotalBags" readonly name="highGradeSubtotalBags" class="tableInput"></td>
            <td><input type="number" id="highGradeSubtotalQty" readonly name="highGradeSubtotalQty" class="tableInput"></td>
            <td><input type="number" id="highGradeSubtotalPer" readonly name="highGradeSubtotalPer" class="tableInput"></td>
        </tr>
    </table>
<?php
}
getGrades($typ1, "HIGH", "", "High Grades");
getGrades($typ1, "LOW", "", "Low Grades");
getGrades($typ1, "HIGH", "Blacks", "Color Sorter Rejects");
getGrades("NONE", "WASTES", "", "Wastes");
getGrades("NONE", "OTHER LOSSES", "", "Other Losses");
?>