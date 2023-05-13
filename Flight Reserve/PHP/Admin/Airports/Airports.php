<?php  
include '../rolecheck.php';
if(isset($_SESSION['delairp'])){
	echo $_SESSION['delairp'];
	unset($_SESSION['delairp']);
}else{
	echo "";
}


if(isset($_SESSION['upairp'])){
	echo $_SESSION['upairp'];
	unset($_SESSION['upairp']);
}else{
	echo "";
}


if(isset($_SESSION['airpup'])){
	echo $_SESSION['airpup'];
	unset($_SESSION['airpup']);
}else{
	echo "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Airports</title>
	<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Airports/Airports.css">
</head>
<body>
	<div class="main">	
	<div class="link">
      <ul>

      	<li id="active"><a href="../index.php">Home</a></li>
      	<li><a href="../user.php">User/Admin</a></li>
         <li><a href="../Airlines/Airlines.php">Airlines</a></li>
      	<li style="background: green;"><a href="#">Airports</a></li>
        <li><a href="../Flight/Flight.php">Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
   <div class="table">
   	<?php  
   $sql="select * from Airports";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0){
   ?>
<table border="1px" cellpadding="10px" cellspacing="0">
	<tr>
	<th rowspan="2">Id</th>
	<th rowspan="2">Name of Airports</th>
	<th rowspan="2">Address Of Airports</th>
	<th colspan="2">Operation</th>
</tr>
<tr>
	<th>Update</th>
	<th>Delete</th>
</tr>
	<?php 
   	while ($rows=mysqli_fetch_assoc($result)) {
   	 ?>
	<tr>
		<td><?php echo "$rows[Id]"; ?></td>
		<td><?php echo "$rows[Airports_Name]"; ?></td>
		<td><?php echo "$rows[Airports_Address]"; ?></td>
		<td><a href="Update_Airport.php?id=<?php echo "$rows[Id]"; ?>">Update</a></td>
		<td><a href="Delete_Airport.php?id=<?php echo "$rows[Id]"; ?>" onclick="return del()">Delete</a></td>
	</tr>
<?php } ?>
</table>
<?php } ?>
<ul>
<li><a href="AddAirports.php" class="link">Add Airports</a></li>
</ul>
</div>
</div>
<script type="text/javascript">
	function del(){
		if(confirm("Do you really want to delete")==true){
			return true;
		}else{
			return false;
		}
	}
</script>
</body>
</html>