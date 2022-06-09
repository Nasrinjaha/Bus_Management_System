<?php 
 include 'driversauth.php';
 include '../include/connection.php';
 session_start();
 $id=$_SESSION['id'];
 $query= "UPDATE drivers SET img = 'NULL' where d_id=$id";
  mysqli_query($con,$query);
 header('Location: updateprofilephoto.php');
 ?>
    