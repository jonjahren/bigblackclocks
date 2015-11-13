<?php

session_start();
 
$dbhost = "student.cs.hioa.no"; 
$dbname = "s193924"; 
$dbuser = "s193924"; 
$dbpass = "";
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>

