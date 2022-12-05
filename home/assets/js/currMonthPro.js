var bodyMo=document.getElementById("currentMonth").getElementsByTagName("tbody")[0];
var bodyMorow1=bodyMo.getElementsByTagName("tr")[0];//first row
var bodyMorow1Cell1=bodyMorow1.getElementsByTagName("td")[0];

//hulled table elements
var bodyHul=document.getElementById("hulled").getElementsByTagName("tbody")[0];
var bodyHulrow1=bodyHul.getElementsByTagName("tr")[0];//first row
var bodyHulrow1Cell1=bodyHulrow1.getElementsByTagName("td")[0];

//color sorted table elements
var bodySort=document.getElementById("colorSorted").getElementsByTagName("tbody")[0];
var bodySortrow1=bodySort.getElementsByTagName("tr")[0];//first row
var bodySortrow1Cell1=bodySortrow1.getElementsByTagName("td")[0];

//dried table elements
var bodyDry=document.getElementById("dried").getElementsByTagName("tbody")[0];
var bodyDryrow1=bodyDry.getElementsByTagName("tr")[0];//first row
var bodyDryrow1Cell1=bodyDryrow1.getElementsByTagName("td")[0];

//graded table elements
var bodyGrad=document.getElementById("graded").getElementsByTagName("tbody")[0];
var bodyGradrow1=bodyGrad.getElementsByTagName("tr")[0];//first row
var bodyGradrow1Cell1=bodyGradrow1.getElementsByTagName("td")[0];
console.log(bodyGradrow1Cell1);

function currentMonthProcessing(){
  var request=new XMLHttpRequest()
  request.open("GET","currentMonthProcessing.php",true);
  request.onload=function(){
    if(this.status==200){
      var ourData=JSON.parse(this.responseText);
      var date=ourData[0];
      var graded=ourData[1];
      var colorSorted=ourData[2];
      var hulled=ourData[3];
      var dried=ourData[4];
      console.log(ourData);
      currentMonthProData(date,graded,colorSorted,hulled,dried)
    }
  }
  request.send();
  //function to publish data on the dashboard
  function currentMonthProData(data1,data2,data3,data4,data5)
  {
    bodyMo.innerHTML=data1;
    bodyGrad.innerHTML=data2;
    bodySort.innerHTML=data3;
    bodyHul.innerHTML=data4;
    bodyDry.innerHTML=data5;
  }

}

currentMonthProcessing();


