<?php 
include 'rolecheck.php';
$id=$_REQUEST['id'];
echo $id;
$sql="DELETE FROM booked_flight WHERE Id='$id'";
if(mysqli_query($conn,$sql)){
    $_SESSION['dfa']="<script>alert('Successfully Deleted')</script>";
header("location: http://localhost/Flight Reserve/PHP/Admin/Result/result.php");
}
 ?>
