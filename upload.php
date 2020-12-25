<!DOCTYPE html>
<html>
<head>
	<title>Course upload</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="upload.css">
    <script type="text/javascript" href="upload.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>
</head>
<body>

  <nav class=" bg-dark">
   <h1> Yogveda <h1>
    <h3><center>Video Upload</center></h3>
</nav>
  
  <form method="post" action="upvid.php" enctype="multipart/form-data">
    <div id="show">
  <?php
  session_start();
  $n=$_SESSION['vcount'];
  for($i=0;$i<$n;$i++){
  echo '<div class="form-group">';
    echo '<label for="title">Title <span>Use title case to get a better result</span></label>';
    echo '<input type="text" name="title[]" id="caption" class="form-control"/>';
  echo ' </div>';
  echo '<div class="form-group">';
    echo '<label for="caption">Video Number<span>This should be in nummbers</span></label>';
    echo '<input type="text" name="vcnt[]" id="caption" class="form-control"/>';
  echo '</div>';
  echo '<div class="form-group">';
    echo '<label for="caption">Discription <span>description about video</span></label>';
   echo ' <input type="text" name="desc[]" id="caption" class="form-control"/>';
  echo '</div>  ';
  echo '<div class="form-group file-area">';
      echo '  <label for="images">Images <span>Your images should be at least 400x300 wide</span></label>';
  echo '  <input type="file" required="" name="video[]" class="file-area" id="images"/>';
  echo '  <div class="file-dummy">';
    echo '  <div class="success">Great, your files are selected. Keep on.</div>';
    echo '  <div class="default">Please select some files</div>';
  echo '  </div>';
  echo '<hr>';
echo '  </div>';
  }
  ?>
  <div class="form-group">
    <button type="submit">Upload Videos</button>
  </div>
  
</form>
</body>
</html>