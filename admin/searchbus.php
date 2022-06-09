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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <?php include 'adminnav.php'
        ?>
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
                                    <div ><h2 class="text-center font-weight-light my-4"><b>Searching for bus is here</b></h2></div>
                                    <div class="card-body">   
                                    <form method = "post" action="searchbus.php" enctype="multipart/form-data">
                                        
                                    <label class = "from-control">Search by name</label>
                                        <select name = "search" id ="search" class="form-control">
                                            <option value="">--choose Bus--</option>
                                            <?php 
                                            include '../include/connection.php';
                                            $query = "select Distinct(b_name) FROM bus";
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['b_name'];?>"><?php echo $row['b_name'];?></option>
                                                <?php } ?>
                                         </select>
                                         <br>
                                        <label class = "from-control">Search by Type</label>
                                        <select name = "type" id ="type" class="form-control">
                                            <option value="">--choose Type--</option>
                                            <option value="AC">AC</option>
                                            <option value="NON AC">NON AC</option>
                                            
                                        </select>
                                        <br>
                                        <label class = "from-control">Search by Model</label>
                                        <select name = "model" id ="model" class="form-control">
                                            <option value="">--choose model--</option>
                                            <?php 
                                            include '../include/connection.php';
                                            $query = "select DISTINCT(model) FROM bus where model<>'NULL'";
                                            $result = mysqli_query($con,$query);
                                            
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?php echo $row['model'];?>"><?php echo $row['model'];?></option>
                                                <?php } ?>
                                         </select>
                                        
                                        </div>
                                        <br>

                                        <div class = "text-center">                      
                                            <button type="submit"  name ="submit" class="btn btn-primary" >search</button>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit'])){
                                            $bus = $_POST['search'];
                                            $type =  $_POST['type'];
                                            $model =  $_POST['model'];
                                            if($bus==""){
                                                $bus = "null";
                                            }
                                            if($type==""){
                                                $type = "null";
                                            }
                                            if($model==""){
                                                $model = "null";
                                            }
                                            if($bus=="null"){
                                                if($type=="null"){
                                                    if($model=="null"){
                                                       echo "Enter a Value"; 
                                                    }
                                                    else{
                                                        $var = 'searchbustable.php?search='.$bus.'&type='.$type.'&model='.$model;
                                                        echo "<script>window.location.href='".$var."'</script>"; 
                                                    }
                                                }
                                                else{
                                                    $var = 'searchbustable.php?search='.$bus.'&type='.$type.'&model='.$model;
                                                    echo "<script>window.location.href='".$var."'</script>"; 
                                                }
                                            }
                                            else{
                                                $var = 'searchbustable.php?search='.$bus.'&type='.$type.'&model='.$model;
                                                echo "<script>window.location.href='".$var."'</script>"; 
                                            }
                                        }                               
                                        ?> 
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        
        <!-- </div> -->
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
        </div>
        
        
    </body>
</html>

