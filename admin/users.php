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
        <!-- <link href="../css/style2.css" rel="stylesheet" /> -->
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- <script src="../js/modalscript1.js"></script>
        <script src="../js/modalscript2.js"></script> -->

    </head>
    <body>
        <?php include 'adminnav.php'?>
        <!-- <div class="tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div class= "mytable">
         <div class = "text-center d">
          <br> <h2><b> Users Table</b> </h2>  </div>   <br> 
          <div class = "">
        <a class = "btn btn-primary" href ="createuser.php">Create</a>
        </div>          
        <table class="table table-striped">
            <thead>
            <tr>
                 <th></th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
             <?php
                //include 'inlude/navbar.php';
                include '../include/connection.php';
                $query = "select * from users";
                $table = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($table)){                   
             ?>
            <tr>
            <td></td>
                    <td><?php echo $row['u_id'];?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td>
                        <a class = "btn btn-primary" href ="updateuser.php?id=<?php  echo $row['u_id']?>">Edit</a>
                        <!-- Trigger the modal with a button -->
                        <a class = "btn btn-danger" data-toggle="modal" data-target="#myModal<?php  echo $row['u_id'];?>">Delete</a>
                        <!-- Modal -->
                        <div class="modal" id="myModal<?php  echo $row['u_id'];?>">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Confirmation!!!</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to delete <?php  echo $row['name'];?>?</p>
                            </div>
                            <div class="modal-footer">
                                <a class = "btn btn-success" href ="deleteuser.php?id=<?php  echo $row['u_id']?>">yes</a>
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
               <!-- </div>             -->
        </div>
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
        </div>
        </div>
    </body>
</html>