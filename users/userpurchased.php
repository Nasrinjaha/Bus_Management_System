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
          <br> <h2><b> My Purchases</b> </h2>  </div>   <br>  
        <div class = "">
        <!-- <a class = "btn btn-primary" href ="createbus.php">Create</a> -->
        </div>      
        <table class="table table-striped">
            <thead>
            <tr>
                 <th></th>
                <th>Ticket Id</th>
                <th>Bus Name</th>
                <th>Driver</th>
                <th>Purchased Date</th>
                <th>Purchased Time</th>
                <th>Travel Date</th>
                <th>Travel Time</th>
                <th>seat</th>
                
            </tr>
            </thead>
            <tbody>
            <form method = "GET">
             <?php
                //include 'inlude/navbar.php';
                include '../include/connection.php';
                //session_start();
                $uid = $_SESSION['id'];
                $query = "select * from purchase where user_id='$uid'";
                $table = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($table)){                   
             ?>
            <tr>
            <td></td>
                    <?php
                      $id = $row['ass_id'];
                      $query1 = "select * from assigndriver where id='$id' ";
                      $table1 = mysqli_query($con,$query1);
                      $row1 = mysqli_fetch_array($table1);
                      
                     
                      $did = $row1['d_id'];
                      $query2 = "select * from drivers where d_id='$did' ";
                      $table2 = mysqli_query($con,$query2);
                      $row2 = mysqli_fetch_array($table2);


                      $bid = $row1['b_id'];
                      $query3 = "select * from bus where b_id='$bid' ";
                      $table3 = mysqli_query($con,$query3);
                      $row3 = mysqli_fetch_array($table3);
                      
                      ?>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row3['b_name'];?></td>
                      <td><?php echo $row2['name'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td><?php echo $row['time'];?></td>
                      <td><?php echo $row1['d_date'];?></td>
                      <td><?php echo $row1['time'];?></td>
                      <td><?php echo $row['seat'];?></td>
                   
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