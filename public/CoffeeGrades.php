<?php

$query = "SELECT grade_id, grade_name FROM grades";
if ($stmt = $conn->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2);
    echo '<option></option>';
    while ($stmt->fetch()) {
        echo "<option value='".$field1."--".$field2."'>$field2</option>";
    }
    $stmt->close();
}

?>