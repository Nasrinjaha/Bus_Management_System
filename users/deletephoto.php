<?php 
 include 'userauth.php';
 include '../include/connection.php';
 session_start();
 $id=$_SESSION['id'];
 $query= "UPDATE users SET img = 'NULL' where u_id=$id";
  mysqli_query($con,$query);
 header('Location: updateprofilephoto.php');
 ?>
    