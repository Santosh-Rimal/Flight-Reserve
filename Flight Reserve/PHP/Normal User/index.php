<?php  
include 'rolecheck.php';
if(!isset($_SESSION['status'])){
	$_SESSION['status']='';
}else{
}
echo $_SESSION['status'];
unset($_SESSION['status']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<style type="text/css">
		*{
			margin: 0;
		}
		body{
			background-image: url('../../Images And Photo/Download/Plane/plane.jpg');
			background-size: cover;
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
	width: 30vw;
	height: 6vh;
	margin: 2vh auto;
	display: block;
}
input[type='radio']{
	display: inline;
	height: 4vh;
	margin: 0;
	width: 1vw;
}
label.radio{
display: inline-block;
}
form{
	text-align: center;
}
	</style>
</head>
<body>
	<div class="link">
       <ul>

        <li id="active"><a href="index.php">Home</a></li>
         <li><a href="result.php">Result</a></li>
         <li  style="background-color: red;"><a href="../Logout.php" >Logout</a></li>
      </ul>
   </div>
	<?php  
	$sql="select * from Airports";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
	?>
<form action="flight.php" method="post">
	<label>From:</label>
<select name="from" required>
	<option disabled selected>Where are you from</option>
	<?php  
	while ($row=mysqli_fetch_assoc($result)) {
	echo "<option value='$row[Id]'>$row[Airports_Address]</option>";
	}
}
	?>
</select>
<label>To:</label>
<select name="to" required>
	<option disabled selected>Where do you want to go</option>
	<?php  
	$sqls="select * from Airports";
	$results=mysqli_query($conn,$sqls);
	if (mysqli_num_rows($results)>0) {
	?>
	<?php  
	while ($rows=mysqli_fetch_assoc($results)) {
	echo "<option value='$rows[Id]'>$rows[Airports_Address]</option>";
	}
}
	?>
</select> 
<label class="radio">Your Trip:</label><input type="radio" name="way" value="oneway" id="ow" onclick="sh()" required>One Way
<input type="radio" name="way" value="twoway" id="tw" onclick="sh()" required>Two Way<br><br>
<label>Depature Date:</label><input type="date" name="DepatureDate" id="onw" required>
<label id="ad">Arival Date:</label><input type="date" name="ArivalDate" id="tww">
<input type="submit" name="search" value="Search">
</form>
<script type="text/javascript">
		function sh() {
			if(document.getElementById('ow').checked){
				document.getElementById('tww').style.display='none';
				document.getElementById('ad').style.display='none';
			}
			else{
				document.getElementById('ad').style.display='';
				document.getElementById('tww').style.display='';
			}
			}
</script>
</body>
</html>