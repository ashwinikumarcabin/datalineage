

<!DOCTYPE html>
<html>
    <head>
	
	<link rel="shortcut icon" href="/assets/favicon.ico">
  <link rel="stylesheet" href="assets/dcode.css">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
	  
      <title>PHP Chatbot</title>
      
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
height: 150px;
width: 180px;
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
height:55px;
width:65px;
color:#fff;
background:#74b9ff;
padding:7px 0 0;
margin:0 auto 25px;
border-radius: 50%;
}

.box-container .box .types .tests{
font-size: 40px;
line-height: 50px;
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
	<!--  -->
	
		
		
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
								<h5 style="text-align:center;margin-bottom:40px;color:#00BFFF"><strong>Lineage Explorer Chatbot</strong></h5>
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