<?php include("header.php") ?>

<form class="regularForm">
   <h3 class="formHeading">DRYING FORM</h3>
   <?php
      include "../alerts/message.php";
    ?>
   <h2>CUSTOMER DETAILS: <input></h2>
   CUSTOMER ID: <INput>
   <div> Date:<input type="date">
    <br>MC IN:<input class="shortInput">
    <br>MC OUT:<input class="shortInput">
    <br>Reference:<input class="shortInput">
  </div container>
    <br>
   CUSTOMER NAME: <INput>
   <br>CUSTOMER CONTACT: <INput>
   <h2>DESCRIPTIONS</h2>
  <table>
    <tr><th>DETAILS</th>
        <th>GRADE</th>
        <th>QUANTITY</th>
    </tr>
    <tr>
     <td>INPUT</td>
<td><input></td>
<td><input></td>
    </tr>
    <tr>
        <td>OUTPUT</td>
        <td><input class="tableInput"></td>
        <td><input class="tableInput"></td>
    </tr>
    <tr>
      <td>LOSS</td>
      <td><input></td>
      <td><input></td>
    </tr>
  </table>
  <p>
    <div class="div1">Prepared by;</div>
    <div class="div2">Received by;</div>
    <div class="div3">Verified by;</div>
    <br>
    <div class="div1"><input></div>
    <div class="input2"><input></div>
    <div class="div6"><input></div>
</p>


</form>

<?php include("footer.php") ?>