<legend class="formHeading">Goods Received Note</legend>
<?php
    
    include "../alerts/message.php";
?>
<div style="display: grid; width:fit-content; margin-left: 70%;">
    <input name="grnKeyId" readonly value="<?= $grn_no?>" style="display: none;" >
    <label for="grnNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">GRN No:</label>
    <input type="text" class="shortInput" id="grnNo" name="grnNo" readonly value="<?= $grnNo ?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
    <label for="date" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
    <input type="date" class="shortInput" id="grnDate" name="grnDate" value="<?= $grn_date ?>" style="grid-column: 2; grid-row: 2">
    <label for="timeIn" class="" style="grid-column: 1; grid-row: 3; margin-top: 10px">Time In:</label>
    <input type="time" class="shortInput" id="timeIn" name="timein"  value="<?= $grn_time_in ?>" style="grid-column: 2; grid-row: 3">
</div>

<?php 
require("../forms/customerSelector.php"); ?>
<br>
<div style="display: grid; width:fit-content ">
<div style="grid-column: 1; grid-row:1;">
    <label >Coffee Details</label>
    <div>
    <label for="type">Type</label>
    <input class="shortInput" value="<?=$coffee_type?>" id="typeName">
    <select class="shortInput" name="coffeetype" id="type" onchange="getGrades(this.value)">
        <option></option>
        <option value="Robusta">Robusta</option>
        <option value="Arabica">Arabica</option>
    </select>    <br>
    <label>Grade:</label>
    <input id="gradeName" value="<?=$grade_name?>" class="shortInput" style="width: 250px;">
    <select id="gradeId" name="coffeegrades" class="shortInput" style="width: 250px;">

    </select><br>
    <label for="weight" class="form-label">Weight:</label>
    <input type="number" id="weight"  class="shortInput" id="grdweight" placeholder="kgs" name="gradeweight"  value="<?=$grn_qty?>">
    <label for="bags" class="form-label" style="margin-left: 50px;">Bags:</label>
    <input type="number" class="shortInput" id="bags" placeholder="bags" name="bags"  value="<?=$no_of_bags?>" style="margin-top: 0px; width: 60px">
    </div>
</div>
<div style="grid-column: 2; grid-row:1; margin: 20px 0px 0px 150px">
    <label for="mc" class="form-label" style="margin: 0px 0px 0px 0px;">Average Moisture:</label>
    <input type="number" class="shortInput" id="mc" placeholder="%" name="mc"  value="<?=$grn_mc?>" style="margin-top: 0px; width: 70px"><br>
    <label for="purpose" class="">Purpose:</label><br>
    <input class="longInputField" id="purposeName" value="<?=$purpose?>" style="margin-left: 0px; width:280px">
    <select class="longInputField" id="purpose" placeholder="purpose" name="purpose" style="margin-left: 0px; width:280px">
        <option value="Processing">Processing</option>
        <option value="Roasting">Roastery Services</option>
        <option value="Storage">Storage</option>
    </select>    
</div>
</div>
<div style="display: grid; margin-top:30px">
<div class="">
    <label for="origin" class="form-label">Origin:</label>
    <input type="text" class="longInputField" id="origin" placeholder="district" name="origin" value="<?=$origin?>" style="width: 150px;">
    <label for="deliveryPerson" class="" style="margin-left: 210px;">Delivery Person:</label>
    <input type="text" class="longInputField" id="deliveryPerson" placeholder="delivery person" name="deliveryPerson" value="<?=$delivery_person?>"><br>
    <label for="trucknumber" class="">Truck Number:</label>
    <input type="text" class="shortInput" id="truckNumber" placeholder="number" name="truckNumber"  value="<?=$truck_no?>" style="width: 110px;">
    <label for="driver" class="" style="margin-left: 210px;">Driver:</label>
    <input type="text" class="longInputField" id="driverName" placeholder="driver name"  name="driverName" value="<?=$driver?>" style="margin-left: 10px; width:200px">
</div>
</div>


<div style="margin-top: 20px;">
    <label for="customer" class="form-label">Quality Remarks:</label>
    <input class="form-control" id="remarks" name="remarks" value="<?=$quality_remarks?>" placeholder="quality remarks" rows="3">
</div>
<div id="usersDiv" class="container">
  <div class="row">
    <div id="preparedBy" class="col-sm-12">
      <?= "Prepared By: ".$prepared_by." (Date and Time)" ?><br><br>
      <?= "Verified By: ".$verified_by." (Date and Time)" ?><br><br>
      <?= "Approved By: ".$approved_by." (Date and Time)" ?>
    </div>
  </div>
</div>


<!-- changed lines -->
<!-- <legend class="formHeading">Goods Received Note</legend>
      <?php
            include "../alerts/message.php";
      ?>
      <div style="display: grid; width:fit-content; margin-left: 70%;">
          <label for="grnNo" style="grid-column: 1; grid-row: 1; width:70px; margin-top: 5px">GRN No:</label>
          <input type="text" class="shortInput" id="grnNo" name="grnNo" value="<?php  ?>" style="grid-column: 2; grid-row: 1; margin-top: 0px;">
          <label for="date" class="" style="grid-column: 1; grid-row: 2; margin-top: 10px">Date:</label>
          <input type="date" class="shortInput" id="grnDate" placeholder="MM/DD/YYYY" name="grnDate" value="" style="grid-column: 2; grid-row: 2">
          <label for="timeIn" class="" style="grid-column: 1; grid-row: 3; margin-top: 10px">Time In:</label>
          <input type="time" class="shortInput" id="timeIn" name="timein" value="" style="grid-column: 2; grid-row: 3">
      </div>
     
      <?php 
    //   require("customerSelector.php"); ?>
      <br>
      <div style="display: grid; width:fit-content ">
        <div style="grid-column: 1; grid-row:1;">
          <label >Coffee Details</label>
          <div>
            <label for="type">Type</label>
            <select class="shortInput" name="coffeetype" id="type" onchange="getGrades(this.value)">
              <option></option>
              <option value="Robusta">Robusta</option>
              <option value="Arabica">Arabica</option>
            </select>
            <br>
            <label>Grade:</label>
            <select id="gradeId" name="coffeegrades" class="shortInput" style="width: 250px;">

            </select>
            <br>
            <label for="weight" class="form-label">Weight:</label>
            <input type="number" id="weight"  class="shortInput" id="grdweight" placeholder="kgs" name="gradeweight" value="">
            <label for="bags" class="form-label" style="margin-left: 50px;">Bags:</label>
            <input type="number" class="shortInput" id="bags" placeholder="bags" name="bags" value="" style="margin-top: 0px; width: 60px">
          </div>
        </div>
        <div style="grid-column: 2; grid-row:1; margin: 20px 0px 0px 150px">
          <label for="mc" class="form-label" style="margin: 0px 0px 0px 0px;">Average Moisture:</label>
          <input type="number" class="shortInput" id="mc" placeholder="%" name="mc" value="" style="margin-top: 0px; width: 70px"><br>
          <label for="purpose" class="">Purpose:</label><br>
          <select class="longInputField" id="purpose" placeholder="purpose" name="purpose" style="margin-left: 0px; width:280px">
            <option value="Processing">Processing</option>
            <option value="Roasting">Roastery Services</option>
            <option value="Storage">Storage</option>
          </select>
        </div>
      </div>
      <div style="display: grid; margin-top:30px">
        <div class="">
          <label for="origin" class="form-label">Origin:</label>
          <input type="text" class="longInputField" id="origin" placeholder="district" name="origin" value="" style="width: 150px;">
          <label for="deliveryPerson" class="" style="margin-left: 210px;">Delivery Person:</label>
          <input type="text" class="longInputField" id="deliveryPerson" placeholder="delivery person" name="deliveryPerson" value=""><br>
          <label for="trucknumber" class="">Truck Number:</label>
          <input type="text" class="shortInput" id="truckNumber" placeholder="number" name="truckNumber" value="" style="width: 110px;">
          <label for="driver" class="" style="margin-left: 210px;">Driver:</label>
          <input type="text" class="longInputField" id="driverName" placeholder="driver name" name="driverName" value="" style="margin-left: 10px; width:200px">
        </div>
      </div>


      <div style="margin-top: 20px;">
          <label for="customer" class="form-label">Quality Remarks:</label>
          <textarea class="form-control" id="remarks" name="remarks" placeholder="quality remarks" rows="3"></textarea>
      </div> -->
