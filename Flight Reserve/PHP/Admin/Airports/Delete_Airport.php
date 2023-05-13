<?php   
include '../rolecheck.php';
$id=$_REQUEST['id'];
$sql="delete from Airports where id='$id'";
if (mysqli_query($conn,$sql)) {
	$_SESSION['delairp']="<script>alert('Successfully Deleted')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Airports/Airports.php");
	}
else{
echo "Unable to Delete";
}	
?>