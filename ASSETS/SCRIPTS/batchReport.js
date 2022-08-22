
var highGradeBagsList = ["highGrade1Bags", "highGrade2Bags", "highGrade3Bags", "highGrade4Bags"];
var lowGradeBagsList = ["lowGrade1Bags", "lowGrade2Bags", "lowGrade3Bags", "lowGrade4Bags", "lowGrade5Bags"];
var rejectsBagsList = ["blacks18Bags",  "blacks17Bags", "blacks15Bags", "blacks12Bags"];
var wastesBagsList = ["stonesBags", "preCleanerBags", "husksBags"];
var otherLossBagsList = ["handlingLossBags", "dryingLossBags"];
let allBagsList = highGradeBagsList.concat(lowGradeBagsList, rejectsBagsList, wastesBagsList, otherLossBagsList);

var highGradeQtyList = ["highGrade1Qty", "highGrade2Qty", "highGrade3Qty", "highGrade4Qty"];
var lowGradeQtyList = ["lowGrade1Qty", "lowGrade2Qty", "lowGrade3Qty", "lowGrade4Qty", "lowGrade5Qty"];
var rejectsQtyList = ["blacks18Qty",  "blacks17Qty", "blacks15Qty", "blacks12Qty"];
var wastesQtyList = ["stonesQty", "preCleanerQty", "husksQty"];
var otherLossQtyList = ["handlingLossQty", "dryingLossQty"];
let allQtyList = highGradeQtyList.concat(lowGradeQtyList, rejectsQtyList, wastesQtyList, otherLossQtyList);

var highGradePerList = ["highGrade1Per", "highGrade2Per", "highGrade3Per", "highGrade4Per"];
var lowGradePerList = ["lowGrade1Per", "lowGrade2Per", "lowGrade3Per", "lowGrade4Per", "lowGrade5Per"];
var rejectsPerList = ["blacks18Per",  "blacks17Per", "blacks15Per", "blacks12Per"];
var wastesPerList = ["stonesPer", "preCleanerPer", "husksPer"];
var otherLossPerList = ["handlingLossPer", "dryingLossPer"];
let allPerList = highGradePerList.concat(lowGradePerList, rejectsPerList, wastesPerList, otherLossPerList);

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
