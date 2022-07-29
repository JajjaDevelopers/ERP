
let activityQuantityIds = ["roastingQty", "grindingQty","sortingQty", "packaging250Qty", "packaging500Qty", "packaging1KgQty", "packagingOtherQty"]
let activityRateIds = ["roastingRate", "grindingRate", "sortingRate", "packaging250Rate", "packaging500Rate", "packaging1KgRate", "packagingOtherRate"]
let activityAmountIds = ["roastingAmount", "grindingAmount", "sortingAmount", "packaging250Amount", "packaging500Amount", "packaging1KgAmount", "packagingOtherAmount"]
let responseEntries = activityQuantityIds.concat(activityRateIds);

function computeTotal(){
    for (i in deliveryQuantityIds){
        var qty = document.getElementById(i);
        var rate = document.getElementById(deliveryRateIds[i]);
        document.getElementById(deliveryAmountIds[i]) = qty * rate;
    }
    return amount;
}

function computeAmount(){
    var grandTotal = document.getElementById('totalAmount')
    var activitiesTotal = []
    for (var i=0; i < activityQuantityIds.length; i++) {
        var itemAmount = document.forms['activitySheetForm'][activityAmountIds[i]];
        y = document.getElementById(activityQuantityIds[i]).value;
        p = document.getElementById(activityRateIds[i]).value;
        k = y*p;
        
        itemAmount.setAttribute('value', k);
        activitiesTotal.push(k);
    }
    var sum = 0;
    for (const value of activitiesTotal){
        sum += value;
    }
    grandTotal.setAttribute('value', sum);
}

for (var i=0; i < responseEntries.length; i++){
    document.getElementById(responseEntries[i]).addEventListener("blur", computeAmount);
}

/*
function insertValuationItems(highGradesList, lowGradesList){
    let fullItemList = highGradesList.concat(lowGradesList);
    for (var i=0; i < fullItemList.length; i++) {
        var tableRow = document.createElement("tr");
        var itemNameCell = document.createElement("td");
        var itemNameText = document.createTextNode(fullItemList[i]);
        itemNameCell.appendChild(itemNameText);
        tableRow.appendChild(itemNameCell);
        for (var d = 0; d < 7; d++){
            var tableData = document.createElement("td");
            tableRow.appendChild(tableData);
        }
        var selectedTable = document.getElementById("valuationsTable");
        selectedTable.appendChild(tableRow);
    }
}
insertValuationItems(activityQuantityIds, activityRateIds);
*/
