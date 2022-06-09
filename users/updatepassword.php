<?php         // session_start();
                include 'usersauth.php';
                include 'usersnav.php';
                include '../include/connection.php';
               $uid =  $_SESSION['id'];
              // $sname = $_SESSION['name'];
              //$semail = $_SESSION['email'];
              $query = "select * from users where u_id = $uid";
              $result = mysqli_query($con,$query);
              $row = mysqli_fetch_array($result);      
              $pass = $row['pass'];
              //echo $pass;
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
    </head>
    <body>
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
                                    <div ><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <form method = "post">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputpass" name="Opass" type="password" />
                                                        <label for="inputpass">Old Pass</label>
                                                    </div>
                                                    <br>
                                              
                                            <div class = "text-center">
                                            <button type="submit"  name ="next" class="btn btn-primary">next</button>
                                            </div>
                                            <?php 
                                                if(isset($_POST['next'])){
                                                    $Opass = $_POST['Opass'];
                                                    //echo $Opass;
                                                    if($Opass == $pass){
                                                        echo "<script>window.location.href='password.php'</script>" ;
                                                    }
                                                    else{
                                                        echo '<span style= "color:red;"> wrong old password!!!';
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
           
        
            <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        </div>
        
    </body>
</html>