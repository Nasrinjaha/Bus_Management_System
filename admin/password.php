<?php         // session_start();
               include 'adminauth.php';
               include '../include/connection.php';
               //session_start();
               $aid =  $_SESSION['id'];
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
        <style>
        .update {
        padding-left:30%;
        }
      </style>
    </head>
    <body>
        <?php  include 'adminnav.php'; ?>
        <!-- <div class = "tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- <div class="card shadow-lg border-0 rounded-lg mt-5"> -->
                                    <div ><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <form method = "post">
                                            <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputnewpass" name="newpass" type="password" />
                                                            <label for="inputnewpass">New Pass</label>
                                            </div>
                                            <br>
                                            <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputconfirmnewpass" name="confirmnewpass" type="password" />
                                                        <label for="inputconfirmnewpass">Confirm New Pass</label>
                                             </div>
                                             <br>
                                            <div class = "row">
                                                <div class = "col-sm-6 update" >
                                                <button type="submit"  name ="update" class="btn btn-primary" >update</button>
                                                </div>
                                                <div class = "col-sm-6">
                                                <a class="btn btn-primary" href = "updatepassword.php">back</a> 
                                            </div>
                                            <?php
                                            if(isset($_POST['update'])){                         
                                            $pass1 =   $_POST['newpass'];
                                            $pass2 =   $_POST['confirmnewpass'];
                                                if($pass1 == $pass2){
                                                    $query1 = "update admin set pass = '$pass1' where a_id = $aid";
                                                        if(mysqli_query($con,$query1)){
                                                            echo '<span style= "color:green;">Successfully updated';
                                                        }
                                                        else{
                                                        echo '<span style= "color:red;"> updated failed!!!';
                                                        }
                                                }
                                                else{
                                                echo '<span style= "color:red;"> password doesnt match!!!';
                                                }
                                            }
                                            ?>    
                                        </form>

                                    </div>
                                    
                                <!-- </div> -->
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