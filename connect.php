<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "rajat";

$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die("sorry we failed to connect:" . mysqli_connect_error());
}
else{
    echo"Connection was succesful<br>";
}
?>