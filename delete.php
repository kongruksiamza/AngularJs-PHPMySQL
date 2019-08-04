<?php
$con=mysqli_connect("localhost","root","","dbstudent");
$data=json_decode(file_get_contents("php://input"));
$id=$data->id;
$query="delete from tbuser where id=$id";
$result=mysqli_query($con,$query);
 if(mysqli_num_rows($result) > 0)
 {
   if(mysqli_query($con,$query)){
     echo "Delete";
   }else{
     echo "Eror";
   }
 }
?>
