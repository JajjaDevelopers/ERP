
function selectItem(selectId, noOfItems){
    var selectIdList = [];
    var nameIdList = [];
    var mcIdList = [];
    var bagsIdList = [];
    var qtyIdList = [];

    for (var x=1; x<=noOfItems; x++){
        selectIdList.push('item'+x+'Select');
        nameIdList.push('item'+x+'Name');
        mcIdList.push('item'+x+'Mc');
        bagsIdList.push('item'+x+'Bags');
        qtyIdList.push('item'+x+'Qty');
    }
    var selected = document.getElementById(selectId).value;
    var index = selectIdList.indexOf(selectId);
    document.getElementById(nameIdList[index]).setAttribute("value", selected.substr(8))
}