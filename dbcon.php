<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "kodego_db";

$con = mysqli_connect($server, $username, $password, $dbname);

if($con){
    echo "<script>console.log('connected')</script>";
}else{
    echo "<script>console.log('not connected')</script>";
}

?>