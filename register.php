<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            body{
            /* background-color: antiquewhite;
            opacity:0.7; */
            /* background-image: url(bg.jpg); */
            /* opacity:0.7; */
            height: 400px;
            background: linear-gradient( skyblue, skyblue);
            /* background-repeat: no-repeat; */
            /* background-position:right top ; */
            /* background-size:cover; */
            }
            .card-body{
                padding-bottom: 10px;
            }
            .font{
                font-size:40px; 
            }
            /* .p{
                padding-top:40px;
            } */
        </style>
    </head>
    <body class="bg-primary">
        <!-- <div class = "tinted-image"> -->
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="">
                    <div class="container">
                    <h1   class="text-center font-weight-light my-4 font">Bus Management System</h1> 
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="register.php" enctype="multipart/form-data">
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
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required/>
                                                    <label for="inputEmail">Email address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                    <div>
                                                    <label for="files" >Choose profile image: </label>
                                                    <input id="files" style="" type="file" name="image">
                                                </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputaddress" name="address" type="text" placeholder="Enter your address" />
                                                        <label for="inputaddress">Address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputdob" name="dob" type="date" placeholder="Enter your date of birth" required />
                                                        <label for="inputdob">Date Of Birth</label>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row mb-3">
                                                <div class="col-md-6">
                                               
                                                    <div class="form-floating mb-3 mb-md-0">
                                                   
                                                    <select name="gender" class="form-control" id="Gender" name="gender" type="text" placeholder="Enter your gender">
                                                    <option value="NULL">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female"> Female</option>
                                                    <option value="other">Other</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   
                                                    <div class="form-floating mb-3 mb-md-0">
                                                   
                                                    <select class = "form-control" name = "user">
                                                    <option value="NULL">user</option>
                                                    <option value="passengers">passengers</option>
                                                    <option value="drivers">drivers</option>
                                                    </select>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="pass1" type="password" placeholder="Create a password" required/>
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
                                                include 'include/connection.php';
                                                if(isset($_POST['submit'])){
                                                    $name =   $_POST['name'];
                                                    $mail = $_POST['email'];
                                                    $address = $_POST['address'];
                                                    $contact = $_POST['contact'];
                                                    $pass1 = $_POST['pass1'];
                                                    $pass2 =  $_POST['pass2']; 
                                                    $dob = $_POST['dob'];
                                                    $gender = $_POST['gender'];
                                                    $img = $_FILES['image']['name'];
                                                    $user = $_POST['user']; 

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
                                                    
                                                    if($image!=NULL){
                                                        move_uploaded_file($_FILES['image']['tmp_name'],"images/$image");
                                                    }
                                                    echo '<br>';
                                                    if($gender=='NULL'){
                                                        echo '<span style= "color:red;">Please mention the gender!!!';
                                                        echo '<br>';
                                                    }
                                                    if($pass1!=$pass2){
                                                        echo '<span style= "color:red;">password doesn\'t match!!!';
                                                    }
                                                    if($dob==""){
                                                        echo '<span style= "color:red;">Please enter date f birth!!!';
                                                        echo '<br>';
                                                    }
                                                    else{
                                                        if($user == 'NULL'){
                                                            echo '<span style= "color:red;">Choose an user!';                                                     
                                                          
                                                        }
                                                        else if($user == 'passengers'){
                                                            $query="SELECT * FROM users WHERE mobile = '$contact' "; 
                                                            $table = mysqli_query($con,$query);
                                                            $row = mysqli_fetch_array($table);
                                                            if($row['mobile']==$contact){
                                                                
                                                                echo '<span style= "color:red;">already assigned a passerger!!!';                                                       

                                                            }
                                                            else{
                                                                $query1 = "INSERT INTO users(name,email,address,dob,gender, mobile,pass,img)
                                                                VALUES('$name','$mail','$address','$dob','$gender','$contact','$pass1','$image')";
                                                                if(mysqli_query($con,$query1)){
                                                                        echo '<span style= "color:green;">Successfully inserted';

                                                                        echo "<script>window.location.href='profile.php?email=".$mail."&pass=".$pass1."'</script>" ;
                                                                       
                                                                }
                                                                else{
                                                                    echo '<span style= "color:red;">insertion failed';
                                                                }

                                                            } 
                                                        }
                                                        else{
                                                            echo "<script>window.location.href='registerdriver.php?name=".$name."&email=".$mail."&contact=".$contact."&pass=".$pass1."&dob=".$dob."&gender=".$gender."&address=".$address."&img=".$image."'</script>" ;
                                                       }
                                                    }
                                            }
                                             ?>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Have an account? Go to login</a></div>
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
               <?php include 'include/footer.php'; ?>
            </div>
        <!-- </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
