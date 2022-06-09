<?php 
   include 'driversauth.php';
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
        <?php include 'driversnav.php'?>
        <!-- <div class="tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div class= "mytable">
         <div class = "text-center d">
          <br> <h2><b> Shedule Table</b> </h2>  </div>   <br>  
        <div class = "">
        <!-- <a class = "btn btn-primary" href ="createbus.php">Create</a> -->
        </div>      
        <table class="table table-striped">
            <thead>
            <tr>
                 <th></th>
                <th>Bus Name</th>
                <th>Bus Number</th>
                <th>Road</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            <form method = "GET">
             <?php
                //include 'inlude/navbar.php';
                include '../include/connection.php';
                //$ex = explode("?".)
                $id=$_SESSION['id'];
                $date1 = $_REQUEST['date1'];
                $date2 = $_REQUEST['date2'];
                //echo $route;
                
                //dfecho $date;
                $query = "select * from assigndriver where d_date>='$date1' AND d_date<='$date2' AND d_id='$id'  ";
                $table = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($table)){                   
             ?>
            <tr>
                    <td></td>
                    <?php
                      $b_id=$row['b_id'];
                      $querycnt = "select * from bus where b_id=$b_id";
                      $tablecnt = mysqli_query($con,$querycnt);
                      $rowcnt = mysqli_fetch_array($tablecnt);

                      $rid = $row['r_id'];
                      $query = "select * from route where r_id='$rid' ";
                      $table2 = mysqli_query($con,$query);
                      $row2 = mysqli_fetch_array($table2);?>

                      <td><?php echo $rowcnt['b_name'];?></td>
                      <td><?php echo $rowcnt['b_number'];?></td>
                      <td><?php echo $row2['stod'];?></td>
                      <td><?php echo $row['d_date'];?></td>
                      <td><?php echo $row['time'];?></td>
                        
                   
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