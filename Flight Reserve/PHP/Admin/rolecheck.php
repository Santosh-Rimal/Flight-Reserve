<?php  
include 'Link.php';
if($_SESSION['Role']=='Normal User'){
 header("location: http://localhost/Flight Reserve/PHP/Normal User/index.php");
}
?>