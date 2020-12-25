<?php 
include 'connection.php';
session_start();

if(isset($_GET['c_id'])){
	$cid=$_GET['c_id'];
	$sql="SELECT * from c_vided where CID='$cid'";
	$res=mysqli_query($conn,$sql);
	$count=0;
  $admin=1;
}
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Course Details</title>
  </head>
  <body>

<header>
  
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Course video</strong>
      </a>
      <ul class='navbar-nav'>
      	<li class="nav-item">
    		<?php 
        if(isset($_SESSION['aid'])){
        echo "<a class='nav-link' href='admin_index.php'>Dashboard</a>";
      }else{
        $admin=0;
        echo "<a class='nav-link' href='user_interface.php'>Dashboard</a>";
      }
      ?>
    </div>
  </div>
</header>

<main>



  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
        <?php 
        while($row=mysqli_fetch_assoc($res))
	    {$count=1;
	    	echo '<div class=" ">';
	    	      echo '<div class="card shadow-sm">';
              echo '<div class="card-header"> <b> Title of the video </b> : '.$row["Title"].'</div>';
	    	       echo '<video width="330"  class="card-img-top"height="180" controls>';
                  echo '<source src="'.$row["paths"].'" type="video/mp4">';
                  echo '<source src="'.$row["paths"].'" type="video/ogg">';
                  echo 'Your browser does not support the video tag.';
                echo '</video>';
	    	        echo '<div class="card-body">';
	    	          echo '<p class="card-text">';
                  echo "<br/><b> Description </b> : ".$row['descr']."</p>"; 
	    	        echo '</div>';
                echo "<div class='card-footer'>";
                if($admin){
                  echo "<a href='delete_course_video.php?vid=".$row['VID']."&path=".$row['paths']."' class='btn btn-danger'>Delete Course</a>";
                }
                else{
                  $uid=$_SESSION['uid'];
                  $admin=0;
                  echo "<a href='take_course.php?uid=".$uid."&cid=".$cid."' class='btn btn-success'>Take course</a>";
                  break;
                }
              
	    	      echo '</div>';
	    	    echo '</div></div>';
	    	}
	    	if($count==0){

	    		echo '<div class="input-group">';

	    		echo '<div class="alert alert-danger" role="alert">';
  echo '<h4 class="alert-heading">There aren\'t any course video </h4>';
  echo '<p>Sorry to say but for this course there aren\'t any course video available</p>';
  echo '<hr>';

echo '</div></div>';
	    	}
        if($admin){
        echo '<div class="alert alert-warning" role="alert">';
           echo '<h4 class="alert-heading">Add more video in course </h4>';
          echo '<p class="mb-0">
                  <form action="svideo.php" method="post">
                   <input type="text" class="form-control" name="vcount" required placeholder="Enter Number of Video">
                    <input type="hidden" name="cid" value='.$cid.'>
                    <button type="submit" class="btn btn-outline-success">Add Course Video</button>
                 </form>
                </p>';
              }
        ?>
      </div>
    </div>
  </div>

</main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   
  </body>
</html>