<?php

$databaseHost = 'localhost';
$databaseName = 'ae';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) 
		or die("cannot connect"); 
 
?>
