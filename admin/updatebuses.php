<?php         // session_start();
               include 'adminauth.php';
               include 'adminnav.php';
               include '../include/connection.php';
               $bid =  $_REQUEST['id'];
              // $sname = $_SESSION['name'];
              //$semail = $_SESSION['email'];
              $query = "select * from bus where b_id = $bid";
              $result = mysqli_query($con,$query);
              $row = mysqli_fetch_array($result);

              $name = $row['b_name'];
              
              $number = $row['b_number'];
              $type = $row['type'];
              $make = $row['make'];
              $seat=$row['seat'];
              $model = $row['model']; 
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
                                    <div ><h3 class="text-center font-weight-light my-4"><?php echo "$name" ?></h3></div>
                                    <div class="card-body">
                                        <form method = "post">
                                            
                                                    
                                            <div class="form-floating mb-3">
                                            <input class="form-control" id="inputName" name="name" type="text" value = '<?php echo $name?>'  />
                                                        <label for="inputName">name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputnumber" name="number" type="text" value=<?php echo $number ?> />
                                                <label for="inputnumber">Bus Number</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputtype" name="type" type="text" value = '<?php echo $type ?>' />
                                                <label for="inputaddress">type</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" name="make" type="text" value = '<?php echo $make ?>'/>
                                                        <label for="inputmake">make</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputcontact" name="model" type="text" value = '<?php echo $model ?>' />
                                                        <label for="inputmodel">model</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputaddress" name="seat" type="number"value = <?php echo $seat ?> />
                                                <label for="inputaddress">seat</label>
                                            </div>
                                            
                                            <br>
                                              
                                            <div class = "row">
                                                <div class = "col-sm-6 update" >
                                                <button type="submit"  name ="update" class="btn btn-primary" >update</button>
                                                </div>
                                                <div class = "col-sm-6">
                                                <a class="btn btn-primary" href = "buses.php">back</a> 
                                            </div>
                                            <?php
                                            //include '../connection.php';
                                            if(isset($_POST['update'])){
                                            $name =   $_POST['name'];
                                            $number = $_POST['number'];
                                            $type = $_POST['type'];
                                            $make = $_POST['make'];
                                            $model = $_POST['model'];
                                            $seat = $_POST['seat'];
                                            
                                            $query1 = "update bus set b_name = '$name',  b_number='$number',type= '$type',make= '$make',model= '$model',seat='$seat' where b_id = $bid";
                                                    if(mysqli_query($con,$query1)){
                                                        $var = 'updatebuses.php?id='.$bid;
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