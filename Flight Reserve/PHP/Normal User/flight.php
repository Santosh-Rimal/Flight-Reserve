<?php  
include 'rolecheck.php';
$bkb=$_SESSION['Name'];
// echo $bkb;
if(isset($_POST['search'])){
if(!isset($_REQUEST['from'])){
	die("No Result Found....");
}
if(!isset($_REQUEST['to'])){
	die("No result found");
}
$ariv=$_REQUEST['from'];
// echo $ariv."<br>";
$dept=$_REQUEST['to'];
// echo $dept."<br>";
$dd=$_REQUEST['DepatureDate'];
// echo $dd."<br>";
$ad=$_REQUEST['ArivalDate'];
$way=$_POST['way']
// echo $ad."<br>";

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
			background-image: url('../../Images And Photo/Download/Plane/plane.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}li{
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
input,select{
	width: 20vw;
	height: 6vh;
	margin: 1vh auto;
	 display:inline-block;
}
form{
	text-align: center;
}
label{
	display:inline-block;
	 width: 44%;	
	 border-radius: 10px;
	 color: white;
	 font-size: 20px;
}
	</style>
</head>
<body>
	<div class="link">
       <ul>

        <li id="active"><a href="index.php">Home</a></li>
         <li><a href="">Result</a></li>
         <li  style="background-color: red;"><a href="../Logout.php" >Logout</a></li>
      </ul>
   </div>
<?php
$sql="SELECT flight.fid,airlines.AirlineName,airlines.Airline_ImageLogo,flight.FlightNumber,flight.DepLocation,flight.AriLocation,flight.DepDateTime,flight.AriDateTime,flight.AvaiSeat,flight.TicketPrice FROM flight JOIN airlines ON flight.Airline_id=airlines.Id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		if($ariv==$row['AriLocation']&$dept==$row['DepLocation']){
			$fid=$row['fid'];
			$adate=$row['AriDateTime'];
			$adate=explode("T",$adate);
			// print_r($adate);
			$ddate=$row['DepDateTime'];
			$ddate=explode("T",$ddate);
			// print_r($ddate);
			for($i=0;$i<2;$i++){
				if($way=='twoway'){
				if($adate[$i]==$ad&&$ddate[$i]==$dd){
					$true="true";
					break;
				}
				else{
					$true="";
				}
			}
			if($way=='oneway'){
				if($ddate[$i]==$dd){
					$true="true";
					break;
				}
				else{
					$true="";
				}
			}
			}
			if($true=="true"){
		$sqli="select * from Airports";
		$resulti=mysqli_query($conn,$sqli);
		if(mysqli_num_rows($resulti)>0){
			while($rowi=mysqli_fetch_assoc($resulti)){
				if($way=='twoway'){
				if($ariv==$rowi['Id']){
					$AL=$rowi['Airports_Address'];
				}
				if($dept==$rowi['Id']){
					$DL=$rowi['Airports_Address'];
				}
			}
			if($way=='oneway'){
				if($dept==$rowi['Id']){
					$DL=$rowi['Airports_Address'];
				}
			}
			}
			?>
			<a href="#">&times</a>
   <div class="content" style="width: 54vw; margin: 2vh auto;  background-color: rgba(0,0,0,0.5); font-size: 20px; color: white;">
   	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
   		<input type="hidden" name="bkb" value="<?php echo $bkb;?>" >
   		<input type="hidden" name="way" value="<?php echo $way;?>" >
   	<div style="width: 100px; height: 100%">
   		<img src="../../Photos/Airlines/<?php echo"$row[Airline_ImageLogo]"; ?>" height="auto" width="100%"></div>
   		<label>Airline Name:</label><input type="text" name="AN" value="<?php echo "$row[AirlineName]";?>" readonly> 
   		<label>Flight Number:</label><input type="text" name="FN" value="<?php echo "$row[FlightNumber]";?>" readonly> 
   		<input type="hidden" name="FID" value="<?php echo $fid; ?>">
   		<?php if($way=='twoway'){ ?>
   		<label>Arival Location:</label><input type="text" name="A" value="<?php echo $AL;?>" readonly>   
   		<label>Arival Time and date:</label><input type="datetime-local" name="ADT" value="<?php echo"$row[AriDateTime]";?>" readonly>
   		<?php } ?> 
   		<label>Depature Location:</label><input type="text" name="D" value="<?php echo $DL;?>" readonly>  
   		<label>Depature Time and date:</label><input type="datetime-local" name="DDT" value="<?php echo"$row[DepDateTime]";?>" readonly>   
   		<label>Available Ticket:</label><input type="text" name="AS" value="<?php echo "$row[AvaiSeat]";?>" readonly>
   		<label>Price:</label><input type="text" name="P" value="<?php echo "$row[TicketPrice]";?>" readonly>
   		<label>How many Ticket You want:</label><input type="number" name="numot" placeholder="How many ticket you want">
   		<input type="submit" name="submit">
   		</form>
   </div>
	<?php
		}
		}
		else{
			echo "<h1 style='color:red;position:absolute;background-color:rgba(255,255,255,0.1);left:50%;top:50%;transform:translate(-50%,-50%);'>Sorry No Result Found....</h1>";
		}
	}
	else{
		echo "<h1 style='color:red;position:absolute;background-color:rgba(255,255,255,0.1);left:50%;top:50%;transform:translate(-50%,-50%);'>Sorry No Result Found....</h1>";
	}

}
}
?>
</body>
</html>
<?php } ?>
 <?php 
 if(isset($_POST['submit'])){
$fid=$_POST['FID'];
$AS=$_POST['AS'];
$FN=$_POST['FN'];
$bkb=$_POST['bkb'];
$way=$_POST['way'];
$numot=$_POST['numot'];
?>
<?php 
if($AS>=$numot){
if($AS>=1){
for($i=0;$i<$numot;$i++){
 ?>
 <div class="submit" id="show">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
	<input type="text" name="name[]" placeholder="Passenger Name">
	<input type="number" name="number[]" placeholder="Phone Number">
	<input type="text" name="address[]" placeholder="Address">
	<?php } ?>
	<input type="hidden" name="fid" value="<?php echo $fid; ?>">
	<input type="hidden" name="FN" value="<?php echo $FN; ?>">
	<input type="hidden" name="way" value="<?php echo $way; ?>">
	<input type="hidden" name="numot" value="<?php echo $numot; ?>">
	<input type="submit" name="bsubmit" onclick="return submt()">
	</form>
</div>
<script type="text/javascript">
	function submt(){
		if(confirm("You cannot reschedul and delete your flight after booked")==false){
			return false;
		}else{
			return true;
		}
	}
</script>
<style type="text/css">
	input{
	width: 20vw;
	height: 6vh;
	margin: 1vh auto;
	 display:block;
	}
	#show{
		margin-top: 10vh;
	}
</style>
<?php }else{echo"<h1>All Flight Are Booked Already</h1>";}}else{echo"<h1>You cannot buy more than $AS Ticket</h1>";}} ?>
<?php 
if(isset($_POST['bsubmit'])){
	$name=$_POST['name'];
	$number=$_POST['number'];
	$address=$_POST['address'];
	$fid=$_POST['fid'];
	$way=$_POST['way'];
	$FN=$_POST['FN'];
	$numot=$_POST['numot'];
	$sql="insert into booked_flight(Fid,Pname,Pnumber,Paddress,trip,booked_by)values";
	for ($i=0; $i < $numot ; $i++) { 
	$sql.="('$fid','".$name[$i]."','".$number[$i]."','".$address[$i]."','$way','$bkb'),";
	}
	$sql=rtrim($sql,',');
	if(mysqli_query($conn,$sql)){
	$sql="update flight set AvaiSeat=AvaiSeat-$numot where FlightNumber='$FN'";
}
	if(mysqli_query($conn,$sql)){
		$_SESSION['status']="<script>alert('Successfully booked')</script>";
		header("location: http://localhost/Flight Reserve/PHP/Normal User/index.php");		
		}
	}
 ?>