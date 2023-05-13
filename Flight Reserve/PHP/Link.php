<?php 
$conn=mysqli_connect('localhost','root','','flight') or die("Connection error"."".mysqli_connect_error());
    session_start();
if(!isset($_SESSION['Name'])){
	header("location: http://localhost/Flight Reserve/HTML/index.html");
}
 ?>
