<?php 
   include 'usersauth.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Access</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'usersnav.php'?>
        <!-- <div class="tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div class= "mytable">
         <div class = "text-center d">
          <br> <h2><b> Bus Table</b> </h2>  </div>   <br>  
        <div class = "">
        <!-- <a class = "btn btn-primary" href ="createbus.php">Create</a> -->
        </div>      
        <table class="table table-striped">
            <thead>
            <tr>
                 <th></th>
               
                <th>Bus Name</th>
                <th>Bus Number</th>
                <th>Type</th>
                <th>Total Seat</th>
                <th>Purchased</th>
                <th>Driver</th>
                <th>Time</th>
                <th>Route</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <form method = "GET">
             <?php
                //include 'inlude/navbar.php';
                include '../include/connection.php';
                //$ex = explode("?".)
                $route = $_REQUEST['route'];
                $date = $_REQUEST['date'];
                //echo $route;
                
                //dfecho $date;
                $query = "select * from assigndriver where r_id='$route' AND d_date='$date'  ";
                $table = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($table)){                   
             ?>
            <tr>
            <td></td>
                    <?php
                      $assnid=$row['id']; 
                      $querycnt = "select count(id) as cnt from purchase where ass_id=$assnid";
                      $tablecnt = mysqli_query($con,$querycnt);
                      $rowcnt = mysqli_fetch_array($tablecnt);
                      $bid = $row['b_id'];
                      $query2 = "select * from assigndriver where id = $assnid";
                      $table2= mysqli_query($con,$query2);
                      $row2= mysqli_fetch_array($table2);
                      date_default_timezone_set('Asia/Dhaka');
                      $date = date("Y-m-d");
                      $time = date('H:m:s ');
                      $ttime = $row2['time'];
                      $tdate = $row2['d_date'];
                      $query = "select * from bus where b_id='$bid' ";
                      $table1 = mysqli_query($con,$query);
                      $row1 = mysqli_fetch_array($table1);?>
                      <td><?php echo $row1['b_name'];?></td>
                      <td><?php echo $row1['b_number'];?></td>
                      <td><?php echo $row1['type'];?></td>
                      <td><?php echo $row1['seat'];?></td>
                      <td><?php echo $rowcnt['cnt'];?></td>
                      
                      <?php 
                      $id = $row['d_id'];
                      $query = "select * from drivers where d_id='$id' ";
                      $table2 = mysqli_query($con,$query);
                      $row2 = mysqli_fetch_array($table2);?>
                      <td><?php echo $row2['name'];?></td>
                      <td><?php echo $row['time'];?></td>
                      <td><?php echo $row['stations'];?></td>
                      <td>

                        <!-- Trigger the modal with a button -->
                         <?php 
                         if($rowcnt['cnt']==$row1['seat']){ 
                                    echo "There is no available seat";
                         }
                         else if($ttime<$time && $tdate==$date){
                            echo "Time is over";
                         }
                         else{?>
                               <a class = "btn btn-success" href ="seat.php?bid=<?php  echo $bid.'&aid='.$assnid.'&route='.$route?>">Purchase</a>       
                        <?php } ?>

                    </td>
                   
                </tr>
                <?php } ?>
                </form>
            </tbody>
        </table>
        </div>
               </div>            
        <!-- </div>
                </div> -->
                
        <!-- </div> -->
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
        </div>
    </body>
</html>