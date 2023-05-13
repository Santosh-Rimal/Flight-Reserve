<?php  
include '../rolecheck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Airports</title>
		<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Airports/AddAirports.css">
</head>
<body>
		<div class="link">
      <ul>

      	<li id="active"><a href="../index.php">Home</a></li>
      	<li><a href="../user.php">User/Admin</a></li>
         <li><a href="../Airlines/Airlines.php">Airlines</a></li>
         <li><a href="Airports.php">Back to Airports</a></li>
        <li><a href="../Flight/Flight.php">Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
	<div class="AddAirports">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="Airports">
		<input type="text" name="Aname" placeholder="Name of the Airports">
		<input type="text" name="Aaddress" placeholder="Address of the Airports">
		<input type="submit" name="submit" placeholder="santpsh" onclick="return add()">
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
<?php
if(isset($_REQUEST['submit'])){
	$aname=$_REQUEST['Aname'];
	$aaddress=$_REQUEST['Aaddress'];
	$sql="insert into Airports(Airports_Name,Airports_Address)values('$aname','$aaddress')";
	if(mysqli_query($conn,$sql)){
		header("location: http://localhost/Flight Reserve/PHP/Admin/Airports/Airports.php");
	}
}
?>