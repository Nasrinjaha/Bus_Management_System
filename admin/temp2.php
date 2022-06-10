<table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Bus Id</th>
                            <th>Bus Name</th>
                            <th>Bus Number</th>
                            <th>Type</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Total Seat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //include 'inlude/navbar.php';
                            include '../include/connection.php';
                            $query = "select * from bus where model LIKE '%$var%' OR type LIKE '$var' OR b_name LIKE '%$var%' ";
                            $table = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($table)){                   
                        ?>
                        <tr>
                        <td></td>
                                <td><?php echo $row['b_id']; ?></td>
                                <td><?php echo $row['b_name'];?></td>
                                <td><?php echo $row['b_number'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $row['make'];?></td>
                                <td><?php echo $row['model'];?></td>
                                <td><?php echo $row['seat'];?></td>
                        </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                       