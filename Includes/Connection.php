<?php 
// Databse Variables
$Host       ='localhost';
$DBUser     ='sapthagiri';
$DBPass     ='sapthagiri@123';
$DB         ='sapthagiri';

//Create Connection

$Connection = new mysqli($Host, $DBUser, $DBPass, $DB);

//Check Connection
if($Connection->connect_error){
    die("Connection failed: " . $Connection->connect_error);
}
?>