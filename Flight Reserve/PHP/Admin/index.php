<?php 
include 'rolecheck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/PHP/Admin/index.css">
</head>
<body bgcolor="black">
	<div class="link">
       <ul>
         <li id="active" style="background: green;"><a href="#">Home</a></li>
         <li id="active"><a href="user.php">User/Admin</a></li>
         <li><a href="Airlines/Airlines.php">Airlines</a></li>
         <li><a href="Airports/Airports.php">Airports</a></li>
        <li><a href="Flight/Flight.php">Flight</a></li>
        <li><a href="Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
	<h1 style="margin: 10vh 40vw;"><?php echo $_SESSION['fName']." ".$_SESSION['lName']; ?></h1>
</body>
</html>