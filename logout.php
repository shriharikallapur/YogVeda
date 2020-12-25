<?php
session_start();

session_destroy();

echo "<script>alert('Logout Success')</script>";
header("refresh:0;url='index.html'");
?>