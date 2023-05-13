<?php 
include '../rolecheck.php';
if(isset($_REQUEST['upload'])){
 $Aname=$_REQUEST['airlinesname'];
	 if(isset($_FILES['Image'])){
	 $file_name=$_FILES['Image']['name'];
	 $file_size=$_FILES['Image']['size'];
	 $file_tmp=$_FILES['Image']['tmp_name'];
	 $file_type=$_FILES['Image']['type'];
	 move_uploaded_file($file_tmp,'../../../Photos/Airlines/'.$file_name);
	 }
	 $sql="insert into airlines(AirlineName,Airline_ImageLogo)values('$Aname','$file_name')";
	if(mysqli_query($conn,$sql)){
		$_SESSION['airlad']="<script>alert('Successfully Added')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Airlines/Airlines.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Airlines</title>
	<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Airlines/Addairlines.css">
</head>
<body>
	<div class="link">
      <ul>
      	<li id="active"><a href="../index.php">Home</a></li>
      	<li><a href="../user.php">User/Admin</a></li>
      	<li><a href="Airlines.php"> Back to Airlines</a></li>
         <li><a href="../Airports/Airports.php">Airports</a></li>
        <li><a href="../Flight/Flight.php">Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
	<div class="addairlines">
<div class="Addairline" >
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="addairline">
		<input type="text" name="airlinesname" placeholder="Enter name of Airline" required>
		<input type="file" name="Image">
	<input type="submit" name="upload" value="Add" onclick=" return add()">
	</div>
</form>
</div>
<script type="text/javascript">
	function add(){
		if(confirm("Are you sure to add")==true){
			return true;
		}else{
			return false;
		}
	}
</script>
</body>
</html>