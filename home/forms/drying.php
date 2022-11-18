<?php $pageTitle="Coffee Drying"; ?>
<?php include("header.php") ?>

<form class="regularForm">
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
 <label for="customerId" style="margin-Left: 0%;">CUSTOMER ID:</label>
 <input type="customerId" id="customerId" class="shortInput"></label>
</div>
    <br>
    <label for="customerName" style="margin-Left: 7%;">NAME:</label><input type="customerName" id="customerName" class="shortInput">
   <br>
   <label for="customerContact" style="margin-Left: 4%;">CONTACT:</label>
   <input type="customerContact" id="customerContact" class="shortInput">
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
  <p>
    <div>
    Prepared by:
    <label for="ReceivedBy" style="margin-Left: 200px;">Received by:</label>
    <label for="VerifiedBy" style="margin-Left: 200px;">Verified by:</label>
    <br>
    <input class="shortinput">
    <label for="ReceivedByInput" style="margin-Left: 95px;"><input class="shortinput"></label>
    <label for="VerifiedByInput" style="margin-Left: 95px;"><input class="shortinput"></label>
  </div>
</p>


</form>

<?php include("footer.php") ?>