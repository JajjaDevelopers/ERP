<?php require "../forms/header.php" ?>
<?php ?>
<form class="regularForm" style="height: fit-content;">
    <h3 class="formHeading">Stock Balances</h3>
    <div id="criteriaSelection" class="container">
        <div class="row">
            <div class="col-md-2">
                <label for="type">Coffee Type:</label><br>
                <select id="type" name="type" class="shortInput"
                onchange="filterOptions('category',this.value, 'typeCat')">
                    <option value="all">All</option>
                    <option value="Arabica">Arabica</option>
                    <option value="Robusta">Robusta</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="category">Type Category:</label><br>
                <select id="category" name="category" class="shortInput" style="width: 150px;"
                onchange="filterOptions('grade',this.value, 'grades')">
                    <option value="all">All</option>
                    
                </select>
            </div>
            <div class="col-md-4">
                <label for="grade">Grade:</label><br>
                <select id="grade" name="grade" class="shortInput" style="width: 250px;">
                    <option value="all">All</option>
                   
                </select>
            </div>
            <div class="col-md-3">
                <label for="date">As at:</label><br>
                <input type="date" id="date" name="date" class="shortInput" style="width: 150px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><br>
                <?php submitButton("Submit", "button");?>
            </div>
        </div>
    </div>
    <div id="stockBalanceReturns" class="container">

    </div>



</form>

<?php require "../forms/footer.php" ?>
<script>
    document.getElementById("verifyBtn").addEventListener("click", getStockBalance);
    function getStockBalance(){
        var coffType = document.getElementById("type").value;
        var typCategory = document.getElementById("category").value;
        var coffGrade = document.getElementById("grade").value;
        var atDate = document.getElementById("date").value;


        const xhttp = new XMLHttpRequest();
        // Updating grades based on coffee type
        xhttp.onload = function() {
          document.getElementById("stockBalanceReturns").innerHTML = this.responseText;
      }
      xhttp.open("GET", "../ajax/stockBalance.php?type="+coffType+"&category="+typCategory+"&grade="+
                coffGrade+"&date="+atDate);
      xhttp.send();
    }

    // Applied filters
    function filterOptions(selectId, selectValue, filterFunc){
        document.getElementById("grade").innerHTML = '<option value="all">All</option>';
        const xhttp = new XMLHttpRequest();
        // Updating grades based on filters
        xhttp.onreadystatechange  = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById(selectId).innerHTML = this.responseText;
            }
        }
        xhttp.open("GET", "../ajax/itemFilters.php?filter="+filterFunc+"&key="+selectValue);
        xhttp.send();
    }   
</script>