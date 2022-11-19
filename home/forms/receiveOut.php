<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Received and Dispatched Graph</title>
  <script src="../assets/plotly/plotly-2.16.1.min.js"></script>
</head>
<body>-->
  <div id="coffeeInAndOut">
  </div>
<script>
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
    console.log(data)

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
        name:"Received"
    }
  
    var trace2=
      {
        x:x1Data,
        y:y2Data,
        type:"scatter",
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
        title:'Date',
        showgrid:true,
        zeroline:true,
        showline:true,
        mirror:'ticks',
        gridcolor:'#bdbdbd',
        gridwidth:2,
        zerolinecolor:'#969696',
        zerolinewidth:4,
        linecolor:'#636363',
        linewidth:6
      },
      // width:1000,
      // height:500,
      yaxis:{
        title:"Daily Volume (MT)",
        type: 'linear',
        showgrid:true,
        zeroline:true,
        showline:true,
        mirror:'ticks',
        gridcolor:'#bdbdbd',
        gridwidth:2,
        zerolinecolor:'#969696',
        zerolinewidth:4,
        linecolor:'#636363',
        linewidth:6
      },
      showlegend:true,
      legend:{"orientation":"v"}

    };

    var dataPlot=[trace1,trace2];
    var config={responsive:true};
    Plotly.newPlot("coffeeInAndOut",dataPlot,layout,config);
  }

  //picking monthly movement data;
  var request2= new XMLHttpRequest();
  request2.open("GET","monthlyMovement.php");
  request2.onload=function(){
    if(this.status ==200)
    {
      var ourData=JSON.parse(this.responseText);
      // extractData(ourData);
      console.log(ourData);
    }

  }
  request2.send();

   //picking quarterly movement data;
   var request3= new XMLHttpRequest();
  request3.open("GET","quarterlyMovement.php");
  request3.onload=function(){
    if(this.status ==200)
    {
      var ourData=JSON.parse(this.responseText);
      // extractData(ourData);
      console.log(ourData);
    }

  }
  request3.send();

</script>
<!-- </body>
</html> -->
