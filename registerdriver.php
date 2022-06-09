<?php
 $name = $_REQUEST['name'];
 $mail = $_REQUEST['email'];
 $address = $_REQUEST['address'];
 $contact = $_REQUEST['contact'];
 $pass1 = $_REQUEST['pass'];
 $dob = $_REQUEST['dob'];
 $gender = $_REQUEST['gender'];
 $img = $_REQUEST['img'];
//  echo $name;
//  echo $mail;
//  echo $address;
//  echo $contact;
//  echo $pass1;
//  echo $gender;
//  echo $dob;
//  echo $img;
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>.update {
        padding-left:25%;
        
      }
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
      </style>
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
                                <div class="card  border-0 rounded-lg mt-5">
                                    <div ><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method = "post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputlicence" name="licence" type="text" placeholder="write your driving licence" required/>
                                                <label for="inputlicence">Driving Licence</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputexperience" name="experience" type="text" placeholder="write your working experience " required/>
                                                <label for="inputexperience">Working Experience</label>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-sm-6 update" >
                                                <button type="submit"  name ="submit" class="btn btn-primary" >Create Account</button>
                                                </div>
                                                <div class = "col-sm-6">
                                                <a class="btn btn-primary" href = "register.php">back</a> 
                                            </div>
                                            <?php
                                                include 'include/connection.php';
                                                if(isset($_POST['submit'])){
                                                    $licence = $_POST['licence'];
                                                    $experience = $_POST['experience'];
                                                    $query="SELECT * FROM request WHERE mobile = '$contact' "; 
                                                    $table = mysqli_query($con,$query);
                                                    $row = mysqli_fetch_array($table);
                                                    if($row['mobile']==$contact){
                                                        
                                                        echo '<span style= "color:red;">duplicate contact!!!';                                                       

                                                    }
                                                    else{
                                                        $query1 = "INSERT INTO request(name,email,address,dob,gender, mobile,pass,Driving_Licence,working_experience,img)
                                                        VALUES('$name','$mail','$address','$dob','$gender','$contact','$pass1','$licence','$experience','$img')";
                                                        if(mysqli_query($con,$query1)){
                                                                echo '<span style= "color:green;">Successfully inserted';
                                                                echo "<script>window.location.href='index.php'</script>" ;
                                                                
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
               <?php include 'include/footer.php'; ?>
            </div>
        </div>
        
        
        <!-- </div> -->
        
    </body>
</html>
