<?PHP
include 'connection.php';
session_start();
$aid=$_SESSION['aid'];
$course=$_POST['course'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['Email'];
$uses=$_POST['uses'];
$app=$_POST['app'];
$video=$_POST['video'];
$dur=$_POST['dur'];
$type=$_POST['type'];
$sql="INSERT INTO course( AID, c_name, i_name, i_phone, i_email, uses, app, v_count, v_dur, level) VALUES ('$aid','$course','$name','$phone','$email','$uses','$app','$video','$dur','$type')";
if(mysqli_query($conn,$sql)){
	$_SESSION['aid']=$phone;
	$_SESSION['vcount']=$video;
	$sql="SELECT CID from course order by CID desc limit 1 ";				
	$res=mysqli_query($conn,$sql);
	$fet=mysqli_fetch_assoc($res)or die(mysqli_error($conn));
	$_SESSION['cid']=$fet['CID'];
	echo $fet['CID'];
	echo "<script>alert('Successfully Inserted')</script>";
	header("refresh:0;url='upload.php'");
	
}
else{
	echo "coudn't Insert sorry!!!".mysqli_error($conn);
	//header("refresh:2;url='Course_Form.html'");
}

?>