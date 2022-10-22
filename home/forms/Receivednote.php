<?php
  session_start();

  error_reporting(1);
  if(isset($_SESSION["userName"]))
  {
    ?>
      <?php include_once('header.php'); ?>
      <div class="container">
        <form action="received.php" class="regularForm" method="POST">
          <legend class="formHeading">Goods Received Note</legend>
          <div class="row mb-3">
            <div class="col-6 ms-auto">
              <label for="date" class="form-label ">Date:</label>
                <input type="text" class="form-control form-control-sm" id="date" placeholder="MM/DD/YYYY" 
                name="daterecorded" value="">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-3 ms-auto">
              <label for="timeIn" class="form-label">Time In:</label>
              <input type="time" class="form-control form-control-sm" id="timeIn" name="timein" 
              value="">
            </div>
            <div class="col-3">
              <label for="timeOut" class="form-label">Time Out:</label>
              <input type="time" class="form-control form-control-sm" id="timeOut" name="timeout" 
              value="">
          </div>
          </div>

          <div class="row mb-3">
            <div class="col-6 ">
              <label for="customer" class="form-label">Customer:</label>
              <input type="text" class="form-control form-control-sm" id="customer" placeholder="customer name"
              name="customername" value="">
            </div>
            
            <div class="col-3">
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Coffee Type:</legend>
                  <div class="form-check">
                    <input class="form-check-input coffee" type="radio" name="coffeetype" id="ar" value="Arabica">
                    <label class="form-check-label" for="gridRadios1">
                      Arabica
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input coffee" type="radio" name="coffeetype" id="rob" value="Robusta">
                    <label class="form-check-label" for="gridRadios2">
                      Robusta
                    </label>
                  </div>
                </fieldset>
            </div>
            <div class="col-3">
                <label class="form-check-label" for="Coffee">Grade:</label>
                <select class="form-select form-select-sm" id="select" name="coffeegrades">
                  <option selected>Choose...</option>
                </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6 ">
              <label for="address" class="form-label">Address:</label>
              <input type="text" class="form-control form-control-sm" id="address" placeholder=" customer address"
              name="customeraddress" value="">
            </div>
            <div class="col-3 ">
              <label for="weight" class="form-label">Weight:</label>
              <input type="number" class="form-control form-control-sm" id="grdweight" placeholder="kgs"
              name="gradeweight" value="">
            </div>
            <div class="col-3 ">
              <label for="bags" class="form-label">Bags:</label>
              <input type="number" class="form-control form-control-sm" id="bags" name="bags" value="">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6 ">
              <label for="contactperson" class="form-label">Contact Person:</label>
              <input type="text" class="form-control form-control-sm" id="contactperson" placeholder="contact name"
              name="contactname" value="">
            </div>
            <div class="col-6 ">
              <label for="mc" class="form-label">MC:</label>
              <input type="number" class="form-control form-control-sm" id="mc" placeholder="%"
              name="mc" value="">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6 ">
              <label for="trucknumber" class="form-label">Truck Number:</label>
              <input type="text" class="form-control form-control-sm" id="trucknumber" placeholder="number"
              name="trucknumber" value="">
            </div>
            <div class="col-6 ">
              <label for="driver" class="form-label">Driver:</label>
              <input type="text" class="form-control form-control-sm" id="driver" placeholder="driver name"
              name="drivername" value="">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6 ">
              <label for="received" class="form-label">Received by:</label>
              <input type="text" class="form-control form-control-sm" id="received" placeholder="recepient name"
              name="received" value="">
            </div>
            <div class="col-6 ">
              <label for="approval" class="form-label">Approved by:</label>
              <input type="text" class="form-control form-control-sm" id="approval" placeholder="name of person"
              name="approval" value="">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6 ms-auto">
              <label for="customer" class="form-label">Quality Remarks:</label>
              <textarea class="form-control" id="remarks" placeholder="quality remarks" rows="3"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <div class="d-grid gap-2 col-4 mx-auto">
                <button type="submit" class="btn btn-primary btn-lg">Record</button>
              </div>
            </div>
          </div>
      </form>
      </div>
      <?php include_once('footer.php'); ?>

    <?php
  }else
  {
    include "redirect.php";
  }
?>
