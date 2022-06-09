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
        <!-- <div class = "tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card  border-0 rounded-lg mt-5">
                                    <div ><h3 class="text-center font-weight-light my-4">Create City</h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="createcity.php" enctype="multipart/form-data">                                           
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputname" name="city_name" type="text" placeholder="write cityname" required />
                                                <label for="inputname">Name</label>
                                            </div>                      
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button name="submit" type = "submit" class="btn btn-primary btn-block" >Create City</a></div>
                                            </div>
                                            <?php
                                                include '../include/connection.php';
                                                if(isset($_POST['submit'])){
                                                    $name =   $_POST['city_name'];
                                                    $query1 = "INSERT INTO city(c_name)
                                                    VALUES('$name')";
                                                        if(mysqli_query($con,$query1)){
                                                                echo '<span style= "color:green;">Successfully inserted';
                                                        }
                                                        else{
                                                            echo '<span style= "color:red;">insertion failed';
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
            
        </div>
        
        
               </div>
               <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        </div>
        
        <!-- </div> -->
        
    </body>
</html>
