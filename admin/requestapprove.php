<?php 
include 'adminauth.php';
include '../include/connection.php';
$id = $_REQUEST['id'];
$query1 = "select * from request where req_id = '$id' ";
$table1 = mysqli_query($con,$query1);
$row1 = mysqli_fetch_array($table1);
$name =   $row1['name'];
 $mail = $row1['email'];
 $address = $row1['address'];
 $contact = $row1['mobile'];
 $pass1 = $row1['pass'];
 $dob = $row1['dob'];
 $gender = $row1['gender'];
 $img = $row1['img'];
 $licence = $row1['Driving_Licence'];
 $experience = $row1['working_experience'];
 echo $experience;
 $query2 = "INSERT INTO drivers(name,email,address,dob,gender, mobile,pass,Driving_Licence,working_experience,img)
    VALUES('$name','$mail','$address','$dob','$gender','$contact','$pass1','$licence','$experience','$img')";
    if(mysqli_query($con,$query2)){
            echo '<span style= "color:green;">Successfully inserted';
            if($image!=NULL){
                move_uploaded_file($_FILES['image']['tmp_name'],"../images/$img");
            }
    }
    else{
        echo '<span style= "color:red;">insertion failed';
    }
$query = "delete from request where req_id = $id ";
mysqli_query($con,$query);
header('Location: request.php');
?>