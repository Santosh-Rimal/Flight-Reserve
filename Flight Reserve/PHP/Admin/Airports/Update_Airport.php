<?php  
include '../rolecheck.php';
if(isset($_REQUEST['submit'])){
$Airport_id=$_REQUEST['id'];
$aname=$_REQUEST['name'];
$aaddress=$_REQUEST['address'];
$sqll="update Airports set Airports_Name='$aname',Airports_Address='$aaddress'where Id='$Airport_id'";
if (mysqli_query($conn,$sqll)) {
	$_SESSION['upairp']="<script>alert('Successgfully Upsated')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Airports/Airports.php");
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
<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Airports/Update_Airpots.css">
</head>
<body>
	<div class="link">
      <ul>

      	<li id="active"><a href="../index.php">Home</a></li>
      	<li><a href="../user.php">User/Admin</a></li>
         <li><a href="../Airlines/Airlines.php">Airlines</a></li>
         <li><a href="Airports.php">Airports</a></li>
        <li><a href="../Flight/Flight.php">Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
	<?php 
	$id=$_REQUEST['id'];
	$sql="select Id,Airports_Name,Airports_Address from Airports where Id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while ($rows=mysqli_fetch_assoc($result)) {
	 ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="frm">
		<input type="hidden" name="id" value="<?php echo "$rows[Id]" ?>">
		<input type="text" name="name" value="<?php echo "$rows[Airports_Name]" ?>">
		<input type="text" name="address" value="<?php echo "$rows[Airports_Address]" ?>">
		<input type="submit" name="submit" value="Update" onclick="return update()">

	</form>
<?php 
}
} 
?>
<script type="text/javascript">
	function update(){
		if(confirm("Do you want to check once before update")==true){
			return false;
		}else{
			return true;
		}
	}
</script>
</body>
</html>

