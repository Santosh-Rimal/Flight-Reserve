<?php
if (isset($_REQUEST['submit'])) {
$conn=mysqli_connect('localhost','root','','flight') or die("Connection error"."".mysqli_connec_error());
$email=mysqli_real_escape_string($conn,$_REQUEST['username']);
$password=mysqli_real_escape_string($conn,sha1($_REQUEST['password']));
$sql="select User_Id,FirstName,LastName,Email,Role from Users where Email='$email' and Password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while ($rows=mysqli_fetch_assoc($result)) {
		session_start();
		$_SESSION['Name']=$rows['Email'];;
		$_SESSION['fName']=$rows['FirstName'];
		$_SESSION['lName']=$rows['LastName'];
		$_SESSION['Id']=$rows['Id'];
		$_SESSION['Role']=$rows['Role'];
		if($_SESSION['Role']=='Admin'){
    header("location: http://localhost/Flight Reserve/PHP/Admin/index.php");
}else{
    header("location: http://localhost/Flight Reserve/PHP/Normal User/index.php");
}
	}
}
else{
		echo "Email and password doesn't match";
	}
}
?>