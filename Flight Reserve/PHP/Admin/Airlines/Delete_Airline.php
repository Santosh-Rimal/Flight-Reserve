<?php  
echo "<script>";
include '../rolecheck.php';
echo "<script>";
$id=$_REQUEST['id'];
$sqli="select * FROM airlines where Id='$id'";
$result=mysqli_query($conn,$sqli) or die("query failed");
$row=mysqli_fetch_assoc($result);
unlink('../../../Photos/Airlines/'.$row['Airline_ImageLogo']);
$sql="delete from airlines where id='$id'";
if (mysqli_query($conn,$sql)) {
	$_SESSION['deairl']="<script>alert('Successfully Deleted')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Airlines/Airlines.php");
	}
echo "</script>";
?>