<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodorder";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
   
}

else {
    echo "connection failed".mysqli_connect_error();
}

?>