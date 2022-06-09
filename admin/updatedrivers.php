<?php         // session_start();
               include 'adminauth.php';
               include 'adminnav.php';
               include '../include/connection.php';
              // $sname = $_SESSION['name'];
              //$semail = $_SESSION['email'];
              $did = $_REQUEST['id'];       
              $query = "select * from drivers where d_id = $did";
              $result = mysqli_query($con,$query);
              $row = mysqli_fetch_array($result);

              $name = $row['name'];
              $contact = $row['mobile'];
              $email = $row['email'];
              $address = $row['address'];
              $dob = $row['dob'];
              $gender = $row['gender'];      
              $pass = $row['pass'];
              $licence = $row['Driving_Licence'];
              $experience = $row['working_experience'];
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
        <style>
             .update {
                padding-left:30%;
              }
        </style>
    </head>
    <body>
        <div class = "tinted-image">
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- <div class="card shadow-lg border-0 rounded-lg mt-5"> -->
                                    <div ><h3 class="text-center font-weight-light my-4"><?php echo "$name's " ?>Profile</h3></div>
                                    <div class="card-body">
                                        <form method = "post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" name="name" type="text" value = '<?php echo $name?>'  />
                                                        <label for="inputName">name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputcontact" name="contact" type="text" value = <?php echo  $contact ?>  />
                                                        <label for="inputcontact">contact</label>
                                                    </div>
                                                </div>
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
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputgender" name="gender" type="text" value = <?php echo $gender ?>  />
                                                <label for="inputgender">Gender</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputlicence" name="licence" type="text" value = <?php echo $licence ?>  />
                                                <label for="inputlicence">Licence</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputexperience" name="experience" type="text" value = '<?php echo $experience ?>'  />
                                                <label for="inputexperience">Experience</label>
                                            </div>
                                            <br>
                                              
                                            <div class = "row">
                                                <div class = "col-sm-6 update" >
                                                <button type="submit"  name ="update" class="btn btn-primary" >update</button>
                                                </div>
                                                <div class = "col-sm-6">
                                                <a class="btn btn-primary" href = "drivers.php">back</a> 
                                            </div>
                                            <?php
                                            //include '../connection.php';
                                            if(isset($_POST['update'])){
                                            $name =   $_POST['name'];
                                            $mail = $_POST['email'];
                                            $dob = $_POST['dob'];
                                            $address = $_POST['address'];
                                            $contact = $_POST['contact']; 
                                            $gender = $_POST['gender'];
                                            $experience = $_POST['experience'];
                                            $licence = $_POST['licence'];
                                            $query1 = "update drivers set name = '$name',email='$mail' ,address= '$address',dob= '$dob', gender='$gender',mobile='$contact',Driving_Licence='$licence',working_experience='$experience'  where d_id = $did";
                                                    if(mysqli_query($con,$query1)){
                                                        $var = 'updatedrivers.php?id='.$did;
                                                        echo "<script>window.location.href='".$var."'</script>"; 
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
            
            </div>
            
        </div>
        
    </body>
</html>