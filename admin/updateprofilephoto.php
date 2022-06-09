<?php
               
              //session_start();
               include 'adminauth.php';
               include '../include/connection.php';
               $aid =  $_SESSION['id'];
              // $sname = $_SESSION['name'];
              //$semail = $_SESSION['email'];
              $query = "select * from admin where a_id = $aid";
              $result = mysqli_query($con,$query);
              $row = mysqli_fetch_array($result); 
              $img = $row['img'];
              $gender = $row['gender'];  
              $name =  $row['name'];   
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
        <link href="../css/style.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .aa{
                padding-right:20px;
                margin-right : 210px;
            }
            .bb{
                padding-left:20px; 
                margin-left: 210px;
            }
        </style>
    </head>
    <body>
        <?php include 'adminnav.php'; ?>
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
                                    <div><h3 class="text-center font-weight-light my-4">Update profile Photo</h3></div>
                                    <div class="card-body">
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
                                                          else{?>
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
                                        <form method = "post" action="uploadprofilephoto.php" enctype="multipart/form-data">
                                            <div class="row mb-3 text-center file-update">
                                                <div class="col-md-6">
                                                    <label for="files" >Update profile image: </label>
                                                    <input id="files" style="" type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="file-input text-center">
                                                <div class = "row">
                                                <div class = "col bb">
                                                <input
                                                    type="submit"
                                                    name="update"
                                                    id="file-input"
                                                    class="file-input__input"
                                                />
                                                <label class="file-input__label" for="file-input">
                                                    <svg
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="fas"
                                                    data-icon="upload"
                                                    class="svg-inline--fa fa-upload fa-w-16"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512"
                                                    >
                                                    <path
                                                        fill="currentColor"
                                                        d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                                                    ></path>
                                                    </svg>
                                                    <span>Upload file</span></label>
                                                </div>
                                                <div class = "col aa">
                                                <a class = "btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
                                                <!-- Modal -->
                                                <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" datas-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete Confirmation!!!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class = "btn btn-success" href ="deletephoto.php">yes</a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                </div>


                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                            <br>                    
                                           
                                            <?php                
                                            if(isset($_POST['update'])){
                                                $img = $_FILES['image']['name']; 
                                                if($img){
                                                    $separetedimage = explode(".",$img);
                                                    $ext = $separetedimage[1];
                                                    $date = date("D:M:Y");
                                                    $time = date("h:i:s");
                                                    $image = md5($date.$time);//MD5 function used for encryption
                                                    $image = $image.".".$ext;
                                                    
                                                }
                                                else{
                                                    $image="NULL";
                                                }
                                                //echo $image;
                                                if($image!="NULL"){
                                                    move_uploaded_file($_FILES['image']['tmp_name'],"../images/$image");
                                                    $query1 = "update admin set img = '$image' where a_id = $aid";
                                                    if(mysqli_query($con,$query1)){
                                                            echo "<script>window.location.href='uploadprofilephoto.php'</script>" ;
                                                            echo '<span style= "color:green;">Successfully updated';
                                                    }
                                                    else{
                                                        echo '<span style= "color:red;"> updated failed!!!';
                                                    }
                                                }
                                                else{
                                                    echo '<span style= "color:red;"> Choose an Image!!!';
                                                }
                                                echo '<br>';
                                              
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
       
               
        <!-- </div> -->
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        
        </div>
          
    </body>
</html>