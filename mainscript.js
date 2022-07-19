
const coffeeGrade = {
    arabica_grades: ["Arabica A", "Arabica AA", "Arabica AAA", "Arabica B", "Arabica AB", "Arabica CPB", "Triage", "Black Beans"],
    robusta_grades: ["Screen 1800", "Screen 1700", "Screen 1500", "Screen 1200", "Black Beans", "BHP", "1899"]
}

const option = document.getElementById("select");
const checkedOption = document.querySelectorAll(".coffee");
let choice;
checkedOption.forEach(checked => {
    checked.addEventListener("click", (event) => {
        choice = event.target.id;
        let selection = "<option>" + "" + "</option>";

        if (choice === "ar") {
            for (let i = 0; i < coffeeGrade.arabica_grades.length; i++) {
                selection += "<option>" + coffeeGrade.arabica_grades[i] + "</option>"
            }
            option.innerHTML = selection;
        } else {
            for (let i = 0; i < coffeeGrade.robusta_grades.length; i++) {
                selection += "<option>" + coffeeGrade.robusta_grades[i] + "</option>"
            }
            option.innerHTML = selection;
        }
    })
})

activityQuantityIds = ["roastingQty", "grindingQty","sortingQty", "packaging250Qty", "packaging500Qty", "packaging1KgQty", "packagingOtherQty"]
activityRateIds = ["roastingRate", "grindingRate", "sortingRate", "packaging250Rate", "packaging500Rate", "packaging1KgRate", "packagingOtherRate"]
activityAmountIds = ["roastingAmount", "grindingAmount", "sortingAmount", "packaging250Amount", "packaging500Amount", "packaging1KgAmount", "packagingOtherAmount"]
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
