<?php
include 'connection.php';
session_start();
$cid=$_SESSION['cid'];
$n=$_SESSION['vcount'];
$titlear=$_POST['title'];
$vcntar=$_POST['vcnt'];

$descar=$_POST['desc'];

for($i=0;$i<$n;$i++){
$title=$titlear[$i];
$vcnt=$vcntar[$i];

$desc=$descar[$i];
$name=$cid."_".$i."_".rand(1,300);
$fname= $_FILES['video']['name'][$i];
$ext = pathinfo($fname, PATHINFO_EXTENSION);
$path="course_video/".$name.".".$ext;
move_uploaded_file($_FILES["video"]["tmp_name"][$i],"course_video/".$name.".".$ext); 
$sql="INSERT INTO c_vided(CID, Title, v_num, descr, paths) VALUES ('$cid','$title','$vcnt','$desc','$path')";
$r1=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;

}
if(!(mysqli_error($conn)))
{	echo "<script>alert('Successfully Inserted')</script>";
	header("refresh:0;url='admin_index.php'");
}

?>
