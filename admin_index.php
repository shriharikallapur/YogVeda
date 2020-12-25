<!DOCTYPE html>
<html>
<head>
  
	   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <style type="text/css">
   .bg-dark{
    color: white;
   }
 </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Dashboard</title>
</head>
<body>
  <?php 
  include 'connection.php';
session_start();

if (isset($_SESSION['aid'])){
$aid=$_SESSION['aid'];
echo $aid;
$sql= "SELECT * from admin where chac_phone='$aid'";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($query);
$sql= "SELECT * from course where AID='$aid'";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

}
else{
echo "<script> alert('failed to login')</script>";
header("Location:index.html");
}
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Yogveda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">

        <li class="nav-item">
          <a class="nav-link" href="Course_Form.html">Upload course</a>
        </li>
        
     	<li class="nav-item">
          <a class="nav-link" href="logout.php" tabindex="-1" >logout</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>

<main class="container">

  <div class="text-center py-5 px-3">
    <h1>Yogveda Adminstration window</h1></div>
    <div class= "row justify-content-center">


      <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
       <div class="card-header bg-dark">Center Information</div>
        <div class="card-body">
          <h5 class="card-title">Center Name  : <?php echo $row['chac_name'];?> </h5>
          <p class="card-text">Admin Name  : <?php echo $row['admin_name'];?><br/>
          Center Address : <?php echo $row['chac_add'];?><br/>
          Center Phone :<?php echo $row['chac_phone'];?><br/>
          state : <?php echo $row['state'];?><br/>
          dist : <?php echo $row['dist'];?></p></p>
        </div>
      </div>
    </div>
   <?php

   $s="NO";
   $sql1="SELECT question.qns as qns,question.ID as ID from question,course where course.CID=question.CID and checked='$s' and course.AID='$aid'";
   $q1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
   while ( $row=mysqli_fetch_assoc($q1)) {
    echo '<div class="card">
  <div class="card-body bg-primary">
    <h5 class="card-title">question</h5>';
    $id=$row['ID'];
    echo '<form action="ans.php" class="form-group" method="post">';
    echo "<p class='card-text'> Question = ".$row['qns'];
    echo "<br/> <input type='text' name='ans' required='' class='form-control'><input type='hidden' name='id' required='' value='".$id."'></p>";
    echo "<button type='submit' class='btn btn-outlne-success'>Answer Query</button>";
    echo ' </form></div></div>';
   }
    
   ?>
<div id="chide">
<h3>Uploaded Course</h3>
<div  class="row" >
<?php 
while($rows=mysqli_fetch_assoc($query)){
  echo '<div class="card border-success mb-3 mx-1" style="max-width: 18rem;">';
  echo '<div class="card-header bg-transparent border-success"> <b> <u> course Name </u> </b> : '.$rows["c_name"].'</div>';
  echo '<div class="card-body text-success">';
  echo '  <h5 class="card-title"> <b> <u> Instructor Name : </u> </b> '.$rows["i_name"].'</h5>';
  echo '  <p class="card-text"><b> <u> Instructor phone number : </u> </b>'.$rows["i_phone"].'<br><b> <u>
Instructor Email :</u>  </b>' .$rows["i_email"].'<br><b> <u>Uses : </u> </b> ' .$rows["uses"].'<br><b> <u> Application : </u> </b> ' .$rows["app"].'<br><b> <u>Duration to complete course :</u>  </b> ' .$rows["v_dur"].' <br><b> <u> Difficulty Level :</u>  </b>' .$rows["level"].' 
  </p>';
  echo ' </div>';
  echo '<div class="card-footer bg-transparent border-success"><a class="btn btn-sm mx-2 btn-outline-dark" href="Display_courses.php?c_id='.$rows["CID"].'">Go to course</a><a class="btn btn-sm btn-outline-danger" href="deletecourse.php?c_id='.$rows["CID"].'">Delete course</a></div>';
  echo '</div>';

}
?>
</div>
</div>


</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>