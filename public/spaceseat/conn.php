<?php


header("Access-Control-Allow-Origin: *");
$dbhost = "localhost";
$dbuser = "varistats";
$dbpass = "testMe#1234R";
$db = "varistats";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
$s=0;
ini_set('max_execution_time', 0);

?>