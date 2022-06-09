<?php 
    session_start();
    $_SESSION['isloggedin'] = 'no';
    $_SESSION['user'] = 'none';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
       
            body{
            /* background-color: antiquewhite;
            opacity:0.7; */
            background-image: url(bg.jpg);
            /* opacity:0.7; */
            height: 400px;
            background: linear-gradient( skyblue, skyblue);
            /* background-repeat: no-repeat; */
            /* background-position:right top ; */
            background-size:cover;
            }
            .font{
                font-size:55px; 
            }
            .p{
                padding-top:50px;
            }
        
        </style>
    </head>
    <body class="bg-primary">
        <!-- <div class= "tinted-image">  -->
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                <div class = "p">
                
                    <div class="container">
                      <b><h1   class="text-center font-weight-light my-4 font">Bus Management System</h1></b> 
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email"  name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="pass" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>

                                                <button class="btn btn-primary d-grid" type="submit" value="submit" name="login" >Login</button>
                                            </div>
                                        </form>
                                        <?php 
                                            include 'include/connection.php';
                                            if(isset($_POST['login'])){
                                                 $email=$_POST['email'];
                                                 $pass = $_POST['pass'];
                                                 $query="SELECT * FROM admin WHERE email = '$email' AND pass='$pass'"; 
                                                 $table=mysqli_query($con, $query);
                                                 $row = mysqli_fetch_array($table);
                                                 if($row){
                                                     $_SESSION['isloggedin'] = 'yes';
                                                     $_SESSION['user'] = 'admin'; 
                                                     $_SESSION['id']=$row['a_id'];
                                                     $_SESSION['name'] = $row['name'];
                                                     $_SESSION['email'] = $row['email']; 
                                                     $_SESSION['img'] = $row['img'];
                                                     header('Location: admin/profile.php');
                                                 }
                                                    else{
                                                        $query = "select * FROM drivers WHERE email ='$email' AND  pass = '$pass' ";
                                                        $table = mysqli_query($con,$query);
                                                        $row = mysqli_fetch_array($table);
                                                        if($row){
                                                            $_SESSION['isloggedin'] = 'yes';
                                                            $_SESSION['user'] = 'drivers';
                                                            $_SESSION['id']=$row['d_id'];
                                                            $_SESSION['name'] = $row['name'];
                                                            $_SESSION['email'] = $row['email']; 
                                                            $_SESSION['img'] = $row['img'];
                                                            header('Location: drivers/profile.php');
                                                        }
                                                        else{
                                                            $query = "select * FROM users WHERE email ='$email' AND  pass = '$pass' ";
                                                            $table = mysqli_query($con,$query);
                                                            $row = mysqli_fetch_array($table);
                                                           
                                                            if($row){
                                                              $_SESSION['isloggedin'] = 'yes';
                                                              $_SESSION['user'] = 'users';
                                                              $_SESSION['id']=$row['u_id']; 
                                                              $_SESSION['name'] = $row['name'];
                                                              $_SESSION['email'] = $row['email'];
                                                              $_SESSION['img'] = $row['img'];
                                                              header('Location: users/profile.php');
                                                            }
                                                            else{
                                                              echo "<span style = 'color:red;'>Invalid mail or pass.Please try again";
                                                            }                          
                                                      }                    
                                                  
                                                }
                                                 


                                            }
                                        ?>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
                <?php
                    include 'include/footer.php'; 
                ?>
            </div>
        <!-- </div>  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- </div>  -->
    </body>
</html>
