<?php  
include '../Link.php';
if($_SESSION['Role']=='Admin'){
 header("location: http://localhost/Flight Reserve/PHP/Admin/index.php");
}
?>