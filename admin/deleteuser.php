<?php
   include 'adminauth.php';
   include '../include/connection.php';
   $uid = $_REQUEST['id'];
   $query = "delete from users where u_id = $uid ";
   mysqli_query($con,$query);
   header('Location: users.php');
?>