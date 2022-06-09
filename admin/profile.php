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
        <title>Admin Profile</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <?php include 'adminnav.php'?>
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
                                    <!-- <div ><h3 class="text-center ">My Profile</h3></div> -->
                                    <div class="card-body">
                                    <?php 
                                           include "../include/connection.php";
                                           $id=$_SESSION['id'];
                                           $name = $_SESSION['name'];
                                           $email = $_SESSION['email'];
                                           $query= "select * from admin where a_id=$id";
                                           $table = mysqli_query($con,$query);
                                           $row = mysqli_fetch_array($table);
                                           $img=$row["img"];
                                           $gender = $row['gender'];
                                           $address = $row['address'];
                                           $dob = $row['dob'];
                                           //echo $img;
                                        ?>
                                        <div class="container">
                                        <div class="d-flex justify-content-center h-100">
                                            <div class="image_outer_container">
                                                <div class="green_icon"></div>
                                                <div class="image_inner_container">
                                                    <?php
                                                     if($img=="NULL"){ 
                                                          if($gender=="female"){?>
                                                               <img src="../images/Userfemale.png" style="border:1px solid black;border-radius:50%;"   width="200" height="250" class = "center"> 
                                                          <?php } 
                                                          else {?>
                                                                <img src="../images/usermale.png" style="border:1px solid black;border-radius:50%;"   width="200" height="250" class = "center">
                                                          <?php } 
                                                     }
                                                     else {?> 
                                                    <img src="../images/<?php echo $img ;?>" style="border:1px solid black;border-radius:50%;"   width="250" height="250" class = "center">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        <div class = "data text-center">
                                            <br>
                                            <h3> <b>Position :</b>Admin </h3>
                                            <br>
                                            <h3><b>Name :</b><?php echo $name ?> </h3>
                                            <br>
                                            <h3><b>Email :</b><?php echo $email ?> </h3>
                                            <br>
                                            <h3><b>Address :</b><?php echo $address ?> </h3>
                                            <br>
                                            <h3><b>Dob:</b><?php echo $dob ?> </h3>

                                        </div>
                                    </div>
                                    
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        
        </div>
        <!-- </div> -->
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
        </div>
    </body>
</html>