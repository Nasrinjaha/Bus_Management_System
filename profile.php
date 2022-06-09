<?php 
  include 'include/connection.php';
  $mail=$_REQUEST['email'];
  $pass=$_REQUEST['pass'];
  session_start();
  $query = "select * FROM users WHERE email ='$mail' AND  pass = '$pass' ";
  $table = mysqli_query($con,$query);
  $row = mysqli_fetch_array($table);
 
  if($row){
    $_SESSION['isloggedin'] = 'yes';
    $_SESSION['user'] = 'users';
    $_SESSION['id']=$row['u_id']; 
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    header('Location: users/profile.php');
  }
  else{
    echo "<span style = 'color:red;'>Invalid mail or pass.Please try again";
  }       
?>