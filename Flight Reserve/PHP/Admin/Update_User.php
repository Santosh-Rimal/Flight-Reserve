<?php 
include 'rolecheck.php';
if(isset($_REQUEST['usubmit'])){
$user_id=$_REQUEST['uid'];
$ufname=mysqli_real_escape_string($conn,$_REQUEST['ufname']);
$ulname=mysqli_real_escape_string($conn,$_REQUEST['ulname']);
$uaddress=mysqli_real_escape_string($conn,$_REQUEST['uaddress']);
$uemail=mysqli_real_escape_string($conn,$_REQUEST['uemail']);
$uRole=mysqli_real_escape_string($conn,$_REQUEST['uRole']);
$sqll="update Users set FirstName='$ufname',LastName='$ulname',Address='$uaddress',Role='$uRole'where User_Id='$user_id'";
if (mysqli_query($conn,$sqll)) {
	header("location: http://localhost/Flight Reserve/PHP/Admin/index.php");
	}
else{
echo "Unable to update";

}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
	<style type="text/css">
		
		input {
    display: block;
    width: 173px;
    padding: 10px;
    margin-top: 20px;
    border-radius: 20px;
}
input[type="submit"]{
    width: 200px;
    padding: 15px;
    margin: 18px auto auto 0px;
    display:block;
    letter-spacing: 1px;
    font-size: 20px;
    border: none;
    cursor: pointer;
}
.frm{
	margin-left:550px;
	margin-top: 100px;
	}
	</style>
</head>
<body>
	<?php 
	$id=$_REQUEST['id'];
	$sql="select User_Id,FirstName,LastName,Address,Email,Role from Users where User_Id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while ($rows=mysqli_fetch_assoc($result)) {
	 ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="frm">
		<input type="hidden" name="uid" value="<?php echo "$rows[User_Id]" ?>">
		<input type="text" name="ufname" value="<?php echo "$rows[FirstName]" ?>">
		<input type="text" name="ulname" value="<?php echo "$rows[LastName]" ?>">
		<input type="text" name="uaddress" value="<?php echo "$rows[Address]" ?>">
		<input type="text" name="uemail" value="<?php echo "$rows[Email]" ?>" readonly>
		<input type="text" name="uRole" value="<?php echo "$rows[Role]"; ?>">
		<input type="submit" name="usubmit" value="Update">

	</form>
<?php 
}
} 
?>
</body>
</html>