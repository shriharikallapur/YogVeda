<?php 
include 'connection.php';
session_start();
if(isset($_SESSION['uid'])){
$uid=$_SESSION['uid'];
$sql="SELECT * from course";
$query=mysqli_query($conn,$sql);
}
else
{ echo "<script>alert('Please login again')</script>";
  header("refresh:0;url='User_signin.html'");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   
<style>
* {
	 box-sizing: border-box;
}
 body {
	 background: #2a2e37;
}
 .search {
	 width: 100px;
	 height: 100px;
	 margin: 40px auto 0;
	 background-color: #242628;
	 position: relative;
	 overflow: hidden;
	 transition: all 0.5s ease;
}
 .search:before {
	 content: '';
	 display: block;
	 width: 3px;
	 height: 100%;
	 position: relative;
	 background-color: #00fede;
	 transition: all 0.5s ease;
}
 .search.open {
	 width: 420px;
}
 .search.open:before {
	 height: 60px;
	 margin: 20px 0 20px 30px;
	 position: absolute;
}
 .search-box {
	 width: 100%;
	 height: 100%;
	 box-shadow: none;
	 border: none;
	 background: transparent;
	 color: #fff;
	 padding: 20px 100px 20px 45px;
	 font-size: 40px;
}
 .search-box:focus {
	 outline: none;
}
 .search-button {
	 width: 100px;
	 height: 100px;
	 display: block;
	 position: absolute;
	 right: 0;
	 top: 0;
	 padding: 20px;
	 cursor: pointer;
}
 .search-icon {
	 width: 40px;
	 height: 40px;
	 border-radius: 40px;
	 border: 3px solid #00fede;
	 display: block;
	 position: relative;
	 margin-left: 5px;
	 transition: all 0.5s ease;
}
 .search-icon:before {
	 content: '';
	 width: 3px;
	 height: 15px;
	 position: absolute;
	 right: -2px;
	 top: 30px;
	 display: block;
	 background-color: #00fede;
	 transform: rotate(-45deg);
	 transition: all 0.5s ease;
}
 .search-icon:after {
	 content: '';
	 width: 3px;
	 height: 15px;
	 position: absolute;
	 right: -12px;
	 top: 40px;
	 display: block;
	 background-color: #00fede;
	 transform: rotate(-45deg);
	 transition: all 0.5s ease;
}
 .open .search-icon {
	 margin: 0;
	 width: 60px;
	 height: 60px;
	 border-radius: 60px;
}
 .open .search-icon:before {
	 transform: rotate(52deg);
	 right: 22px;
	 top: 23px;
	 height: 18px;
}
 .open .search-icon:after {
	 transform: rotate(-230deg);
	 right: 22px;
	 top: 13px;
	 height: 18px;
}
.btn {
	float: right;
}
 
</style>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Yogveda</a>
	<a href="my_course.php" class="btn btn-outline-primary">My Course</a>
<div class="search">
	
  <input type="search" class="search-box" />
  <span class="search-button">
    <span class="search-icon"></span>
  </span>
</div>
<a href="logout.php" class="btn btn-outline-warning">Logout</a>
</nav>

   <?php

   $s="YES";
   $sql1="SELECT * from question where UID='$uid' and checked='$s'";
   $q1=mysqli_query($conn,$sql1);
   while ($row=mysqli_fetch_assoc($q1)) {
    echo '<div class="card">
  <div class="card-body bg-success">
    <h5 class="card-title">Answer</h5>';
    $id=$row['ID'];
    echo "<p class='card-text'> Question = ".$row['qns'];
    echo "<br/> Answer Given = ".$row['answer'];
    $sql1="UPDATE question set checked='done' where ID= '$id'";
    $q2=mysqli_query($conn,$sql1);
    echo ' </div>
</div>';
   }
    
   ?>
 

<div id='search'>
  <div class="row">
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
        Type of topic : '.$row["uses"].'<br/>
        Number of Videos :'.$row["v_count"].'<br/>
        Main Application of course :'.$row["app"].'<br/> 
        Level of course : '.$row["level"].'<br/>
        Duration of video : '.$row["v_dur"].'<br/>
      </p>
      <p class="card-footer"><a href="Display_courses.php?c_id='.$row["CID"].'" class="btn btn-outline-success"> Take a tour of course</a></p>
    </div>
  </div>
</section>';
}
?>
</div>
</div>
 <script>
$(document).ready(function(){
 $('.search-button').click(function(){
  $(this).parent().toggleClass('open');
});
});
</script>
</body>

</html> 