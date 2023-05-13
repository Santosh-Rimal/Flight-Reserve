<?php 
include 'link.php';
	$fname=mysqli_real_escape_string($conn,$_REQUEST['fname']);
	$lname=mysqli_real_escape_string($conn,$_REQUEST['lname']);
	$address=mysqli_real_escape_string($conn,$_REQUEST['address']);
	$email=mysqli_real_escape_string($conn,$_REQUEST['email']);
	$password=mysqli_real_escape_string($conn,sha1($_REQUEST['password']));
	$cpassword=mysqli_real_escape_string($conn,sha1($_REQUEST['cpassword']));
	if($password===$cpassword){
		$sql="select Email from users where Email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo "Provided Email address is already used..";
		}
		else{
			$sqli="insert into Users(FirstName,LastName,Address,Email,Password,Role)values('$fname','$lname','$address','$email','$password','Normal User')";
			if (mysqli_query($conn,$sqli)) {
				echo"<script>alert('Successfully Registered.....')</script>";
				header("location: http://localhost/Flight Reserve/HTML/index.html");
			}
			else{
				echo "Query Failed";
			}
		}
	}
	else{
		echo "Password is not match";
	}
 ?>
