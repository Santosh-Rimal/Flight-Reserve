<?php 
include 'rolecheck.php';
$id=$_REQUEST['id'];
echo $id;
$sql="DELETE FROM booked_flight WHERE Id='$id'";
if(mysqli_query($conn,$sql)){
    $_SESSION['dfnu']="<script>alert('Successfully Deleted')</script>";
header("location: http://localhost/Flight Reserve/PHP/Normal User/result.php");
}
 ?>
