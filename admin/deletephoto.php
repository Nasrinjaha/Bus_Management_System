 <?php 
 include 'adminauth.php';
 include '../include/connection.php';
 session_start();
 $id=$_SESSION['id'];
 $query= "UPDATE admin SET img = 'NULL' where a_id=$id";
  mysqli_query($con,$query);
 header('Location: uploadprofilephoto.php');
 ?>
    