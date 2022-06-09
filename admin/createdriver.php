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
                                <div class="card  border-0 rounded-lg mt-5">
                                    <div ><h3 class="text-center font-weight-light my-4">Create Drivers</h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="createdriver.php" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" name="name" type="text" placeholder="Enter your name" required/>
                                                        <label for="inputName">name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputcontact" name="contact" type="text" placeholder="Enter your contactnumber" required/>
                                                        <label for="inputcontact">contact</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                
                                                <div>
                                                    <label for="files" >Choose profile image: </label>
                                                    <input id="files" style="" type="file" name="image">
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputaddress" name="address" type="text" placeholder="write your address " />
                                                <label for="inputaddress">Address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputdib" name="dob" type="date" placeholder="" required/>
                                                <label for="inputEmail">Date of Birth</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="Gender">Gender</label>
                                                <select name="gender" class="form-control" id="Gender" name="gender" type="text" placeholder="gender" required>
                                                <option value="NULL">gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                                </select>
                                                
                                                </div>
                                                <br>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputlicence" name="licence" type="text" placeholder="write your driving licence" required/>
                                                <label for="inputlicence">Driving Licence</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputexperience" name="experience" type="text" placeholder="write your working experience " required/>
                                                <label for="inputexperience">Working Experience</label>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="pass1" type="password" placeholder="Create a password" required />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="pass2" type="password" placeholder="Confirm password" required/>
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button name="submit" type = "submit" class="btn btn-primary btn-block" >Create Account</a></div>
                                            </div>
                                            <?php
                                                include '../include/connection.php';
                                                if(isset($_POST['submit'])){
                                                    $name =   $_POST['name'];
                                                    $mail = $_POST['email'];
                                                    $address = $_POST['address'];
                                                    $contact = $_POST['contact'];
                                                    $pass1 = $_POST['pass1'];
                                                    $pass2 =  $_POST['pass2']; 
                                                    $dob = $_POST['dob'];
                                                    $gender = $_POST['gender'];
                                                    $licence = $_POST['licence'];
                                                    $experience = $_POST['experience'];
                                                    $img = $_FILES['image']['name']; 
                                                    if($img){
                                                        $separetedimage = explode(".",$img);
                                                        $ext = $separetedimage[1];
                                                        $date = date("D:M:Y");
                                                        $time = date("h:i:s");
                                                        $image = md5($date.$time);//MD5 function for encryption
                                                        $image = $image.".".$ext;
                                                        
                                                    }
                                                    else{
                                                        $image="NULL";
                                                    }
                                                    if($address==""){
                                                        $address="NULL";
                                                    }
                                                    // 
                                                    echo '<br>';
                                                    $query="SELECT * FROM drivers WHERE mobile = '$contact' "; 
                                                    $table = mysqli_query($con,$query);
                                                    $row = mysqli_fetch_array($table);
                                                    if($pass1!=$pass2){
                                                        echo '<span style= "color:red;">password doesn\'t match!!!';
                                                    }
                                                    else if($gender=="NULL"){
                                                        echo '<span style= "color:red;">Please mention the gender!!!';
                                                    }
                                                    else{
                                                         $query1 = "INSERT INTO drivers(name,email,address,dob,gender, mobile,pass,Driving_Licence,working_experience,img)
                                                        VALUES('$name','$mail','$address','$dob','$gender','$contact','$pass1','$licence','$experience',' $image')";
                                                        if(mysqli_query($con,$query1)){
                                                                echo '<span style= "color:green;">Successfully inserted';
                                                                if($image!=NULL){
                                                                    move_uploaded_file($_FILES['image']['tmp_name'],"../images/$image");
                                                                }
                                                        }
                                                        else{
                                                            echo '<span style= "color:red;">insertion failed';
                                                        }

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
