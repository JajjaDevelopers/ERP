<?php $pageTitle="Add New Item"; ?>
<?php require "../forms/header.php" ?>
<?php include ("../connection/databaseConn.php");?>
<?php
// Item Label
function newLabel($gridColumnNo, $gridRowNo, $labelText){
    ?>
    <label style="grid-column:<?= $gridColumnNo ?>; grid-row:<?= $gridRowNo ?>" ><?= $labelText ?></label>
    <?php
}

// Item Input
function newInput($inputType, $inputId, $gridColumnNo, $gridRowNo, $placeHolder, $width){
    ?>
    <input type="<?= $inputType ?>" id="<?= $inputId ?>" name="<?= $inputId ?>" class="shortInput" 
    style="grid-column:<?= $gridColumnNo ?>; grid-row:<?= $gridRowNo ?>; width:<?= $width ?>" 
    placeholder="<?= $placeHolder ?>">
    <?php
}
?>
<form id="hullingForm" name="hullingForm" class="regularForm" style="height:auto;" method="POST" action="../connection/newItem.php">
    <h3 class="formHeading">New Item</h3>
    <div style="width: 50%; margin: auto;">
        <label class="radio-inline"><input type="radio" name="invType" value="ITEM">ITEM</label>
        <label class="radio-inline" style="margin-left: 50px;"><input type="radio" name="invType" value="SERVICE">SERVICE</label>
    </div>

    <div style="display: grid; margin:auto; width: 500px">

    
        <?php
        newLabel(1, 1, "Item ID:");
        newInput("text", "itemId", 2, 1, "ID", "70px");
        ?>
        <input type="text" id="itemId" name="itemId" class="shortInput" style="grid-column:2; grid-row:1; width:70px" 
        placeholder="ID" maxlength="6" minlength="6">
        <?php

        newLabel(1, 2, "Item Name:");
        newInput("text", "ItemName", 2, 2, "Item Name", "200px");

        newLabel(1, 3, "Coffee Type:");
        ?>
        <select id="coffeeType" name="coffeeType" class="shortInput" style="grid-column: 2; grid-row: 3;">
            <option></option>
            <option value="Robusta">Robusta</option>
            <option value="Arabica">Arabica</option>
            <option value="Roasted">Roasted</option>
            <option value="NONE">NONE</option>
        </select>
        <?php
        newLabel(1, 4, "Type Category:");
        ?>
        <select id="typeCategory" name="typeCategory" class="shortInput" style="grid-column: 2; grid-row: 4;">
            <option></option>
            <option value="Natural">Natural Robusta</option>
            <option value="Washed Robusta">Washed Robusta</option>
            <option value="Wugar">Wugar</option>
            <option value="Drugar">Drugar</option>
            <option value="Roasted Beans">Roasted Beans</option>
            <option value="Roast and Ground">Roast and Ground</option>
            <option value="NONE">NONE</option>
        </select>
        <?php
        newLabel(1, 5, "Grade Category:");
        ?>
        <select id="gradeCategory" name="gradeCategory" class="shortInput" style="grid-column: 2; grid-row: 5;">
            <option></option>
            <option value="HIGH">HIGH</option>
            <option value="LOW">LOW</option>
            <option value="UNPROCESSED">UNPROCESSED</option>
            <option value="OTHER LOSSES">OTHER LOSS</option>
            <option value="WASTES">WASTES</option>
            <option value="ROASTED">ROASTED</option>
            <option value="NONE">NONE</option>
        </select>
        <?php
        newLabel(1, 6, "Unit Symbol:");
        newInput("text", "unitSymbol", 2, 6, "Unit", "70px");

        newLabel(1, 7, "Grade Rank:");
        newInput("number", "gradeRank", 2, 7, "Rank", "70px");
        ?>










    </div>
    <?php include "../forms/submitButton.php" ?>
</form>
<script>
    document.onload = function(){document.getElementById("itemId").style.maxLength = "4";}
    
</script>
<?php include "../forms/footer.php" ?>
