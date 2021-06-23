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
    echo "Connected.</br>";
}
$tsql = "SELECT CommentID, ItemID FROM Comments";  

/* Execute the query. */  

$stmt = sqlsrv_query( $conn, $tsql);  

if ( $stmt )  
{  
     echo "Statement executed.<br>\n";  
}   
else   
{  
     echo "Error in statement execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
// Other code here ...

sqlsrv_close($conn);
?>
