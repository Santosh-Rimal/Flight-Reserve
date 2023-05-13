<?php 
include '../rolecheck.php';
$limit=2;
?>
<?php  
if(isset($_SESSION['upairl'])){
echo $_SESSION['upairl'];
unset($_SESSION['upairl']);
}else{
	echo "";
}
if(isset($_SESSION['deairl'])){
echo $_SESSION['deairl'];
unset($_SESSION['deairl']);
}else{
	echo "";
}

if(isset($_SESSION['deairl'])){
echo $_SESSION['deairl'];
unset($_SESSION['deairl']);
}else{
	echo "";
}

if(isset($_SESSION['airlad'])){
echo $_SESSION['airlad'];
unset($_SESSION['airlad']);
}else{
	echo "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Airlines</title>
	<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Airlines/Airlines.css">
</head>
<body>
	<div class="main">
	  <div class="link">
      <ul>

      	<li id="active"><a href="../index.php">Home</a></li>
      	<li><a href="../user.php">User/Admin</a></li>
      	<li style="background: green;"><a href="#">Airline</a></li>
         <li><a href="../Airports/Airports.php">Airports</a></li>
        <li><a href="../Flight/Flight.php">Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
	<?php 
	if(isset($_REQUEST['page'])){
		$page=$_REQUEST['page'];
	}
	else{
		$page=1;
	}
	$offset=($page-1)*$limit;

	$sql="select Id,AirlineName,Airline_ImageLogo from airlines limit $offset,$limit";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){ 
	?>
	
	<div class="table">
<table border="1px" cellspacing="0" cellpadding="10px">
	<tr>
		<th rowspan="2">Id</th>
		<th rowspan="2">Name of the Airlines</th>
		<th rowspan="2">Image/Logo of the airlines</th>
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
		<td><?php echo "$rows[Id]."; ?></td>
		<td><?php echo "$rows[AirlineName]"; ?></td>
		<td><img src="../../../Photos/Airlines/<?php echo "$rows[Airline_ImageLogo]"; ?>" width="100" height="100"></td>
		<td><a href="Update_Airline.php?id=<?php echo "$rows[Id]"; ?>">Update</a></td>
		<td><a href="Delete_Airline.php?id=<?php echo "$rows[Id]"; ?>" onclick="return del()">Delete</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
<?php 
$sqli="select * FROM airlines";
$result1=mysqli_query($conn,$sqli);
if (mysqli_num_rows($result1)>0) {
$total_records=mysqli_num_rows($result1);
$total_page=ceil($total_records/$limit);
echo "<ul>";
for($i=1;$i<=$total_page;$i++){
	echo '<li><a href="Airlines.php?page='.$i.'"</a>'.$i.'</li>';
}
echo "</ul>";
}
?>
<ul>
	<li>
	<a href="AddAirlines.php" class="Addairline" >Add Airlines</a>
</li>
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