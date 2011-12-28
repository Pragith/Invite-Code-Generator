<?php

$dbname = "DBNAME";
$dbuser = "USER";
$dbpass = "PASS";
$host = "localhost";




$connect = mysql_connect($host,$dbuser,$dbpass);

if (!$connect)
  echo "Couldn't connect!";
  
mysql_select_db($dbname, $connect);    
?>