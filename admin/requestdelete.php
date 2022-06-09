<?php
   include 'adminauth.php';
   include '../include/connection.php';
   $id = $_REQUEST['id'];
   $query = "delete from request where req_id = $id ";
   mysqli_query($con,$query);
   header('Location: request.php');
?>