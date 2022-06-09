<?php 
   include 'adminauth.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Access</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'adminnav.php'?>
        <!-- <div class="tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div class= "mytable">
         <div class = "text-center d">
          <br> <h2><b> Bus Table</b> </h2>  </div>   <br>  
        <div class = "">
        <a class = "btn btn-primary" href ="createbus.php">Create</a>
        </div>      
        <table class="table table-striped">
            <thead>
            <tr>
                 <th></th>
                <th>Bus Id</th>
                <th>Bus Name</th>
                <th>Bus Number</th>
                <th>Type</th>
                <th>Make</th>
                <th>Model</th>
                <th>Total Seat</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
             <?php
                //include 'inlude/navbar.php';
                include '../include/connection.php';
                $query = "select * from bus";
                $table = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($table)){                   
             ?>
            <tr>
            <td></td>
                    <td><?php echo $row['b_id']; ?></td>
                    <td><?php echo $row['b_name'];?></td>
                    <td><?php echo $row['b_number'];?></td>
                    <td><?php echo $row['type'];?></td>
                    <td><?php echo $row['make'];?></td>
                    <td><?php echo $row['model'];?></td>
                    <td><?php echo $row['seat'];?></td>
                    <td>
                        <a class = "btn btn-primary" href ="updatebuses.php?id=<?php  echo $row['b_id']?>">Edit</a>
                        <!-- Trigger the modal with a button -->
                        <a class = "btn btn-danger" data-toggle="modal" data-target="#myModal<?php  echo $row['b_id'];?>">Delete</a>
                        <!-- Modal -->
                        <div class="modal" id="myModal<?php  echo $row['b_id'];?>">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Confirmation!!!</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to delete <?php  echo $row['b_name'];?>?</p>
                            </div>
                            <div class="modal-footer">
                                <a class = "btn btn-success" href ="deletebus.php?id=<?php  echo $row['b_id']?>">yes</a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                            </div>
                            </div>
                            
                        </div>
                        </div>
                                                
                    </td>
                   
                </tr>
                <?php } ?>
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