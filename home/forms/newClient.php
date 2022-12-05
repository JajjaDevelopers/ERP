<?php
$pageTitle = "New Client";
include_once ('header.php');
?>
<body>
    <form class="regularForm" method="POST" action="addNewCustomer.php">
        <h3 class="formHeading" >New Client</h3>
        <div style="display: grid; width: 400px">
            <div style="grid-column: 1; grid-row: 1; margin-right: 10px">
                <label for="customerName">Customer ID</label><br>
                <input type="text" id="customerId" name="customerId" class="shortInput" readonly maxlength="6"><br>
            </div>
            <div style="grid-column: 2; grid-row: 1; margin-left: 10px">
                <label for="customerName">Customer Name:</label><br>
                <input type="text" id="customerName" name="customerName" class="shortInput" maxlength="200" style="width: 400px;"><br>
            </div>
        </div>
        <div style="display: grid; width: 400px">
            <div style="grid-column: 1; grid-row: 1">
                <label for="contactPerson">Contact Person</label><br>
                <input type="text" id="contactPerson" name="contactPerson" class="longInputField"><br>
                <label for="telephone">Contact Telephone</label><br>
                <input type="number" id="telephone" name="telephone" class="longInputField"><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" class="longInputField"><br>
                <label for="region">Region</label><br>
                <select type="text" id="region" name="region" class="longInputField">
                    <option>Region</option>
                    <option value="EAST">EAST</option>
                    <option value="CENTRAL">CENTRAL</option>
                    <option value="NORTH">NORTH</option>
                    <option value="WEST">WEST</option>
                </select><br>
                <label for="district">District</label><br>
                <select type="text" id="district" name="district" class="longInputField">

                </select><br>
            </div>
            <div style="grid-column: 2; grid-row: 1; margin-left: 250px">
                <label for="category">Category</label><br>
                <select type="text" id="category" name="category" class="longInputField">
                    <option value="INDIVIDUAL">INDIVIDUAL</option>
                    <option value="ASSOCIATION">ASSOCIATION</option>
                    <option value="COOPERATIVE">COOPERATIVE</option>
                    <option value="COMPANY">COMPANY</option>
                </select><br>
                <label for="membership">Membership</label><br>
                <select type="text" id="membership" name="membership" class="longInputField">
                    <option value="1">Nucafe Member</option>
                    <option value="0">Third Party</option>
                </select><br>
            </div>
            
        </div>
        
        
        <?php include "submitButton.php" ?>
    </form>
<?php include_once ('footer.php'); ?>
