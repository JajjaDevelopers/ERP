<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Received and Dispatched Graph</title>
  <link href="..\assets\css\bootsrap\css\bootstrap.css" rel="stylesheet">
  <script src="../assets/plotly/plotly-2.16.1.min.js"></script>
</head>
<body>
<section id="dashboard" class="container" style="background-color:green;">
<div class="row" style="background-color:red;">
  <div class="col-2">
    
  <table class="table table-bordered table-hover" id="tableReceived">
        <thead>
          <tr>
            <th scope="col" colspan="2" class="text-center">Coffee Received(Kg)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
  </div>

  <div class="col-2">    
    <table class="table table-bordered table-hover" id="tableMovedOut">
        <thead>
          <tr>
            <th scope="col" colspan="2" class="text-center">Coffee Moved Out(kg)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
    </table>
  </div>
  <div class="col-2">
    <table class="table table-bordered table-hover" id="monthlyVariance">
          <thead>
          <tr>
            <th scope="col" colspan="2" class="text-center">Monthly Variance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Received</td>
            <td>Moved Out</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
    </table>
  </div>
</div>

<div class="row" style="background-color:pink">
  <div class="col-6" id="coffeeInAndOut">
  </div>
</div>

<div class="row bg-warning">
<div class="col-2">
    
    <table class="table table-bordered table-hover" id="tableQReceived">
          <thead>
            <tr>
              <th scope="col" colspan="2" class="text-center">Coffee Received(Kg)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
    </div>
  
    <div class="col-2">    
      <table class="table table-bordered table-hover" id="tableQMovedOut">
          <thead>
            <tr>
              <th scope="col" colspan="2" class="text-center">Coffee Moved Out(kg)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </tbody>
      </table>
    </div>
    <div class="col-2">
      <table class="table table-bordered table-hover" id="quarterlyVariance">
            <thead>
            <tr>
              <th scope="col" colspan="2" class="text-center">Quarterly Variance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Received</td>
              <td>Moved Out</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
</section>
<script src="..\assets\css\bootsrap\js\bootstrap.min.js"></script>
<script>
  // var svg=document.getElementsByClassName("main-svg");
  // console.log(svg);
  //getting table elements for monthly coffee received
  // var headR=document.getElementById("tableReceived").getElementsByTagName("thead")[0];
  // var theadRrow=headR.getElementsByTagName("tr")[0];
  var bodyR=document.getElementById("tableReceived").getElementsByTagName("tbody")[0];
  var bodyRrow1=bodyR.getElementsByTagName("tr")[0];//first row
  var bodyRrow1Cell1=bodyRrow1.getElementsByTagName("td")[0];
  var bodyRrow1Cell2=bodyRrow1.getElementsByTagName("td")[1];
  var bodyRrow2=bodyR.getElementsByTagName("tr")[1];//second row
  var bodyRrow2Cell1=bodyRrow2.getElementsByTagName("td")[0];
  var bodyRrow2Cell2=bodyRrow2.getElementsByTagName("td")[1];
  // console.log(bodyRrow2Cell2);

  //getting table elements for monthly coffee moved out
  var bodyM=document.getElementById("tableMovedOut").getElementsByTagName("tbody")[0];
  var bodyMrow1=bodyM.getElementsByTagName("tr")[0];//first row
  var bodyMrow1Cell1=bodyMrow1.getElementsByTagName("td")[0];
  var bodyMrow1Cell2=bodyMrow1.getElementsByTagName("td")[1];
  var bodyMrow2=bodyM.getElementsByTagName("tr")[1];//second row
  var bodyMrow2Cell1=bodyMrow2.getElementsByTagName("td")[0];
  var bodyMrow2Cell2=bodyMrow2.getElementsByTagName("td")[1];
  
  //getting table elements for monthly variance
  var bodyV=document.getElementById("monthlyVariance").getElementsByTagName("tbody")[0];
  var bodyVrow2=bodyV.getElementsByTagName("tr")[1];//second row
  var bodyVrow2Cell1=bodyVrow2.getElementsByTagName("td")[0];
  var bodyVrow2Cell2=bodyVrow2.getElementsByTagName("td")[1];

  //getting table elements for quarterly coffee received
  var bodyQ=document.getElementById("tableQReceived").getElementsByTagName("tbody")[0];
  var bodyQrow1=bodyQ.getElementsByTagName("tr")[0];//first row
  var bodyQrow1Cell1=bodyQrow1.getElementsByTagName("td")[0];
  var bodyQrow1Cell2=bodyQrow1.getElementsByTagName("td")[1];
  var bodyQrow2=bodyQ.getElementsByTagName("tr")[1];//second row
  var bodyQrow2Cell1=bodyQrow2.getElementsByTagName("td")[0];
  var bodyQrow2Cell2=bodyQrow2.getElementsByTagName("td")[1];

  //getting table elements for quarterly coffee moved out
  var bodyQM=document.getElementById("tableQMovedOut").getElementsByTagName("tbody")[0];
  var bodyQMrow1=bodyQM.getElementsByTagName("tr")[0];//first row
  var bodyQMrow1Cell1=bodyQMrow1.getElementsByTagName("td")[0];
  var bodyQMrow1Cell2=bodyQMrow1.getElementsByTagName("td")[1];
  var bodyQMrow2=bodyQM.getElementsByTagName("tr")[1];//second row
  var bodyQMrow2Cell1=bodyQMrow2.getElementsByTagName("td")[0];
  var bodyQMrow2Cell2=bodyQMrow2.getElementsByTagName("td")[1];

  //getting table elemnts for quarterly variance
  var bodyQV=document.getElementById("quarterlyVariance").getElementsByTagName("tbody")[0];
  var bodyQVrow2=bodyQV.getElementsByTagName("tr")[1];//second row
  var bodyQVrow2Cell1=bodyQVrow2.getElementsByTagName("td")[0];
  var bodyQVrow2Cell2=bodyQVrow2.getElementsByTagName("td")[1];

  // function to handle coffee received vs coffee moved out graph
  function plotInAndOut()
  {
    var request= new XMLHttpRequest();
  request.open("GET","inAndOut.php");
  request.onload=function(){
    if(this.status ==200)
    {
      var ourData=JSON.parse(this.responseText);
      extractData(ourData);
    }

  }
  request.send();

  //function to extract json data
  function extractData(data)
  {
    var dateData=data[0];
    var receivedCoffee=data[1];
    var dispatchedCoffee=data[2];
    plotGraph(dateData,receivedCoffee,dispatchedCoffee);
  }

  //function to plot graph
  function plotGraph(data1,data2,data3)
  {
    // console.log(data1);
    // console.log(data2);
    // console.log(data3);
    var x1Data=data1;//dates
    var y1Data=data2;//coffeereceived
    var y2Data=data3;//coffeeout

    var trace1={
        x:x1Data,
        y:y1Data,
        type:"scatter",
        mode:"lines",
        line:{shape:"spline"},
        name:"Received"
    }
  
    var trace2=
      {
        x:x1Data,
        y:y2Data,
        type:"scatter",
        mode:"lines",
        line:{shape:"spline"},
        name:"Moved Out",
        // line:{
        //   color:'rgb(0,255,0)',
        //   width:3
        // }
      };
    
    var layout={
      title:"Weigh Bridge Coffee In and Out",
      xaxis: {
        tickangle: -45,
        type:"date",
        title:{text:'Date',standoff:20},
        showgrid:false,
        zeroline:false,
        showline:true,
        // mirror:'ticks',
        gridcolor:'#bdbdbd',
        gridwidth:1,
        zerolinecolor:'#969696',
        zerolinewidth:1,
        linecolor:'#636363',
        linewidth:1,
        showdividers:true
      },
      // width:500,
      height:300,
      yaxis:{
        title:"Daily Volume (MT)",
        // type: 'linear',
        showgrid:true,
        zeroline:true,
        showline:true,
        // mirror:'ticks',
        gridcolor:'#bdbdbd',
        gridwidth:1,
        zerolinecolor:'#969696',
        zerolinewidth:1,
        linecolor:'#636363',
        linewidth:1
      },
      showlegend:true,
      legend:{"orientation":"v"}

    };

    var dataPlot=[trace1,trace2];
    var config={responsive:true, displaylogo:false};
    Plotly.newPlot("coffeeInAndOut",dataPlot,layout,config);
  }
  
  }
  plotInAndOut();
 
  //picking monthly movement data;
  function monthlyMovementData()
  {
    var request2= new XMLHttpRequest();
    request2.open("GET","monthlyMovement.php");
    request2.onload=function(){
      if(this.status ==200)
      {
        var ourData=JSON.parse(this.responseText);
        for(i in ourData)
        {
          var months=ourData[0];
          var quantityReceived=ourData[1];
          var quantityMovedOut=ourData[2];
          var quantityVariance=ourData[3];
        }

        coffeeReceived(months,quantityReceived);
        coffeeMovedOut(months,quantityMovedOut);
        monthlyVariance(quantityVariance,quantityReceived,quantityMovedOut);
        console.log(ourData);
      }

    }
    request2.send();

    //function for coffee received
    function coffeeReceived(receivedMonths,receivedQuantity)
    {
  
      bodyRrow1Cell1.innerText=receivedMonths[0];
      bodyRrow1Cell2.innerText=receivedMonths[1];
      bodyRrow2Cell1.innerText=receivedQuantity[0];
      bodyRrow2Cell2.innerText=receivedQuantity[1];
    }

    //function for coffee moved out
    function coffeeMovedOut(movedOutMonths,movedOutQuantity)
    {
      bodyMrow1Cell1.innerText=movedOutMonths[0];
      bodyMrow1Cell2.innerText=movedOutMonths[1];
      bodyMrow2Cell1.innerText=movedOutQuantity[0];
      bodyMrow2Cell2.innerText=movedOutQuantity[1];
      // console.log(movedOutQuantity)
    }

    //function for variance
    function monthlyVariance(varianceQuantity,receivedQuantity,movedOutQuantity)
    {
      var receivedVariance=(((varianceQuantity[0]/receivedQuantity[1])*100)).toFixed(1);
      var movedOutVariance=((varianceQuantity[1]/movedOutQuantity[1])*100).toFixed(1);

      bodyVrow2Cell1.innerText=receivedVariance;
      bodyVrow2Cell2.innerText=movedOutVariance;
      console.log(receivedVariance);
    }

  }

  monthlyMovementData();

  //function to handle quarterly movement
  function quarterlyMovementData()
  {
     //picking quarterly movement data;
  var request3= new XMLHttpRequest();
  request3.open("GET","quarterlyMovement.php");
  request3.onload=function(){
    if(this.status ==200)
    {
      var ourData=JSON.parse(this.responseText);
      for(i in ourData)
        {
          var quarters=ourData[0];
          var quantityReceived=ourData[1];
          var quantityMovedOut=ourData[2];
          var quantityVariance=ourData[3];
        }

        coffeeReceived(quarters,quantityReceived);
        coffeeMovedOut(quarters,quantityMovedOut);
        quarterlyVariance(quantityVariance,quantityReceived,quantityMovedOut);
        console.log(ourData);
      
    }

  }
  request3.send();

  //function for quarterly coffee received
  function coffeeReceived(receivedQuarters,receivedQuantity)
    {
  
      bodyQrow1Cell1.innerText=receivedQuarters[0];
      bodyQrow1Cell2.innerText=receivedQuarters[1];
      bodyQrow2Cell1.innerText=receivedQuantity[0];
      bodyQrow2Cell2.innerText=receivedQuantity[1];
    }

    //function for coffee moved out
    function coffeeMovedOut(movedOutQuarters,movedOutQuantity)
    {
      bodyQMrow1Cell1.innerText=movedOutQuarters[0];
      bodyQMrow1Cell2.innerText=movedOutQuarters[1];
      bodyQMrow2Cell1.innerText=movedOutQuantity[0];
      bodyQMrow2Cell2.innerText=movedOutQuantity[1];
      // console.log(movedOutQuantity)
    }

    //function for variance
    function quarterlyVariance(varianceQuantity,receivedQuantity,movedOutQuantity)
    {
      var receivedVariance=(((varianceQuantity[0]/receivedQuantity[1])*100)).toFixed(1);
      var movedOutVariance=((varianceQuantity[1]/movedOutQuantity[1])*100).toFixed(1);

      bodyQVrow2Cell1.innerText=receivedVariance;
      bodyQVrow2Cell2.innerText=movedOutVariance;
      console.log(receivedVariance);
    }

  }

  quarterlyMovementData()
 
</script>
</body>
</html>
