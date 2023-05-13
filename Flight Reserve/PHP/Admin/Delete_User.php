<?php   
include 'rolecheck.php';
$id=$_REQUEST['id'];
$sql="delete from users where User_Id='$id'";
if (mysqli_query($conn,$sql)) {
	header("location: http://localhost/Flight Reserve/PHP/Admin/user.php");
	}
else{
echo "Unable to update";

}	
?>