<?php  
include '../rolecheck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Airline</title>
	<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Airlines/Update_Airline.css">
</head>
<body>
	<div class="link">
      <ul>

      	<li id="active"><a href="../index.php">Home</a></li>
      	<li><a href="../user.php">User/Admin</a></li>
      	<li><a href="Airlines.php">Airlines</a></li>
         <li><a href="Airports/Airports.php">Airports</a></li>
        <li><a href="Flight/Flight.php">Flight</a></li>
        <li class="logout"><a href="../../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
	<?php  
	$id=$_REQUEST['id'];
	$sql="select AirlineName,Airline_ImageLogo from airlines where Id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while ($rows=mysqli_fetch_assoc($result)) {	
	?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id ;?>" >
		<input type="text" name="airlinesname" value="<?php echo "$rows[AirlineName]"; ?>">
		<input type="file" name="Image">
		<img src="../../../Photos/Airlines/<?php echo "$rows[Airline_ImageLogo]"; ?>" width="100" height="100" style="margin-left: 4vh; border-radius: 1rem;">
		<input type="hidden" name="old_image" value="<?php echo "$rows[Airline_ImageLogo]"; ?>">
		<input type="submit" name="upload" onclick="return update()">
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
<?php 
if(isset($_REQUEST['upload'])){
	$Aname=$_REQUEST['airlinesname'];
if(empty($_FILES['Image']['name'])){
	$file_name=$_REQUEST['old_image'];
}
else{
	 if(isset($_FILES['Image'])){
	 $file_name=$_FILES['Image']['name'];
	 $file_size=$_FILES['Image']['size'];
	 $file_tmp=$_FILES['Image']['tmp_name'];
	 $file_type=$_FILES['Image']['type'];
	 move_uploaded_file($file_tmp,'../../../Photos/Airlines/'.$file_name);
	$sqli="select * FROM airlines where Id='$id'";
	$result1=mysqli_query($conn,$sqli) or die("query failed");
	$row=mysqli_fetch_assoc($result1);
	unlink('../../../Photos/Airlines/'.$row['Airline_ImageLogo']);
	 }
}
$sql="update airlines set AirlineName='$Aname' , Airline_ImageLogo='$file_name' where Id='$id'";
	$result=mysqli_query($conn,$sql);
	$_SESSION['upairl']="<script>alert('Successfully Updated')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Airlines/Airlines.php");
}

?>