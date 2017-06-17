<?php

$host="localhost";
$db_user="ahmed";
$db_pass="123";
$db_name="quizzer";

//Create mysqli object
$mysqli=new mysqli($host,$db_user,$db_pass,$db_name);

//error Handler
if($mysqli->connect_error){
    echo "Connect failed : ".$mysqli->connect_error;
    exit();
}

?>