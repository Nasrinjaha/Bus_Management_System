<?php
     include 'usersauth.php';
     include '../include/connection.php';
     $bid= $_REQUEST['bid'];
     $aid= $_REQUEST['aid'];
     $route = $_REQUEST['route'];
     //echo $aid;
     $uid = $_SESSION['id'];
     $queryseat = "select * from bus where b_id = $bid";
     $tableseat = mysqli_query($con,$queryseat);
     $rowseat= mysqli_fetch_array($tableseat);
     $n = $rowseat['seat'];
     $query1 = "select * from purchase where ass_id = $aid";
     $table1 = mysqli_query($con,$query1);
     $seats = [];
     while($row1=mysqli_fetch_array($table1)){
           array_push($seats,$row1['seat']);
     }
     $query2 = "select * from assigndriver where id = $aid";
     $table2= mysqli_query($con,$query2);
     $row2= mysqli_fetch_array($table2);
     date_default_timezone_set('Asia/Dhaka');
     $date = date("Y-m-d");
     $time = date('H:m:s ');
     $ttime = $row2['time'];
     $tdate = $row2['d_date'];

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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css/ticket.scss" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        
        <script src="../js/min.js" crossorigin="anonymous"></script>
        <script src="../js/bundle.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <style>
          .sub{
            padding-top: 30px;
            padding-left: 140px;
          }
          .style1{
             padding-top: 50px;
             padding-left: 160px;
          }
          .style2{
             padding-left: 40px;
          }
          .style3{
            font-size:22px;
          }
          .update {
                padding-left:25%;
                padding-top:5%;
            
          }
          .update2 {
                padding-right:20%;
                padding-top:5%;
            
          }
          .d{
              padding-left:290px;
          }
        </style>
    </head>
    <body>
        <?php include 'usersnav.php'
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
                                    <div ><h2 class="text-center "><b>Please select a seat</b></h2></div>
                                    <div class="card-body">
                                        
                                    <div class="container style1">
                                     <div class="d"><b><h4>Driver</h4></b></div>
                                     <br>
                                <form method='post'>
                                    
                                    <?php
                                      $i=1;
                                      $c='A';
                                      while($i<=$n){
                                    ?>
                                  <div class="row">
                                      <div class="col-md-2 style3">
                                      <label class="form-check-label" for="check1">
                                          <input type="checkbox" class="form-check-input" name="<?php echo $c.'1';?>" <?php if(in_array($c.'1',$seats)){echo "checked";} ?>><?php echo '   -'.$c.'1';?>
                                      </label>
                                      </div>
                                      <div class="col-md-2 style3">
                                      <label class="form-check-label" for="check2">
                                          <input  type="checkbox" class="form-check-input" name="<?php echo $c.'2';?>"<?php if(in_array($c.'2',$seats)){echo "checked";} ?> ><?php echo '   -'.$c.'2';?>
                                      </label>
                                      </div>
                                      <div class="col-md-2">
                              
                                      </div>
                                      <div class="col-md-2 style3">
                                      <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" name="<?php echo $c.'3';?>" <?php if(in_array($c.'3',$seats)){echo "checked";} ?> ><?php echo '   -'.$c.'3';?>
                                      </label>
                                      </div>
                                      <div class="col-md-2 style3">
                                      <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" name="<?php echo $c.'4';?>" <?php if(in_array($c.'4',$seats)){echo "checked";} ?>><?php echo '   -'.$c.'4';?>
                                      </label>
                                      </div>
                                     
                                  </div>
                                  <br>
                                 
                                  <?php
                                      $i=$i+4;
                                      $c++;
                                      }
                                  ?>
                                   
                                   <div class = "row ">
                                        <div class = "col-sm-6 update" >
                                        <button type="submit"  name ="submit" class="btn btn-primary" >submit</button>
                                        </div>
                                        <div class = "col-sm-6 update2">
                                        <a class = "btn btn-primary" href ="buses.php?route=<?php  echo $route.'&date='.$tdate?>">Back</a>
                                    </div>
                                   <?php 
                                     if(isset($_POST['submit'])){
                                        $c='A';
                                        $i=1;
                                        while($i<=$n){
                                            if(!empty($_POST[$c.'1']) && (!in_array($c.'1',$seats))){
                                                $seat = $c.'1';
                                                $querya = "insert into purchase(ass_id,user_id,date,time,seat)
                                                values($aid,$uid,'$date','$time','$seat')";
                                                mysqli_query($con,$querya);
                                            }
                                            if(!empty($_POST[$c.'2']) && (!in_array($c.'2',$seats))){
                                                $seat = $c.'2';
                                                $queryb = "insert into purchase(ass_id,user_id,date,time,seat)
                                                values($aid,$uid,'$date','$time','$seat')";
                                                mysqli_query($con,$queryb);
                                            }
                                            if(!empty($_POST[$c.'3']) && (!in_array($c.'3',$seats))){
                                                $seat = $c.'3';
                                                $queryc = "insert into purchase(ass_id,user_id,date,time,seat)
                                                values($aid,$uid,'$date','$time','$seat')";
                                                mysqli_query($con,$queryc);
                                            }
                                            if(!empty($_POST[$c.'4']) && (!in_array($c.'4',$seats))){
                                                $seat = $c.'4';
                                                $queryc = "insert into purchase(ass_id,user_id,date,time,seat)
                                                values($aid,$uid,'$date','$time','$seat')";
                                                mysqli_query($con,$queryc);
                                            }
                                            $i=$i+4;
                                            $c++;
                                        }
                                        $var = 'seat.php?bid='.$bid.'&aid='.$aid.'&route='.$route;
                                        echo "<script>window.location.href='".$var."'</script>"; 
                                        
                                     }
                                   ?>
                                 
                                 
                                </form>
                              </div>
                                </div>
                               
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
        </div>
        
        <div id="layoutAuthentication_footer">
               <?php include '../include/footer.php'; ?>
            </div>
    </body>
</html>