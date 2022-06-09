<?php 
   include 'adminauth.php';
   $var = $_REQUEST['search'];
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
          <br> <h2><b> Drivers Table</b> </h2>  </div>   <br> 
          <div class = "">
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
            </tr>
            </thead>
            <tbody>
             <?php
                //include 'inlude/navbar.php';
                include '../include/connection.php';
                $query = "select * from drivers where name LIKE '%$var%' OR address LIKE '%$var%' OR dob LIKE '%$var%'  OR gender LIKE '%$var%' ";
                $table = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($table)){                   
             ?>
            <tr>
            <td></td>
                    <td><?php echo $row['d_id'];?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        <br>
        <div class=text-center>
           <a class="btn btn-primary " href = "searchdrivers.php">back</a> 
        </div>
      
               <!-- </div>             -->
        </div>
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
        </div>
        </div>
    </body>
</html>