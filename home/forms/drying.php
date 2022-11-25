<?php $pageTitle="Coffee Drying"; ?>
<?php include("header.php") ?>

<form class="regularForm" style="height: 700px ;">
   <h3 class="formHeading">DRYING FORM</h3>
   <?php
      include "../alerts/message.php";
    ?>
   
   <div id="container1" class="container1"  style="padding-left: 520px;"> 
    <label for="DateInput" style="margin-left: 28px;">Date:<input type="date" id="date" class="shortInput;"></label>
  <br><label for="McOut" style="margin-left: 20px;"> MC IN:<input class="shortInput"></label>
    <br><label for="McIn" style="margin-left: 10px;">MC OUT:<input class="shortInput"></label>

    <br>Reference:<input class="shortInput">
  </div>
 

  <?php
    include("../private/openCustomerPicker.php");
      GetCustomerList();
    include("../private/closeCustomerPicker.php")  
  ?>


   <h2>DESCRIPTIONS</h2>
  <table >
    <tr><th style="width: 250px;">DETAILS</th>
        <th style="width: 250px;">GRADE</th>
        <th style="width: 250px;">QUANTITY (Kgs)</th>
    </tr>
    <tr>
     <td>INPUT</td>
<td><input class="tableInput"></td>
<td><input class="tableInput"></td>
    </tr>
    <tr>
        <td>OUTPUT</td>
        <td><input class="tableInput"></td>
        <td><input class="tableInput"></td>
    </tr>
    <tr>
      <td>LOSS</td>
      <td><input class="tableInput"></td>
      <td><input class="tableInput"></td>
    </tr>
  </table>

<?php include ("../private/approvalDetails.php") ?>


</form>

<?php include("footer.php") ?>