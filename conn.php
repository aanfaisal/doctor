<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "doctor";
$connect = mysql_connect($host,$user,$pass);
mysql_select_db($dbname,$connect); 		
?>