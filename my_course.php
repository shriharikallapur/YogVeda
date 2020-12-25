<?php
session_start();
include 'connection.php';
if (isset($_SESSION['uid'])){
  $uid=$_SESSION['uid'];
  $sql="SELECT course.CID as CID, course.AID as AID,course.c_name as c_name,course.i_name as i_name,course.i_phone as i_phone,course.i_email as i_email,course.uses as uses,course.app as app,course.v_count as v_count,course.v_dur as v_dur,course.level as level,course.desct as desct from course, user_course where user_course.CID=course.CID and user_course.UID=$uid";
  $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if(mysqli_error($conn)){
    echo "<script>alert('".mysqli_error($conn)."')</script>";
  }
}else{
  echo "<script>alert('Please login again')</script>";
  header("refresh:0;url='User_signin.html'");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Course</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<style type="text/css">
	body {
	 background: #2a2e37;
}
h2{
  text-align: center;
}
</style>
</head>
<body>
  <nav class="navbar avbar-expand-lg navbar-dark">
    <a href="user_interface.php" class="navbar-brand">Yogveda</a>

  </nav>
    <div class="album py-5 bg-light">
    <div class="container">
        <h2> Your Courses</h2>
      <?php
while ($row=mysqli_fetch_assoc($query)) {


 echo ' <hr class="sidebar-divider">
   <section class="col col-4 my-2">
   <div class="card-deck">
  <div class="card">
    <h5 class="card-header">'.$row["c_name"].'</h5>
    <div class="card-body">
     
      <p class="card-text">'.$row["desct"].'<br/>
        Instructor name : '.$row["i_name"].'<br/>
        Instructor phone : '.$row["i_phone"].'<br/>
        Instructor email : '.$row["i_email"].'<br/>
        Type of topic : '.$row["uses"].'<br/>
        Number of Videos :'.$row["v_count"].'<br/>
        Main Application of course :'.$row["app"].'<br/> 
        Level of course : '.$row["level"].'<br/>
        Duration of video : '.$row["v_dur"].'<br/>
      </p>
      <p class="card-footer"><a href="Learn.php?c_id='.$row["CID"].'" class="btn btn-outline-success"> Learn course</a></p>
    </div>
  </div>
</section>';
}
?>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
      </div>
      </div>
    </div>
</body>
</html>