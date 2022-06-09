<?php 
   include 'adminauth.php';
   include '../include/connection.php';
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
                                    <div ><h3 class="text-center font-weight-light my-4">Route Table</h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="createroute1.php" enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputnum" name="number" type="number" placeholder=" enter the number of station" />
                                                <label for="inputnum">Number Of Station</label>
                                          </div>
                                        <div class = "text-center">                      
                                            <button type="submit"  name ="submit" class="btn btn-primary" >Create</button>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit'])){
                                            $num = $_POST['number'];
                                            // $date = $_POST['d_date']; 
                                            if($num>=2){
                                                $var = 'createroute.php?num='.$num;
                                                echo "<script>window.location.href='".$var."'</script>";    
                                            }
                                            else{
                                                echo '<span style= "color:red;">Enter a number which is grater than 1 !!!';
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
