<?php
$server_n="localhost";
$server_u="root";
$server_p="";
$dbname="yogveda";
$conn=mysqli_connect($server_n,$server_u,$server_p,$dbname);
if(!$conn){
	die('Connection failed'.mysqli_connect_error());
}
?>