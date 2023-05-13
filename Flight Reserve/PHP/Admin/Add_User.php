<?php 
include 'rolecheck.php';
if(isset($_REQUEST['submit'])){
	$fname=mysqli_real_escape_string($conn,$_REQUEST['fname']);
	$lname=mysqli_real_escape_string($conn,$_REQUEST['lname']);
	$address=mysqli_real_escape_string($conn,$_REQUEST['address']);
	$email=mysqli_real_escape_string($conn,$_REQUEST['email']);
	$password=mysqli_real_escape_string($conn,sha1($_REQUEST['password']));
		$sql="select Email from users where Email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo "Provided Email address is already used..";
		}
		else{
			$sqli="insert into Users(FirstName,LastName,Address,Email,Password,Role)values('$fname','$lname','$address','$email','$password','Normal User')";
			if (mysqli_query($conn,$sqli)) {
				header("location: http://localhost/Flight Reserve/PHP/Admin/index.php");
			}
			else{
				echo "Query Failed";
			}
		}
		}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flight-Reserve</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/PHP/Admin/AddUsers.css">
</head>
<body>
		<div class="AddUsers" id="AU">
		<form id="register_info" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" name="fname" placeholder="Enter your First Name" required onfocus >
				<input type="text" name="lname" placeholder="Enter your Last Name" required onfocus>
				<input type="text" name="address" placeholder="Enter your Address" required onfocus>
				<input type="email" name="email" id="emailadd" placeholder="Valid Email Address" required autocomplete="off">
				<input type="password" name="password" placeholder="password" required autocomplete="off">
				<input type="submit" value="Add" name="submit">
			</form>
	</div>
</body>
</html>