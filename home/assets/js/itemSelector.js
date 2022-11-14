
function selectItem(selectId, noOfItems){
    var selectIdList = [];
    var nameIdList = [];
    
    

    for (var x=1; x<=noOfItems; x++){
        selectIdList.push('item'+x+'Select');
        nameIdList.push('item'+x+'Name');
        
        
        
    }
    var selected = document.getElementById(selectId).value;
    var index = selectIdList.indexOf(selectId);
    document.getElementById(nameIdList[index]).setAttribute("value", selected.substr(8))
}


function updateItemMc(noOfItems){
    var mcIdList = [];
    var nonEmptyList = [];
    var mc = 0;
    for (var x=1; x<=noOfItems; x++){
        mcIdList.push('item'+x+'Mc');
    }
    for (var m=0; m < noOfItems; m++){
        var mcValue = Number(document.getElementById(mcIdList[m]).value);
        if (mcValue > 0){
            mc += mcValue;
            nonEmptyList.push(mc);
        }
    }
    document.getElementById("avgMc").setAttribute("value", mc / nonEmptyList.length);
}


function updateItemBags(noOfItems){
    var bagsIdList = [];
    var nonEmptyList = [];
    var bags = 0;
    for (var x=1; x<=noOfItems; x++){
        bagsIdList.push('item'+x+'Bags');
    }
    for (var m=0; m < noOfItems; m++){
        var bagsValue = Number(document.getElementById(bagsIdList[m]).value);
        if (bagsValue > 0){
            bags += bagsValue;
            nonEmptyList.push(bags);
        }
    }
    document.getElementById("totalBags").setAttribute("value", bags);
}


function updateItemQty(noOfItems){
    var qtyIdList = [];
    var nonEmptyList = [];
    var totalQty = 0;
    for (var x=1; x<=noOfItems; x++){
        qtyIdList.push('item'+x+'Qty');
    }
    for (var m=0; m < noOfItems; m++){
        var qtyValue = Number(document.getElementById(qtyIdList[m]).value);
        if (qtyValue > 0){
            totalQty += qtyValue;
            nonEmptyList.push(totalQty);
        }
    }
    document.getElementById("totalQty").setAttribute("value", totalQty);
}