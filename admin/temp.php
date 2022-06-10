<?php
                                        if(isset($_POST['submit'])){
                                            $did = $_POST['driver'];
                                            $bid = $_POST['bus'];
                                            $route = $_POST['route'];
                                            $time = $_POST['time'];
                                            $qryroute="select * from assigndriver where d_id = '$did' and r_id='$route' and d_date='$date'";
                                            $qryroutetable = mysqli_query($con,$qryroute);
                                            $qryrouterow = mysqli_fetch_array($qryroutetable);
                                            if($qryrouterow ) {
                                                    echo "<br>";
                                                    echo '<span style= "color:red;">The driver already assigned for this route today!!';
                                            }
                                            else{
                                                $query1 = "INSERT INTO  assigndriver(d_id,b_id,d_date,r_id,time)
                                                VALUES('$did','$bid','$date','$route','$time')";
                                                if(mysqli_query($con,$query1)){
                                                    echo '<span style= "color:green;">Successfully inserted';
                                                }
                                                else{
                                                    echo '<span style= "color:red;">insertion failed!!!';
                                                }
                                                
                                            }                    
                                                
                                        }                               
                                        
                                    
                                        ?> 