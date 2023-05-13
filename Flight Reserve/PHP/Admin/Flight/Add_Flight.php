<?php  
include '../rolecheck.php';
if(isset($_REQUEST['submit'])){
$aname=$_REQUEST['aline'];	
$fnum=$_REQUEST['fnum'];	
$dlocation=$_REQUEST['Daport'];		
$alocation=$_REQUEST['Aaport'];	
$DDT=$_REQUEST['DDT'];
$ADT=$_REQUEST['ADT'];
$seat=$_REQUEST['seat'];
$price=$_REQUEST['price'];
$sql="insert into Flight(Airline_id,FlightNumber,DepLocation,AriLocation,DepDateTime,AriDateTime,AvaiSeat,TicketPrice)values('$aname','$fnum','$dlocation','$alocation','$DDT','$ADT','$seat','$price')";

if(mysqli_query($conn,$sql)){
	$_SESSION['af']="<script>alert('Successfully added')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Flight/Flight.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add_Flight</title>
	<link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Flight/Add_Flight.css">
</head>
<body>

	<div class="liAaportnk">
       <ul>

      	<li id="active"><a href="../index.php">Home</a></li>
         <li><a href="../user.php">User/Admin</a></li>
         <li><a href="../Airlines/Airlines.php">Airlines</a></li>
         <li><a href="../Airports/Airports.php">Airports</a></li>
        <li><a href="Flight.php">Back to Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout" style="background-color: red;"><a href="../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<label>Airline Name:</label>
	<select name="aline">
		<?php  
		$sql1="select * from airlines";
		$result1=mysqli_query($conn,$sql1);
		if (mysqli_num_rows($result1)>0) {
		?>
		<option disabled>
			Select Airline
		</option>
		<?php 
		while ($rows=mysqli_fetch_assoc($result1)) {
			echo "<option value='$rows[Id]'>$rows[AirlineName]</option>";
		}}
		 ?>
	</select>
	<label>Flight Number:</label><input type="text" name="fnum" placeholder="Flight ">
	<label>Depature Location:
	</label><select name="Daport">
		<option disabled>Select Depature location</option>
		<?php  
		$sql11="select * from Airports";
		$result11=mysqli_query($conn,$sql11);
		if (mysqli_num_rows($result11)>0) {
		while ($rows1=mysqli_fetch_assoc($result11)) {
			echo "<option value='$rows1[Id]'>$rows1[Airports_Address]</option>";
}}
		?>
	</select>
	<label>Depature Date and time:</label><input type="datetime-local" name="DDT">
	<label>Arival Location:</label><select name="Aaport">
		<option disabled>Select Arival location</option>
		<?php  
		$sqli="select * from Airports";
		$resulti=mysqli_query($conn,$sqli);
		if(mysqli_num_rows($resulti)>0){
			while($rowsi=mysqli_fetch_assoc($resulti)){
				echo "<option value='$rowsi[Id]'>$rowsi[Airports_Address]</option>";
			}
		}
		?>
	</select>
	<label>Arival Date and time:</label><input type="datetime-local" name="ADT">
	<label>number of Seat:</label><input type="number" name="seat" placeholder="Enter Avaliable Seat">
	<label>Ticket Price:</label><input type="number" name="price" placeholder="Enter ticket price">
	<input type="submit" name="submit" onclick="return add()">
</form>
<script type="text/javascript">
	function add(){
		if(confirm("Are you sure to add?")==true){
			return true;
		}
		else{
			return false;
		}
	}
</script>
</body>
</html>