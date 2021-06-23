<!DOCTYPE html>
<html>
<head>
<title>Lineage Explorer</title>
<link rel="shortcut icon" href="/assets/favicon.ico">
  <link rel="stylesheet" href="assets/dcode.css">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
</head>


<style>

    * {
  font-family: sans-serif;
    }

    /*----------------------- Styling for the boxes of KPIs------------------*/
.box-container{
min-height: 40vh;
display: flex;
align-items:center;
justify-content: center;
flex-wrap: wrap;
padding-bottom: 10px;
}
.box-container .box{
height: 170px;
width: 200px;
margin: 20px 10px;
border-radius: 10px;
box-shadow: 0 3px 5px rgba(0,0,0,0.3);
text-align: center;
overflow: hidden;
position: relative;
z-index: 1;
}
.box-container .box::before, .box-container .box::after
{
content: '';
position:absolute;
height:50px;
width: 100px;
border radius: 50%;
opacity: .5;
}

.box-container .box::after{
background: #74b9ff;
bottom:-10%; right:80%;
}
.box-container .box .title{
margin:30px 0;
font-size: 22px;
color: #74b9ff;
}
.box-container .box .types{
height:70px;
width:80px;
color:#fff;
background:#74b9ff;
padding:7px 0 0;
margin:0 auto 25px;
border-radius: 50%;
}

.box-container .box .types .tests{
font-size: 48px;
line-height: 70px;
font-weight: 700;
}
.box-container .green .title{
color: #85c436;
}
.box-container .green .types{
background-color: #85c436;
}
.box-container .green::after{
background-color: #78BE20;
}
.box-container .red .title{
color: #ff4c4c;
}
.box-container .red .types{
background-color: #ff4c4c;
}
.box-container .red::after{
background-color: #ff4c4c;
}


.box-container .green .title{
color: #85c436;
}
.box-container .green .types{
background-color: #85c436;
}
.box-container .green::after{
background-color: #78BE20;
}

.box-container .red .title{
color: #ff4c4c;
}
.box-container .red .types{
background-color: #ff4c4c;
}
.box-container .red::after{
background-color: #ff4c4c;
}
   
  .headingDiv{
   margin: 0px 100px;
  }
</style>

<body>


     
<div class="headingDiv">
<h1 align="center"><span style="color: #005691">Lineage Explorer</span></h1>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~Coding for test count container~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="box-container">

<div class="box">
  <h3 class="title">Total Reports</h3>
  <div class="types">
    <span class="tests">8</span>
  </div>
</div>

<div class="box green">
  <h3 class="title">Used Reports</h3>
  <div class="types">
    <span class="tests">4</span>
  </div>
</div>

<div class="box red">
  <h3 class="title">Unused Reports</h3>
  <div class="types">
    <span class="tests">4</span>
  </div>
</div>

<div class="box">
  <h3 class="title">Total DataSources</h3>
  <div class="types">
    <span class="tests">4</span>
  </div>
</div>

<div class="box">
  <h3 class="title">Total DataSets</h3>
  <div class="types">
    <span class="tests">4</span>
  </div>
</div>

</div>




</body>
</html>