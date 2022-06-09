<?php
   include 'adminauth.php';
   include '../include/connection.php';
   $did = $_REQUEST['id'];
   $query = "delete from drivers where d_id = $did ";
   mysqli_query($con,$query);
   header('Location: drivers.php');
?>