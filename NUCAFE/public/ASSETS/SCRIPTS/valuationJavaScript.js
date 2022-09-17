var yieldIds = ['highGrade1Yield', 'highGrade2Yield', 'highGrade3Yield', 'highGrade4Yield', 'lowGrade1Yield', 
                'lowGrade2Yield', 'lowGrade3Yield', 'lowGrade4Yield', 'lowGrade5Yield', 'lowGrade6Yield'];

var qtyIds = ['highGrade1Qty', 'highGrade2Qty', 'highGrade3Qty', 'highGrade4Qty', 'lowGrade1Qty', 
                'lowGrade2Qty', 'lowGrade3Qty', 'lowGrade4Qty', 'lowGrade5Qty', 'lowGrade6Qty'];

var priceUsIds = ['highGrade1PriceUs', 'highGrade2PriceUs', 'highGrade3PriceUs', 'highGrade4PriceUs', 'lowGrade1PriceUs', 
                'lowGrade2PriceUs', 'lowGrade3PriceUs', 'lowGrade4PriceUs', 'lowGrade5PriceUs', 'lowGrade6PriceUs'];

var priceCtsIds = ['highGrade1PriceCts', 'highGrade2PriceCts', 'highGrade3PriceCts', 'highGrade4PriceCts', 'lowGrade1PriceCts', 
                'lowGrade2PriceCts', 'lowGrade3PriceCts', 'lowGrade4PriceCts', 'lowGrade5PriceCts', 'lowGrade6PriceCts'];

var priceUgxIds = ['highGrade1PriceUgx', 'highGrade2PriceUgx', 'highGrade3PriceUgx', 'highGrade4PriceUgx', 'lowGrade1PriceUgx', 
                'lowGrade2PriceUgx', 'lowGrade3PriceUgx', 'lowGrade4PriceUgx', 'lowGrade5PriceUgx', 'lowGrade6PriceUgx'];

var amountUsIds = ['highGrade1AmountUs', 'highGrade2AmountUs', 'highGrade3AmountUs', 'highGrade4AmountUs', 'lowGrade1AmountUs', 
                'lowGrade2AmountUs', 'lowGrade3AmountUs', 'lowGrade4AmountUs', 'lowGrade5AmountUs', 'lowGrade6AmountUs'];

var amountUgxIds = ['highGrade1AmountUgx', 'highGrade2AmountUgx', 'highGrade3AmountUgx', 'highGrade4AmountUgx', 'lowGrade1AmountUgx', 
                'lowGrade2AmountUgx', 'lowGrade3AmountUgx', 'lowGrade4AmountUgx', 'lowGrade5AmountUgx', 'lowGrade6AmountUgx'];


var excRate = Number(document.getElementById('exchangeRate').value);


function getListTotal(listName, totalId){ 
    
    var grandTotal = 0;
    for (var i=0; i<listName.length; i++){
        var itemQty = Number(document.getElementById(listName[i]).value);
        grandTotal += itemQty;
    }
    document.getElementById(totalId).setAttribute('value', grandTotal);

    captureCosts();

    
}



function captureQty(){
    var faqQty = Number(document.getElementById('FAQQty').value);
    for (var x=0; x < qtyIds.length; x++){
        var qty = Number(document.getElementById(qtyIds[x]).value);
        var usRate = Number(document.getElementById(priceUsIds[x]).value);
        var ugxRate = Number(document.getElementById(priceUgxIds[x]).value);
        if (qty != 0){
            // Set yield, US amount and Ugx amount
            document.getElementById(yieldIds[x]).setAttribute('value', (qty/faqQty)*100);
            document.getElementById(amountUsIds[x]).setAttribute('value', (qty*usRate)); 
            document.getElementById(amountUgxIds[x]).setAttribute('value', (qty*ugxRate)); 

        }
    }
    getListTotal(yieldIds, 'totalYield');
    getListTotal(qtyIds, 'totalQty');
    getListTotal(amountUsIds, 'grandTotaltUs');
    getListTotal(amountUgxIds, 'grandTotaltUgx');
    
}


// Update values when ugx px is updated
function captureUgxPrice(){
    //var excRate = Number(document.getElementById('exchangeRate').value);
    for (var x=0; x < priceUgxIds.length; x++){
        var ugPx = Number(document.getElementById(priceUgxIds[x]).value);
        if (ugPx !=0){
            document.getElementById(priceUsIds[x]).setAttribute('value', (ugPx / excRate));
            var usdPx = Number(document.getElementById(priceUsIds[x]).value);
            document.getElementById(priceCtsIds[x]).setAttribute('value', usdPx*2.20462262185);
        }
        captureQty();
    }
    document.getElementById(priceUsIds[x]).addEventListener("blonchange", captureUsdPrice);
}


//Update values when Usd px is updated
function captureUsdPrice(){
    //var excRate = Number(document.getElementById('exchangeRate').value);
    for (var x=0; x < priceUsIds.length; x++){
        var usdPx = Number(document.getElementById(priceUsIds[x]).value);
        if (usdPx !=0){
            document.getElementById(priceCtsIds[x]).setAttribute('value', usdPx*2.20462262185);
            document.getElementById(priceUgxIds[x]).setAttribute('value', (usdPx * excRate));
        }
        captureQty();
    }
    document.getElementById(priceUgxIds[x]).addEventListener("blur", captureUgxPrice);
}

for (var x=0; x < qtyIds.length; x++){
    document.getElementById(qtyIds[x]).addEventListener("blur", captureQty);
    document.getElementById(priceUgxIds[x]).addEventListener("blur", captureUgxPrice);
    document.getElementById(priceUsIds[x]).addEventListener("blur", captureUsdPrice);
}


function captureCosts(){
    var ugxCosts = Number(document.getElementById('totalCostsUgx').value);
    document.getElementById('totalCostsUsd').setAttribute('value', ugxCosts/excRate);
    document.getElementById('subTotalCostsUsd').setAttribute('value', ugxCosts/excRate);
    document.getElementById('subTotalCostsUgx').setAttribute('value', ugxCosts);

    var grandTotaltValue = document.getElementById('grandTotaltUgx').value;
    var subTotalCosts = document.getElementById('subTotalCostsUgx').value;
    document.getElementById('totalValueUgx').setAttribute('value', grandTotaltValue - subTotalCosts);
    document.getElementById('totalValueUsd').setAttribute('value', (grandTotaltValue - subTotalCosts)/excRate);
}
document.getElementById('totalCostsUgx').addEventListener("blur", captureCosts);
// add radio button for pricing choice