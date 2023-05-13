<?php 	 
include '../rolecheck.php';
if(isset($_SESSION['dfa'])){
	echo $_SESSION['dfa'];
	unset($_SESSION['dfa']);
}else{
	echo "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			margin: 0;
		}
		body{
			background-image: url("../../../Images And Photo/Download/Plane/plane.jpg");
			background-size: cover;
			background-repeat: no-repeat;
		}
		li{
	transition: .5s;
	list-style-type: none;
	display: inline-block;
	padding: .8vh 1.8vw;
	border: .14rem solid white;
	border-radius: 1rem;
	margin: 2.5vh 2vw;
	text-align: center;
	background-color: rgba(0, 0, 0, .2);
}
a{
	color: white;
	text-decoration: none;
}
div.link{
	position: relative;
	background: rgba(255, 255, 255, .4);
	text-align: center;
	width: 100%;
	height: 11.5vh fixed;
}
table{
	text-align: center;
	margin: auto;
	 background-color: rgba(255, 255, 255, .5);
	box-shadow: 2px 2px 10px 4px rgba(255, 255, 255, .4);
	border: none;
	outline: none;
}
th{
	color: red;
}
td{
	color: black;
}
li.logout{
	background-color: red;
}
td a{
	color: white;
	background-color: red;
	padding: 1vh;
	border-radius: 1vh;
}
	</style>
</head>
<body bgcolor="black">
	<div class="link">
       <ul>
         <li id="active"><a href="../index.php">Home</a></li>
         <li id="active"><a href="../user.php">User/Admin</a></li>
         <li><a href="../Airlines/Airlines.php">Airlines</a></li>
         <li><a href="../Airports/Airports.php">Airports</a></li>
        <li><a href="../Flight/Flight.php">Flight</a></li>
        <li style="background: green;"><a href="result.php">Booked Flight</a></li>
        <li class="logout" style="background-color: red;"><a href="../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
<?php 
$sql="select flight.Airline_id,flight.FlightNumber,flight.DepLocation,flight.AriLocation,flight.DepDateTime,flight.AriDateTime,booked_flight.Id,booked_flight.fid,booked_flight.Pname,booked_flight.Pnumber,booked_flight.Paddress,booked_flight.trip from booked_flight inner join flight on booked_flight.fid=flight.fid";
 ?>
 <?php 
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	 ?>
<table border="1" cellspacing="0">
	<tr>
		<th rowspan="2">
			Passenger Name
		</th>
		<th rowspan="2">
			Phone Number
		</th>
		<th rowspan="2">
			Airline
		</th>
		<th rowspan="2">
			Flight Number
		</th>
		<th rowspan="2">
		<p>Arival Location<br>and date</p>
		</th>
		<th rowspan="2">
		<p>Depature Location<br>and date</p>
		</th>
		<th colspan="2">
			Action
		</th>
	</tr>
	<tr>
				<th>
			Delete
		</th>
		<th>
			Update
		</th>
	</tr>
	<?php 
	while($row=mysqli_fetch_assoc($result)){
		$id=$row['Id'];
		$arl=$row['Airline_id'];
		$dpl=$row['DepLocation'];
		$aril=$row['AriLocation'];
		$air="select * from airlines where Id='$arl'";
		$airesult=mysqli_query($conn,$air);
		if(mysqli_num_rows($airesult)>0){
			while($airow=mysqli_fetch_assoc($airesult)){
				if($airow['Id']==$arl){
					$airname=$airow['AirlineName'];
				}
		}
		$ap="select * from Airports where Id in ('$dpl','$aril')";
		$apresult=mysqli_query($conn,$ap);
		if(mysqli_num_rows($apresult)>0){
			while($aprow=mysqli_fetch_assoc($apresult)){
				if($aprow['Id']==$dpl){
					$dl=$aprow['Airports_Name']." ".$aprow['Airports_Address'];
				}
				if($aprow['Id']==$aril){
					$al=$aprow['Airports_Name']." ".$aprow['Airports_Address'];
				}
			}
	 ?>
	<tr>
		<td>
			<?php echo "$row[Pname]"; ?>
		</td>
		<td>
			<?php echo "$row[Pnumber]"; ?>
		</td>
		<td>
			<?php echo $airname; ?>
		</td>
		<td>
			<?php echo "$row[FlightNumber]"; ?>
		</td>
		<?php if($row['trip']=='twoway'){ ?>
		<td>
			<?php echo $al."<br>"; ?>
			<input type="datetime-local" value="<?php echo "$row[AriDateTime]"; ?>" readonly style="background-color: transparent; border: none;">
		</td>
		<td>
			<?php echo $dl."<br>"; ?>
			<input type="datetime-local" value="<?php echo "$row[DepDateTime]"; ?>" readonly style="background-color: transparent; border: none;">
		</td>
	<?php }if($row['trip']=='oneway'){?>
		<td>
<center>-----------</center>
		</td>
		<td>
			<?php echo $dl."<br>"; ?>
			<input type="datetime-local" value="<?php echo "$row[DepDateTime]"; ?>">
		</td>
		<?php } ?>
		<td>
			<a href="../def.php?id=<?php echo $id; ?>" onclick="return del()">Delete</a>
		</td>
		<td>
		<a href="#" onclick="update()">Update</a>	
		</td>
	</tr>
<?php } } }?>
</table>
<?php }else{

	echo "<h1>No result available</h1>";
} ?>
<script type="text/javascript">
	function del(){
		if(confirm("Do you really want to delete")==true){
			return true;
		}else{
			return false;
		}
	}
	function update(){
		alert("You don't have permission for this operation");
	}
</script>
</body>
</html>