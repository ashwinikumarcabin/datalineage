<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width-device-width, initial-scale=1.0">
</head>


<style>
.crd{
box-shadow: 0 3px 5px rgba(0,0,0,0.3);
width:280px;
height:100px;
position:absolute;
top:500px;
left:820px;
}
.crd h4{
text-align:center;
font-size:20px;
}
button a{
text-decoration:none;

}
.crd button{
padding:5px 10px;
position:absolute;
top:45px;
left:100px;

}
.crd button:hover{
	text-decoration:none;
}

</style>

<body>
<div class="crd">
<h4 style="color:#005691"><strong>Audio Summarization</strong></h4>
<button type="button"><a href="New folder/welcome.mp3" target="_blank">Download</a></button>

</div>	 

</body>
</html>






<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width-device-width, initial-scale=1.0">
</head>


<style>


</style>

<body>
<div class="bosch">
<img src="image/graphic1.jpg" height="20px" width="1250px">
</div>
<div class="logo">
<img src="image/bosch-logo1.svg" width="150px" height="70px">
     </div>
</body>
</html>




<!DOCTYPE html>
<html>
<head>
 <style>
.sub{
	width:280px;
	height:110px;
	border: #e6e7e9 1px solid;
	padding:10px 20px;
position:absolute;
top:370px;
left:818px;
box-shadow: 0 3px 5px rgba(0,0,0,0.3);
}
.sub h3{
color:#005691;
font-size:20px;

}	
.sub #submit{
	color:#007bff;
	box-shadow: 0.3px 0.3px 0.3px rgba(0,0,0,0.5);
	background-color:#F0F0F0;
	padding:0 20px;
    position:absolute;
	left:-10px;
	
}
</style>
</head>
<body>

<?php
$serverName = "BANI-C-0043W";
$connectionInfo = array(
    "UID" => "sa",
    "PWD" => "Ashwini@13091998",
    "Database" => "DataLineageDb"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    echo "Unable to connect.</br>";
    exit;
} else {
   
}

if(isset($_POST['submit']))
{		
    $Email = $_POST['Email'];
    

    $insert = sqlsrv_query($conn,"INSERT INTO [DataLineageDb].[dbo].[Subscription]  VALUES ('$Email','Null')");

    if(!$insert)
    {
        echo "error";
    }
    else
    {
       
    }
}


?>
<div class="sub">
<h3 style="text-align:center"><strong>Subscription</strong></h3>

<form method="POST">
  Email : <input type="text" name="Email" placeholder="Enter Email Address" Required>
  <br/>
  <input id="submit" type="submit" name="submit" value="Submit" style="margin-left:40%;margin-top:5px;">
</form>
</div>
</body>
</html>






<!DOCTYPE html>
<html>
<head>
<style>
.b{
	position:absolute;
	top:370px;
	left:40px;
}
iframe{
	border: #e6e7e9 1px solid;
}
</style>
</head>
<body>
<div class="b">



<iframe src= "http://bani-c-0043w/Reports/powerbi/Lineage%20Explorer%20Tool%20Final%202?rs:embed=true", style="height:760px;width:750px" ></iframe>
</div>

</body>
</html>






<?php
$serverName = "BANI-C-0043W";
$connectionInfo = array(
    "UID" => "sa",
    "PWD" => "Ashwini@13091998",
    "Database" => "DataLineageDb"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    echo "Unable to connect.</br>";
    exit;
} else {
   
}

// Other code here ...
$sql4="select count(ItemID) from ReportCatalog";
$res4=sqlsrv_query($conn,$sql4);
while( $row = sqlsrv_fetch_array($res4,SQLSRV_FETCH_BOTH) ) {
$TotalReports=$row[0];
}
$sql5="select count(ItemID) from ReportCatalog where ItemID in(Select distinct(ItemID) from ExecutionLog)";
$res5=sqlsrv_query($conn,$sql5);
while( $row = sqlsrv_fetch_array($res5,SQLSRV_FETCH_BOTH) ) {
$UsedReports=$row[0];
 }
$sql6="select count(ItemID) from ReportCatalog where ItemID not in(Select distinct(ItemID) from ExecutionLog)";
$res6=sqlsrv_query($conn,$sql6);
while( $row = sqlsrv_fetch_array($res6,SQLSRV_FETCH_BOTH) ) {
$UnUsedReports=$row[0];
}
$sql7="	Select count(*) from [DataLineageDb].[dbo].[ReportCatalog] where [CreationDate] > DATEADD(MONTH, -1, GETDATE())";
$res7=sqlsrv_query($conn,$sql7);
while( $row = sqlsrv_fetch_array($res7,SQLSRV_FETCH_BOTH) ) {
$Uploadedlastmonth=$row[0];
 }
$sql8="Select count(Distinct [ServerName] )from [DataLineageDb].[dbo].[ReportCatalog]";
$res8=sqlsrv_query($conn,$sql8);
while( $row = sqlsrv_fetch_array($res8,SQLSRV_FETCH_BOTH) ) {
$DistictServer=$row[0];}

$sql9="select distinct servername from ReportCatalog";
$res9=sqlsrv_query($conn,$sql9);
while( $row = sqlsrv_fetch_array($res9,SQLSRV_FETCH_BOTH) ) {
$server=$row[0];
}



	
     
	 

?>








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
display:flex;
align-items:center;
justify-content: center;
flex-wrap: wrap;
padding-bottom: 10px;
}
.box-container .box:hover{
	background-color:#ccf5ff;
	transition:0.7s;
	transform: translateY(-7px);
}
.box-container .box{
height: 175px;
width: 180px;
margin: 20px 20px;
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
background: #b90276;
bottom:-10%; right:80%;
}
.box-container .box .title{
margin:30px 0;
font-size: 22px;
color: #b90276;
}
.box-container .box .types{
height:55px;
width:65px;
color:#fff;
background:#b90276;
padding:7px 0 0;
margin:0 auto 25px;
border-radius: 50%;
}

.box-container .box .types .tests{
font-size: 40px;
line-height: 50px;
font-weight: 700;
}
.box-container .pink .title{
color: #b90276;
}
.box-container .pink .types{
background-color: #b90276;
}
.box-container .pink::after{
background-color: #b90276;
}
.box-container .purple .title{
color: #50237f;
}
.box-container .purple .types{
background-color: #50237f;
}
.box-container .purple::after{
background-color:#50237f;
}


.box-container .blue .title{
color: #008ecf;
}
.box-container .blue .types{
background-color: #008ecf;
}
.box-container .blue::after{
background-color: #008ecf;
}

.box-container .Blue .title{
color:  #00a8b0;
}
.box-container .Blue .types{
background-color:  #00a8b0;
}
.box-container .Blue::after{
background-color:  #00a8b0;
}
.box-container .blu .title{
color:  #78be20;
}
.box-container .blu .types{
background-color:  #78be20;
}
.box-container .blu::after{
background-color:  #78be20;
}
   
  .headingDiv{
   margin: 0px 100px;
  }
  .ser{
	  position:absolute;
	  top:10px;
  }
  button{
	  position:absolute;
	  top:10px;
	  left:100px;
  }
  .headingDiv{
	  box-shadow: 0 3px 5px rgba(0,0,0,0.3);
	  padding-top:10px;
	  padding-bottom:5px;
	  width:400px;
	  margin-left:380px;
	  font-weight:20px;
  }
	  
  
</style>

<body>


     
<div class="headingDiv">
<h1 align="center"><span style="color: #005691">Lineage Explorer</span></h1>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~Coding for test count container~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="box-container">

<div class="box pink">
  <h3 class="title" style="padding-bottom:25px;font-size:20px"><strong>Total Servers</strong></h3>
  <div class="types">
    <span class="tests"><?php echo $DistictServer ?></span>
  </div>
</div>

<div class="box purple">
  <h3 class="title"style="padding-bottom:25px;font-size:20px"><strong>Total Reports</strong></h3>
  <div class="types">
    <span class="tests"><?php echo $TotalReports ?></span>
  </div>
</div>

<div class="box blue">
  <h3 class="title"style="padding-bottom:25px;font-size:20px"><strong>Used Reports</strong></h3>
  <div class="types">
    <span class="tests"><?php echo $UsedReports?></span>
  </div>
</div>

<div class="box Blue">
  <h3 class="title"style="padding-bottom:25px;font-size:20px"><strong>Unused Reports</strong></h3>
  <div class="types">
    <span class="tests"><?php echo $UnUsedReports?></span>
  </div>
</div>

<div class="box blu">
  <h3 class="title" style="font-size:18px"><strong>Reports Uploaded Last Month</strong></h3>
  <div class="types">
    <span class="tests"><?php echo $Uploadedlastmonth ?></span>
  </div>
</div>

</div>

</div>




</body>
</html>























<?php
$serverName = "BANI-C-0043W";
$connectionInfo = array(
    "UID" => "sa",
    "PWD" => "Ashwini@13091998",
    "Database" => "DataLineageDb"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    echo "Unable to connect.</br>";
    exit;
} else {
   
}

// Other code here ...


?>





<?php
date_default_timezone_set('Asia/Kolkata');


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>PHP Chatbot</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	  
	 
	  
	  
   </head>

   <body>
   
     	
		
   
   
   
   
   
      <div class="container">
         <div class="row justify-content-md-left mb-4">
            <div class="col-md-6">
               <!--start code-->
               <div class="card">
                  <div class="card-body messages-box">
					 <ul class="list-unstyled messages-list">
							<?php
							$tsql = "select * from message";  

 

                            $res = sqlsrv_query( $conn, $tsql);  
							
							if(sqlsrv_num_rows($res)>0){
								$html='';
								while($row=sqlsrv_fetch_assoc($res)){
									$message=$row['message'];
									$added_on=$row['added_on'];
									$strtotime=strtotime($added_on);
									$time=date('h:i A',$strtotime);
									$type=$row['type'];
									if($type=='user'){
										$class="messages-me";
										$imgAvatar="user_avatar.png";
										$name="Me";
									}else{
										$class="messages-you";
										$imgAvatar="bot_avatar.png";
										$name="Chatbot";
									}
									$html.='<li class="'.$class.' clearfix"><span class="message-img"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">'.$name.'</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$time.'</span></small> </div><p class="messages-p">'.$message.'</p></div></li>';
								}
								echo $html;
							}else{
								?>
								<h5 style="text-align:center;margin-bottom:40px;color:#005691;font-size:20px"><strong>Lineage Explorer Chatbot</strong></h5>
								<img src="image/vani.gif" height="150px">
								
								
								<?php
							}
							?>
                    
                     </ul>
                  </div>
                  <div class="card-header">
                    <div class="input-group">
					   <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
					   <span class="input-group-append">
					   <input type="button" class="btn btn-primary" value="Send" onclick="send_msg()">
					   </span>
					</div> 
                  </div>
               </div>
               <!--end code-->
            </div>
         </div>
      </div>
	  
	  
	  
	  
	  
		
		
		
		
		
       
		
		
		
		
		
		
		
		
      <script type="text/javascript">
	  
	  
	  
	   
			
			
			
			
			
	     $("#input-me").keypress(function(e){
			 if(e.which==13){
				 send_msg();
			 }
		 })
		 
		 
		 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
		 function send_msg(){
			jQuery('.start_chat').hide();
			var txt=jQuery('#input-me').val();
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+txt+'</p></div></li>';
			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(txt){
				jQuery.ajax({
					url:'get_bot_message.php',
					type:'post',
					data:'txt='+txt,
					success:function(result){
						var html='<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
						jQuery('.messages-list').append(html);
						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
		 }
		 
		 
		 
		 
		




      </script>
   </body>
</html>




