<?php
   include 'adminauth.php';
   include '../include/connection.php';
   $bid = $_REQUEST['id'];
   $query = "delete from bus where b_id = $bid ";
   mysqli_query($con,$query);
   header('Location: buses.php');
?>