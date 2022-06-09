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
        <!-- <div class = "tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card  border-0 rounded-lg mt-5">
                                    <div ><h3 class="text-center font-weight-light my-4">Create Bus</h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="createbus.php" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" name="name" type="text" placeholder="Enter bus name" required/>
                                                        <label for="inputName">Bus Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputcontact" name="number" type="text" placeholder="Enter bus number" required />
                                                        <label for="inputcontact">Bus Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="" name="type" type="text" placeholder="write type" required />
                                                <label for="">Type</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" name="make" type="text" placeholder="make" />
                                                        <label for="inputName">make</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputcontact" name="model" type="text" placeholder="write model" />
                                                        <label for="inputcontact">model</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                
                                                <div>
                                                    <label for="files" >Choose Bus image: </label>
                                                    <input id="files" style="" type="file" name="image">
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputaddress" name="seat" type="number" placeholder="write total seat number" required/>
                                                <label for="inputaddress">seat</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button name="submit" type = "submit" class="btn btn-primary btn-block" >Create Bus</a></div>
                                            </div>
                                            <?php
                                                include '../include/connection.php';
                                                if(isset($_POST['submit'])){
                                                    $name =   $_POST['name'];
                                                    $number = $_POST['number'];
                                                    $type = $_POST['type'];
                                                    $make = $_POST['make'];
                                                    $model = $_POST['model'];
                                                    $seat =  $_POST['seat']; 
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
                                                    if($make==""){
                                                        $make="NULL";
                                                    }
                                                    if($model==""){
                                                        $model="NULL";
                                                    }
                                                    echo '<br>';
                                                    $query1 = "INSERT INTO bus(b_name,b_number,type,make,model,seat,img)
                                                    VALUES('$name',$number,'$type','$make','$model','$seat','$image')";
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
