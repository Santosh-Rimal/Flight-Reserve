<?php 
include 'rolecheck.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>User List</title>
   <link rel="stylesheet" type="text/css" href="../../CSS/PHP/Admin/index.css">
 </head>
 <body>
  <div class="main">
<div class="link">
       <ul>
        <li id="active"><a href="index.php">Home</a></li>
         <li id="active" style="background: green;"><a href="#">User/Admin</a></li>
         <li><a href="Airlines/Airlines.php">Airlines</a></li>
         <li><a href="Airports/Airports.php">Airports</a></li>
        <li><a href="Flight/Flight.php">Flight</a></li>
        <li><a href="Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
 	<?php
 	 $sql="select User_Id,FirstName,LastName,Address,Email,Role from Users";
 	$result=mysqli_query($conn,$sql);
 	if(mysqli_num_rows($result)>0){
 	 ?>
    <div class="table">
       <table border="1px" cellspacing="0" cellpadding="10px">
 	<tr>
 		<th rowspan="2">ID</th>
 		<th colspan="2">Name</th>
 		<th rowspan="2">Address</th>
 		<th rowspan="2">Email</th>
 		<th rowspan="2">Role</th>
 		<th colspan="2">Action</th>
 	</tr>
 	<th>First Name</th>
 	<th>Last Name</th>
  <th>Update</th>
  <th>Delete</th>
 	<?php while ($rows=mysqli_fetch_assoc($result)) {
 	 ?>
 	 <tr>
 	 	<td><?php echo "$rows[User_Id]."; ?></td>
 	 	<td><?php echo "$rows[FirstName]"; ?></td>
 	 	<td><?php echo "$rows[LastName]"; ?></td>
 	 	<td><?php echo "$rows[Address]"; ?></td>
 	 	<td><?php echo "$rows[Email]"; ?></td>
 	 	<td><?php echo "$rows[Role]"; ?></td>
 	 	<td><a href="Update_User.php?id=<?php echo "$rows[User_Id]" ?>">Update</a></td>
 	 	<td><a href="Delete_User.php?id=<?php echo "$rows[User_Id]" ?>">Delete</a></td>
 	 </tr>
<?php } ?>
 </table>
 <?php } ?>
 <ul>
 <li><a href="Add_User.php" class="adduser">Add Users</a>
  </li>
 </ul>
 </div>
 </div>
 <script type="text/javascript" src="../../Java Script/PHP/all.js"></script>
 </body>
 </html>