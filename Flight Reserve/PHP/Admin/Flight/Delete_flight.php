<?php   
include '../rolecheck.php';
$id=$_REQUEST['id'];
$sql="delete from flight where fId='$id'";
if (mysqli_query($conn,$sql)) {
	$_SESSION['df']="<script>alert('Successfully Deleted')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Flight/Flight.php");
	}
else{
echo "Unable to update";

}	
?>