<?php         // session_start();
               include 'adminauth.php';
               include 'adminnav.php';
               include '../include/connection.php';
               $aid =  $_SESSION['id'];
              // $sname = $_SESSION['name'];
              //$semail = $_SESSION['email'];
              $query = "select * from admin where a_id = $aid";
              $result = mysqli_query($con,$query);
              $row = mysqli_fetch_array($result);

              $name = $row['name'];
              
              $email = $row['email'];
              $address = $row['address'];
              $dob = $row['dob'];
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Profile</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
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
                                    <div ><h3 class="text-center font-weight-light my-4">My Profile</h3></div>
                                    <div class="card-body">
                                        <form method = "post">
                                            
                                                    
                                            <div class="form-floating mb-3">
                                            <input class="form-control" id="inputName" name="name" type="text" value = '<?php echo $name?>'  />
                                                        <label for="inputName">name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" value=<?php echo $email ?> />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputaddress" name="address" type="text" value = '<?php echo $address ?>' />
                                                <label for="inputaddress">Address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputdob" name="dob" type="date" value = <?php echo $dob ?>  />
                                                <label for="inputEmail">Date of Birth</label>
                                            </div>
                                            
                                            <br>
                                              
                                            <div class = "text-center">
                                            <button type="submit"  name ="update" class="btn btn-primary">update</button>
                                            </div>
                                            <?php
                                            //include '../connection.php';
                                            if(isset($_POST['update'])){
                                            $name =   $_POST['name'];
                                            $mail = $_POST['email'];
                                            $dob = $_POST['dob'];
                                            $address = $_POST['address'];
                                            
                                            $query1 = "update admin set name = '$name',  email='$mail' ,address= '$address',dob= '$dob' where a_id = $aid";
                                                    if(mysqli_query($con,$query1)){
                                                           echo "<script>window.location.href='updateprofile.php'</script>" ;
                                                            echo '<span style= "color:green;">Successfully updated';
                                                    }
                                                    else{
                                                        echo '<span style= "color:red;"> updated failed!!!';
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