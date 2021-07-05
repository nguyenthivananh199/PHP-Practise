<?php 
$mysqli = new mysqli("localhost","root","10101995","bai4");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
    
}
?>