<?php
   include 'usersauth.php';
   include '../include/connection.php';
   //session_start();
   $userid = $_SESSION['id'];
   $assid = $_REQUEST['id'];
   $route = $_REQUEST['route'];
   $date = $_REQUEST['date'];
   //$bid = $_REQUEST['bid'];
   $ttime = $_REQUEST['time'];
   $date1=date("Y-m-d");
  // echo $date;
   $time=date('h:i:s',time());
   //echo $userid;
    echo $time;
   if($ttime>$time){
      $query = "insert into purchase(ass_id,user_id,date,time)

      values($assid,$userid,'$date1','$time')";
      if(mysqli_query($con,$query)){
         $var = 'buses.php?route='.$route.'&date='.$date;
         echo "<script>window.location.href='".$var."'</script>"; 
      }
      else{
         echo '<span style= "color:red;"> insertion failed!!!';
      }
   }
   else{
      echo '<span style= "font-size:4vw ;"><span style= "color:red ;"> Sorry!We can\'t accept your request!';
   }
   
   //header('Location: buses.php');
?>