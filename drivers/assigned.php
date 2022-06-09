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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <?php include 'driversnav.php'
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
                                    <div ><h2 class="text-center font-weight-light my-4"><b>Shedule</b></h2></div>
                                    <div class="card-body">
                                        
                                    <form method = "post" action="assigned.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                        
                                        <label class = "from-control">choose starting date </label>
                                        <div class="form-floating mb-3 mb-md-0">
                                        
                                            <input class="form-control" id="inputdates" name="dates" type="date" required />
                                            <label for="inputdates">date</label>
                                        </div>
                                        <br> 
                                            
                                        </div>
                                        <label class = "from-control">choose end date</label>
                                        <div class="form-floating mb-3 mb-md-0">
                                        
                                            <input class="form-control" id="inputdates2" name="dates2" type="date" required />
                                            <label for="inputdates2">date</label>
                                        </div>
                                        <br>
                                        <div class = "text-center">                      
                                            <button type="submit"  name ="submit" class="btn btn-primary" >search</button>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit'])){                                          
                                            $date1 = $_POST['dates'];
                                            $date2 = $_POST['dates2'];
                                                $var = 'Shedule.php?date1='.$date1.'&date2='.$date2;
                                                echo "<script>window.location.href='".$var."'</script>";                
                                                // $date = $_POST['d_date'];                          
                                                    // $query1 = "INSERT INTO  assigndriver(d_id,b_id,d_date,route,time)
                                                    // VALUES($did,$bid,'$date','$route','$time')";
                                                    // if(mysqli_query($con,$query1)){
                                                    //     echo '<span style= "color:green;">Successfully inserted';
                                                    // }
                                                    // else{
                                                    //     echo '<span style= "color:red;">insertion failed!!!';
                                                    // }

                                                
                                            
                                                
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