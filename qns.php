<?php
include 'connection.php';
session_start();
if(isset($_POST['cid']) and isset($_SESSION['uid'])){
	$uid=$_SESSION['uid'];
	$cid=$_POST['cid'];
	$vnum=$_POST['vnum'];
	$qns=$_POST['qns'];
	$name=$_POST['name'];
	$checked="NO";
	$nd="";
	$sql="INSERT INTO question(UID, CID ,vnum, name, checked, answer, qns) VALUES ('$uid','$cid','$vnum','$name','$checked','$nd','$qns')";
	$r1=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;
	if(!(mysqli_error($conn)))
{
	header("refresh:0;url='Learn.php?c_id=".$cid."'");
}


}


?>