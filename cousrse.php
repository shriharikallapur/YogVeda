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
$desc=$_POST['desc'];
$sql="INSERT INTO course(CID, AID, c_name, i_name, i_phone, i_email, uses, app, v_count, v_dur, level,desct) VALUES ('','$aid','$course','$name','$phone','$email','$uses','$app','$video','$dur','$type','$desc')";
if(mysqli_query($conn,$sql)){
	echo "Successfully Inserted";
	header("refresh:2;url='upload.php'");
}
else{
	echo "coudn't Insert sorry!!!".mysqli_error($conn);
	header("refresh:2;url='Course_Form.html'");
}
$_SESSION['aid']=$phone;
?>