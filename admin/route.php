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
    </head>
    <body>
        <?php include 'adminnav.php'?>
        <!-- <div class= "tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card  border-0 rounded-lg mt-5">
                                    <div ><h3 class="text-center font-weight-light my-4"> Create Route </h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="route.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label class = "from-control">choose source</label>
                                        <select name = "source" class="form-control">
                                            <option value="NULL">--choose Source--</option>
                                            <?php 
                                            include '../include/connection.php';
                                            $query = "select * FROM city";
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['c_name'];?>"><?php echo $row['c_name'];?></option>
                                                <?php } ?>
                                                </select>
                                            
                                        </div>
                                        <br>
                                        <div class="form-group">
                                        <label class = "from-control">choose Destination</label>
                                        <select name = "destination"  id="" class="form-control">
                                            <option value="NULL">--choose Destination--</option>
                                            <?php 
                                            $query = "select * FROM city";
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['c_name'];?>"><?php echo $row['c_name'];?></option>
                                                <?php } ?>
                                                </select>
                                            
                                        </div>
                                        <br>
                                       
                                        <div class = "text-center">                      
                                            <button type="submit"  name ="submit" class="btn btn-primary" >save</button>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit'])){
                                            $s = $_POST['source'];
                                            $d = $_POST['destination'];
                                            $stod="$s ".'to'." $d";
                                             if($s=="NULL" and $d=="NULL"){
                                                echo '<span style="color:red;">Choose Source and Destination!!!';
                                             }
                                             else if($s=="NULL"){
                                                echo '<span style="color:red;">Choose Source !!!';
                                             }
                                             else if($d=="NULL"){
                                                echo '<span style="color:red;">Choose Destination!!!';
                                             }
                                             else{
                                                    $query1 = "INSERT INTO  route(stod)
                                                    VALUES('$stod')";
                                                    if(mysqli_query($con,$query1)){
                                                        echo '<span style= "color:green;">Successfully inserted';
                                                    }
                                                    else{
                                                        echo '<span style= "color:red;">insertion failed!!!';
                                                    }
                                             }     
                                                
                                            }                               
                                        
                                    
                                        ?> 
                                        </form>

                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        <!-- </div> -->
        
        
               </div>
        </div>
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        
       </div>
       
    </body>
</html>
