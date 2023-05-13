<?php  
include '../rolecheck.php';
if(isset($_REQUEST['submit'])){
$id=$_REQUEST['id'];
$aname=$_REQUEST['airline'];	
$fnum=$_REQUEST['fnum'];	
$dlocation=$_REQUEST['Daport'];	
$DDT=$_REQUEST['DDT'];	
$alocation=$_REQUEST['Aaport'];	
$ADT=$_REQUEST['ADT'];
$seat=$_REQUEST['seat'];
$price=$_REQUEST['price'];
$sql="update Flight set Airline_id='$aname',FlightNumber='$fnum',DepLocation='$dlocation',AriLocation='$alocation',DepDateTime='$DDT',AriDateTime='$ADT',AvaiSeat='$seat',TicketPrice='$price' where fId='$id'";
if(mysqli_query($conn,$sql)){
	$_SESSION['upf']="<script>alert('Successfully Updated')</script>";
	header("location: http://localhost/Flight Reserve/PHP/Admin/Flight/Flight.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Flight</title>
	<style type="text/css">
		input,select{
			margin: 2vh auto;
			display: block;
			width: 200px;
			height: 4vh;
		}
	label{
	 width: 42%;
	 margin-left: 550px;
	}
	</style>
</head>
<body>
	<?php
		$id=$_REQUEST['id']; 
    	$sql1i="select * from flight where fId='$id'";
    	$result=mysqli_query($conn,$sql1i);
    	if (mysqli_num_rows($result)>0){
    		while ($rows=mysqli_fetch_assoc($result)) {
    	?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<label>Airline Name:</label>
	<select name="airline">
		<option disabled>
			Select airline
		</option>
		<?php  
    	$sql1="select * from Airlines";
    	$result1=mysqli_query($conn,$sql1);
    	if(mysqli_num_rows($result1)>0){
    		while($rows1=mysqli_fetch_assoc($result1)){
    	?>
    	<?php  
    	if($rows1['Id']==$rows['Airline_id']){
    		$selected="selected";
    	 }else{
    	 	$selected="";
    	 }
    		echo "<option value='$rows1[Id]' $selected>$rows1[AirlineName]</option>";
    	?>

    <?php }} ?>
	</select>
	<label>Flight Number:</label><input type="text" name="fnum" placeholder="Flight Number" value="<?php echo"$rows[FlightNumber]"; ?>">
	<label>Depatcure location:</label><select name="Daport">
		<option disabled>Select Depature location</option>
		<?php  
      $sqli="select * from Airports";
      $resulti=mysqli_query($conn,$sqli);
      if (mysqli_num_rows($resulti)>0) {
      	 while($rowi=mysqli_fetch_assoc($resulti)){
      	 	?>
      	 	<?php
    if(($rowi['Id']==$rows['DepLocation'])){
    	$selected="selected";
    	 }else{
    	 	$selected="";
    	 }
    	echo "<option value='$rowi[Id]' $selected>$rowi[Airports_Address]</option>";
    }
      ?>
	<?php } ?> 
	</select>
	<label>Depature Date and time:</label><input type="datetime-local" name="DDT" value="<?php echo"$rows[DepdateTime]"; ?>">
		<label>Arival location:</label><select name="Aaport">
		<option disabled>Select Arival location</option>
		<?php  
      $sqli1="select * from Airports";
      $resulti1=mysqli_query($conn,$sqli1);
      if (mysqli_num_rows($resulti1)>0) {
      	 while($rowi1=mysqli_fetch_assoc($resulti1)){
      	 	?>
      	 	<?php
    if(($rowi1['Id']==$rows['AriLocation'])){
    	$selected="selected";
    	 }else{
    	 	$selected="";
    	 }
    	echo "<option value='$rowi1[Id]' $selected>$rowi1[Airports_Address]</option>";
    }
      ?>
	<?php } ?>
	</select>
	<label>Arival Date and time:</label><input type="datetime-local" name="ADT" value="<?php echo"$rows[AriDateTime]"; ?>">
	<label>number of Seat:</label><input type="number" name="seat" placeholder="Enter Avaliable Seat"value="<?php echo"$rows[AvaiSeat]"; ?>">
	<label>Ticket Price:</label><input type="number" name="price" placeholder="Enter ticket price" value="<?php echo"$rows[TicketPrice]"; ?>">
	<input type="submit" name="submit" onclick="return update()">
<?php }} ?>
</form>
<script type="text/javascript">
	function update(){
	if(confirm("Do you want to  check once before update?")==false){
		return true;
	}else{
		return false;
	}
}
</script>
</body>
</html>