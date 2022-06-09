<?php 
   include 'adminauth.php';
   include '../include/connection.php';
    $num=$_REQUEST['num'];
    $did = $_REQUEST['did'];
    $bid = $_REQUEST['bid'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $route = $_REQUEST['route'];
    $i=1;
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
            padding-left:40%;
            }
        </style>
    </head>
    <body>
        <?php include 'adminnav.php'?>
        <!-- <div class= "tinted-image"> -->
        <div id="layoutSidenav_content">
               <div class="container">
               <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card  border-0 rounded-lg mt-5">
                                    <div ><h3 class="text-center font-weight-light my-4">Route Table</h3></div>
                                    <div class="card-body">
                                        <form method = "post" >
                                        <?php while((int)$i<=$num){?>
                                        <div class="form-group">
                                        <label class = "from-control">choose Station</label>
                                        <select name = "<?php echo "station".$i;?>" class="form-control">
                                        <option value="">--choose Station--</option>
                                            <?php 
                                            $query = "select * FROM city";
                                            $result = mysqli_query($con,$query);
                                                while($row = mysqli_fetch_array($result)){ ?>
                                                    <option value="<?php echo $row['c_name'];?>"><?php echo $row['c_name'];?></option>
                                                <?php } $i++;?>
                                        </select>
                                        <br>                                               
                                        </div>
                                        <?php  } ?>
                                        <br>
                                         
                                            <div class = "row">
                                                <div class = "col-sm-6 update" >
                                                <button type="submit"  name ="submit" class="btn btn-primary" >save</button>
                                                </div>
                                                <div class = "col-sm-6">
                                                <a class="btn btn-primary" href = "assigndriver.php">back</a> 
                                            </div>                     
                                            
                                        
                                        <?php
                                        if(isset($_POST['submit'])){
                                            

                                            $stations = $_POST['station1'];
                                            $i=2;
                                            while((int)$i<=$num){
                                                $var = "station".$i;
                                                $stations = $stations." to ".$_POST[$var];
                                                $i++;
                                            }
                                            //echo $stations;
                                            $qryroute="select * from assigndriver where d_id = '$did' and r_id='$route' and d_date='$date'";
                                            $qryroutetable = mysqli_query($con,$qryroute);
                                            $qryrouterow = mysqli_fetch_array($qryroutetable);
                                            if($qryrouterow ) {
                                                    echo "<br>";
                                                    echo '<span style= "color:red;">The driver is already assigned to this route for today!!';
                                            }
                                            else{
                                                $query1 = "INSERT INTO  assigndriver(d_id,b_id,d_date,r_id,time,stations)
                                                VALUES('$did','$bid','$date','$route','$time','$stations')";
                                                if(mysqli_query($con,$query1)){
                                                    echo '<span style= "color:green;">Successfully inserted';
                                                }
                                                else{
                                                    echo '<span style= "color:red;">insertion failed!!!';
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
            
        <!-- </div> -->
        
        
               </div>
        </div>
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        
       </div>
       
    </body>
</html>
