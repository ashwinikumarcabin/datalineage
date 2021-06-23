<?php
date_default_timezone_set('Asia/Kolkata');
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





$txt=$_POST['txt'];



$sql="select question,reply from [DataLineageDb].[dbo].[chatbot_hints] where question like '%$txt%'";

$res=sqlsrv_query($conn,$sql);
$res= sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));


if(sqlsrv_num_rows($res)>0){
	


while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_BOTH) ) {
	$pattern="%select%";
	$pattern1="%size%";
	$pattern2="%:%";
	
	$pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
	$pattern1 = str_replace('%', '.*', preg_quote($pattern1, '/'));
	$pattern2 = str_replace('%', '.*', preg_quote($pattern2, '/'));
	$subject=$row['reply'];
	$subject1=$row['question'];
	
	
	
	
if(preg_match("/^{$pattern}$/i", $subject)){}
else{
echo $row['reply'];}


     
	  $reply1=$row['reply'];
}
if(preg_match("/^{$pattern}$/i", $subject)){
$sql1=$reply1;
$res1=sqlsrv_query($conn,$sql1);


if( $res1 === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array($res1,SQLSRV_FETCH_BOTH) ) {
	if(preg_match("/^{$pattern1}$/i", $subject1)){
		
	echo "[";
	echo $row[0];
	echo "]";
	echo "MB";
	
	echo "\n";}
	else {
	
	
	if(!(isset($row[1])))
	{if($row[0] instanceof DateTime)
	{echo $stringDate = $row[0]->format('d-m-y H:i:s');}
else{
		echo "[";
	echo $row[0];
	echo "]";
	echo nl2br("\n");}}
	else{
		echo "[";
	echo $row[0];
	echo nl2br("\n");
	
	if($row[1] instanceof DateTime)
	{echo $stringDate = $row[1]->format('d-m-y H:i:s');}
else
{echo $row[1];}
	
	echo "]";
		echo nl2br("\n");
		
	}
	
	echo nl2br("\n");
	
	
	}
	
	
     
	 
}}}
else{
	$html="Sorry not be able to understand you";
	echo $html;
}
?>






