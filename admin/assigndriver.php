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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                                    <div ><h3 class="text-center font-weight-light my-4">Assign Driver</h3></div>
                                    <div class="card-body">
                                        <form method = "post" action="assigndriver.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label class = "from-control">choose driver</label>
                                        <select name = "driver" id ="driver" class="form-control">
                                            <option value="">--choose driver--</option>
                                            <?php 
                                            include '../include/connection.php';
                                            $query = "select * FROM drivers";
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['d_id'];?>"><?php echo $row['name'];?></option>
                                                <?php } ?>
                                                </select>
                                            
                                        </div>
                                        <br>
                                        <label class = "from-control">choose Date</label>
                                        <div class="form-floating mb-3 mb-md-0">
                                        
                                            <input class="form-control" id="date" onkeyup="datefunc()" name="date" type="text" palceholder=""/>
                                            <label for="inputdate">yy-mm-dd(2022-05-01)</label>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                        <label class = "from-control">choose bus</label>
                                        <select name = "bus"  id="bus" class="form-control">
                                            <option value="">--choose bus--</option>
                                        </select>
                                            
                                        </div>
                                        <br>
                                        <div class="form-group">
                                        <label class = "from-control">choose route</label>
                                        <select name = "route" class="form-control">
                                            <option value="">--choose route--</option>
                                            <?php 
                                            $query = "select * FROM route";
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['r_id'];?>"><?php echo $row['stod'];?></option>
                                                <?php } ?>
                                                </select>
                                            
                                        </div>
                                        <br>
                                        <label class = "from-control">choose time</label>
                                        <div class="form-floating mb-3 mb-md-0">
                                        
                                            <input class="form-control" id="inputtime" name="time" type="time" min="01:00" max="24:00" />
                                            <label for="inputtime">time</label>
                                        </div>
                                        <br>
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputnum" name="number" type="number" placeholder=" enter the number of station" />
                                                <label for="inputnum">Number Of Station</label>
                                          </div>
                                          <br>
                                        <div class = "text-center">                      
                                            <button type="submit"  name ="submit" class="btn btn-primary" >save</button>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit'])){
                                            $did = $_POST['driver'];
                                            $bid = $_POST['bus'];
                                            $route = $_POST['route'];
                                            $time = $_POST['time'];
                                            $num = $_POST['number'];
                                            $date = $_POST['date'];
                                            echo "<script>window.location.href='assigndriver2.php?did=".$did."&bid=".$bid."&route=".$route."&num=".$num."&time=".$time."&date=".$date."'</script>" ;
                                            // $qryroute="select * from assigndriver where d_id = '$did' and r_id='$route' and d_date='$date'";
                                            // $qryroutetable = mysqli_query($con,$qryroute);
                                            // $qryrouterow = mysqli_fetch_array($qryroutetable);
                                            // if($qryrouterow ) {
                                            //         echo "<br>";
                                            //         echo '<span style= "color:red;">The driver already assigned for this route today!!';
                                            // }
                                            // else{
                                            //     $query1 = "INSERT INTO  assigndriver(d_id,b_id,d_date,r_id,time)
                                            //     VALUES('$did','$bid','$date','$route','$time')";
                                            //     if(mysqli_query($con,$query1)){
                                            //         echo '<span style= "color:green;">Successfully inserted';
                                            //     }
                                            //     else{
                                            //         echo '<span style= "color:red;">insertion failed!!!';
                                            //     }
                                                
                                            // }                    
                                                
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
       <script>
          
          function datefunc(){
            var date = document.getElementById("date").value;
            $.ajax({
                url: "getbus.php",
                dataType : 'json',
                data: {
                    "date" : date
                },
                success: function(res){
                    $("#bus").html('<option value="">--choose bus--</option>');
                    for(i=0;i<res.length;i++){
                        var x = '<option value="'+res[i].b_id+'">'+res[i].b_number+'</option>';
                        $("#bus").append(x);
                    }
                }
            });
          }
        </script> 
    </body>
</html>
