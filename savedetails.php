<?php
include_once './blogic.php';
// Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

// Inserts new row with place data.
$query = sprintf("INSERT INTO info " .
         " (name, address, lat, lng) " .
         " VALUES ('%s', '%s', '%s', '%s');",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
         mysql_real_escape_string($lat),
         mysql_real_escape_string($lng));

$result = mysql_query($query);
    
    $x = ExecuteNonQuery($qry);       
        if($x>0){
            $msg = "<font color='green'>Your'e Registered</font>";
        }
        else
        {
            $msg = "<font color='green'>Your'e not registered</font>".mysql_error();
        }

?>