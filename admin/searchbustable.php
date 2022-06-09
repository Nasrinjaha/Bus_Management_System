<?php 
   include 'adminauth.php';
   $var = $_REQUEST['search'];
   $type = $_REQUEST['type'];
   $model = $_REQUEST['model'];
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //include 'inlude/navbar.php';
                            include '../include/connection.php';
                            $query = "select * from bus where model LIKE '$model' OR type LIKE '$type' OR b_name LIKE '$var' ";
                            if($var!="null"){
                                if($type!="null"){
                                    if($model!="null")
                                    $query = "select * from bus where model LIKE '%$model%' and type LIKE '%$type%' and b_name LIKE '%$var%' ";
                                }
                            }
                            if($var=="null"){
                                if($type!="null"){
                                    if($model!="null")
                                    $query = "select * from bus where model LIKE '%$model%' and type LIKE '%$type%' ";
                                }
                            }
                           if($var!="null"){
                                if($type!="null"){
                                    if($model=="null")
                                    $query = "select * from bus where b_name LIKE '%$var%' and type LIKE '%$type%' ";
                                }
                            }
                            if($var!="null"){
                                if($type=="null"){
                                    if($model!="null")
                                    $query = "select * from bus where model LIKE '%$model%' and b_name LIKE '%$var%' ";
                                }
                            }
                            if($var!="null"){
                                if($type=="null"){
                                    if($model=="null")
                                    $query = "select * from bus where b_name LIKE '%$var%' ";
                                }
                            }
                            if($var=="null"){
                                if($type!="null"){
                                    if($model=="null")
                                    $query = "select * from bus where type LIKE '$type' ";
                                }
                            }
                            if($var=="null"){
                                if($type=="null"){
                                    if($model!="null")
                                    $query = "select * from bus where model LIKE '%$model%' ";
                                }
                            }
                         
                              
                          
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
                        </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                        <br>
        <div class=text-center>
           <a class="btn btn-primary " href = "searchbus.php">back</a> 
        </div>
      
                       
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