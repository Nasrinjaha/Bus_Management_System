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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <?php include 'usersnav.php'
        ?>
        <!-- <div class="tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- <div class="card shadow-lg border-0 rounded-lg mt-5"> -->
                                    <div ><h2 class="text-center font-weight-light my-4"><b>Purchase Ticket</b></h2></div>
                                    <div class="card-body">
                                        
                                    <form method = "post" action="getticket.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label class = "from-control">choose route</label>
                                        <select name = "route" class="form-control">
                                            <option value="NULL">--choose route--</option>
                                            <?php 
                                            include '../include/connection.php';
                                            $query = "select * FROM route";
                                            
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['r_id'];?>"><?php echo $row['stod'];?></option>
                                                <?php } ?>
                                                </select>
                                            
                                        </div>
                                        <label class = "from-control">choose date</label>
                                        <div class="form-floating mb-3 mb-md-0">
                                        
                                            <input class="form-control" id="inputdate" name="date" type="date"  />
                                            <label for="inputdate">date</label>
                                        </div>
                                        <br>
                                        <div class = "text-center">                      
                                            <button type="submit"  name ="submit" class="btn btn-primary" >search</button>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit'])){
                                            $tdate=date("Y-m-d");
                                            $route = $_POST['route'];
                                            $date = $_POST['date'];
                                            if($route=="NULL"){
                                                echo '<span style= "color:red;">Select a route please!';
                                            }
                                            else{
                                                if($tdate>$date){
                                                    echo '<span style= "color:red;">Enter a valid Date!';
                                                }
                                                else{
                                                    $var = 'buses.php?route='.$route.'&date='.$date;
                                                    echo "<script>window.location.href='".$var."'</script>";                
                                                    }
                                                
                                                    
                                                }                               
                                         }
                                        
                                        ?> 
                                            </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        
        <!-- </div> -->
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        </div>
        
        
    </body>
</html>