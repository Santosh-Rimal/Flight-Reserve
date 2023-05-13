<?php 
include '../rolecheck.php';
if(isset($_SESSION['upf'])){
  echo $_SESSION['upf'];
  unset($_SESSION['upf']);
}else{
  echo"";
}
if(isset($_SESSION['af'])){
  echo $_SESSION['af'];
  unset($_SESSION['af']);
}else{
  echo"";
}
if(isset($_SESSION['df'])){
  echo $_SESSION['df'];
  unset($_SESSION['df']);
}else{
  echo"";
}
$limit=1;
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flight</title>
   <link rel="stylesheet" type="text/css" href="../../../CSS/PHP/Admin/Flight/Flight.css">
 </head>
 <body>
  <div class="main">
<div class="link">
       <ul>

        <li id="active"><a href="../index.php">Home</a></li>
         <li><a href="../user.php">User/Admin</a></li>
         <li><a href="../Airlines/Airlines.php">Airlines</a></li>
         <li><a href="../Airports/Airports.php">Airports</a></li>
        <li style="background: green;"><a href="Flight.php">Flight</a></li>
        <li><a href="../Result/result.php">Booked Flight</a></li>
        <li class="logout"><a href="../Logout.php" class="logout">Logout</a></li>
      </ul>
   </div>
   <?php 
  if(isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
  }
  else{
    $page=1;
  }
  $offset=($page-1)*$limit;

  $sql="select * from flight inner join Airlines on flight.Airline_id=Airlines.Id limit $offset,$limit";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){ 
  ?>
    <div class="table">
      <?php  
      $sqli="select * from Airports";
      $resulti=mysqli_query($conn,$sqli);
      if (mysqli_num_rows($resulti)>0) {
      ?>
       <table border="1px" cellspacing="0" cellpadding="10px">
  <tr>
    <th rowspan="2">ID</th>
    <th rowspan="2">Airline Name</th>
    <th rowspan="2">Flight Number</th>
    <th rowspan="2">Depacture and Arival Location,date and Time</th>
    <th rowspan="2">Avaliable Seat of plane</th>
    <th rowspan="2">Price of Ticket</th>
    <th colspan="2">Action</th>
  </tr>
  <tr>
  <th>Update</th>
  <th>Delete</th>
   </tr>
   <?php 
   while($row=mysqli_fetch_assoc($result)){
   ?>
   <tr>
    <td><?php echo "$row[fid]"; ?></td>
    <td><?php echo "$row[AirlineName]"; ?></td>
    <td><?php echo "$row[FlightNumber]"; ?></td>
    <td><?php while($rowi=mysqli_fetch_assoc($resulti)){ 
      if($rowi['Id']==$row['DepLocation']){
      echo"Depatcure location: $rowi[Airports_Address]<br>Depature Time:<input type='datetime-local' value='$row[DepdateTime]' readonly style='border:none;'> <br>";
    }

      ?>
    <?php if($rowi['Id']==$row['AriLocation']){ 
      echo"Arival Location: $rowi[Airports_Address]<br>Arival Time:Depature Time:<input type='datetime-local' value='$row[AriDateTime]' readonly style='border:none;'> <br>"; } 
    }?>
      
    </td>
    <td><?php echo "$row[AvaiSeat]"; ?></td>
    <td><?php echo "$row[TicketPrice]"; ?></td>
    <td><a href="Update_Flight.php?id=<?php echo "$row[fid]"; ?>">Update</a></td>
    <td><a href="Delete_Flight.php?id=<?php echo "$row[fid]"; ?>" onclick="return del()">Delete</a></td>
   </tr>

<?php  } ?>
 </table>
<?php } } ?>
<?php 
$sql1="select * FROM flight";
$result1=mysqli_query($conn,$sql1);
if (mysqli_num_rows($result1)>0) {
$total_records=mysqli_num_rows($result1);
$total_page=ceil($total_records/$limit);
?>
 <?php 
echo "<ul>";
for($i=1;$i<=$total_page;$i++){
  echo '<li><a href="Flight.php?page='.$i.'"</a>'.$i.'</li>';
}
echo "</ul>";
}
?>
  <ul>
 <li><a href="Add_flight.php" class="addflight">Add Flight</a>
  </li>
 </ul>
 </div>
 </div>
 <script type="text/javascript">
   function del(){
    if(confirm("Do you really want to delete?")==false){
      return false;
    }else{
      return true;
    }
   }
 </script>
 </body>
 </html>