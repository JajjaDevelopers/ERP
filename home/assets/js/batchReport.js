var highGradeBagsList = []; 
var lowGradeBagsList = []; 
var rejectsBagsList = []; 
var wastesBagsList = []; 
var otherLossBagsList = []; 
var gradeBagsList = [highGradeBagsList, lowGradeBagsList, rejectsBagsList, wastesBagsList, otherLossBagsList];
let allBagsList = highGradeBagsList.concat(lowGradeBagsList, rejectsBagsList, wastesBagsList, otherLossBagsList);

var highGradeQtyList = []; 
var lowGradeQtyList = []; 
var rejectsQtyList = []; 
var wastesQtyList = []; 
var otherLossQtyList = []; 
var gradesQtyList = [highGradeQtyList, lowGradeQtyList, rejectsQtyList, wastesQtyList, otherLossQtyList];
let allQtyList = highGradeQtyList.concat(lowGradeQtyList, rejectsQtyList, wastesQtyList, otherLossQtyList);

var highGradePerList = []; 
var lowGradePerList =  []; 
var rejectsPerList = []; 
var wastesPerList = []; 
var otherLossPerList = []; 
var gradePerList = [highGradePerList, lowGradePerList, rejectsPerList, wastesPerList, otherLossPerList];
let allPerList = highGradePerList.concat(lowGradePerList, rejectsPerList, wastesPerList, otherLossPerList);


// Get Grade grade category length
var highGradeNumbers = document.getElementById("highNumber").value;
var lowGradeNumbers = document.getElementById("lowNumbers").value;
var blacksGradeNumbers = document.getElementById("blacksNumbers").value;
var wastesGradeNumbers = document.getElementById("wastesNumbers").value;
var lossesGradeNumbers = document.getElementById("lossesNumbers").value;
var gradeNumbersList = [highGradeNumbers, lowGradeNumbers, blacksGradeNumbers, wastesGradeNumbers, lossesGradeNumbers];

var idPrefix = ["high", "low", "blacks", "wastes", "losses"];

for (var x=0; x<gradeNumbersList.length; x++){
    for (var i=1; i<=gradeNumbersList[x]; i++){
        gradePerList[x].push(idPrefix[0]+"Grade"+i+"Per");
        gradesQtyList[x].push(idPrefix[0]+"Grade"+i+"Qty");
        gradeBagsList[x].push(idPrefix[0]+"Grade"+i+"Bags");
    }
}

function getBatchReturns(no){
        
    const xhttp = new XMLHttpRequest();
    // Changing customer namne
    xhttp.onload = function() {
        document.getElementById("batchReturnsAjax").innerHTML = this.responseText;

        var receivedJson = document.getElementById("allIdsJson").innerHTML;
        var gradeLists = JSON.parse(receivedJson);
        document.getElementById("checkDiv").innerHTML = gradeLists[0][0];
    }
    xhttp.open("GET", "../ajax/batchReportReturnsAjax.php?q="+no);
    xhttp.send();
}

function updateBagsAndPer(){
    var inputQty = Number(document.getElementById("inputQty").value);
    var addSpill = Number(document.getElementById("addSpillQty").value);
    var lessSpill = Number(document.getElementById("lessSpillQty").value);
    document.getElementById("netInputQty").setAttribute('value', (inputQty + addSpill - lessSpill));
    var netInput = document.getElementById("netInputQty").value;

    var overallQty = 0;
    for (var i=0; i < allQtyList.length; i++){
        var qty = Number(document.getElementById(allQtyList[i]).value);
        var bags = qty/60;
        var percent = (qty/netInput)*100;
        document.getElementById(allBagsList[i]).setAttribute('value', bags);
        document.getElementById(allPerList[i]).setAttribute('value', percent);
        overallQty += Number(qty)
    }

    function setTotals(subTotalId, itemsList, totalBagsId, totalPerId){
        var subTotalIdVar = document.getElementById(subTotalId);
        var totalHighGradeKgs = [];
        var highGradeTotalKgs = 0;
        for (var i=0; i < itemsList.length; i++){
            var highGradeQty = document.getElementById(itemsList[i]).value;
            totalHighGradeKgs.push(highGradeQty);
            highGradeTotalKgs = highGradeTotalKgs + Number(highGradeQty);
        }
        subTotalIdVar.setAttribute('value', highGradeTotalKgs);
        document.getElementById(totalBagsId).setAttribute('value', highGradeTotalKgs / 60);
        document.getElementById(totalPerId).setAttribute('value', (highGradeTotalKgs / netInput)*100);
    }
    setTotals("highGradeSubtotalQty", highGradeQtyList, "highGradeSubtotalBags", "highGradeSubtotalPer");
    setTotals("lowGradeSubtotalQty", lowGradeQtyList, "lowGradeSubtotalBags", "lowGradeSubtotalPer");
    setTotals("rejectsSubtotalQty", rejectsQtyList, "rejectsSubtotalBags", "rejectsSubtotalPer");
    setTotals("wastesSubtotalQty", wastesQtyList, "wastesSubtotalBags", "wastesSubtotalPer");
    setTotals("otherLossSubtotalQty", otherLossQtyList, "otherLossSubtotalBags", "otherLossSubtotalPer");

    document.getElementById("overallTotalQty").setAttribute('value', overallQty);
    document.getElementById("overallTotalBags").setAttribute('value', (overallQty / 60));
    document.getElementById("overallTotalPer").setAttribute('value', (overallQty / netInput)*100);
}

for (i=0; i < allQtyList.length; i++){
    document.getElementById(allQtyList[i]).addEventListener("blur", updateBagsAndPer);
}

document.getElementById("inputQty").addEventListener("blur", updateBagsAndPer);
document.getElementById("addSpillQty").addEventListener("blur", updateBagsAndPer);
document.getElementById("lessSpillQty").addEventListener("blur", updateBagsAndPer);

