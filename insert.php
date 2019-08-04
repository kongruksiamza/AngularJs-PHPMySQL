<?php
$con=mysqli_connect("localhost","root","","dbstudent");
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0){
    $fname=mysqli_real_escape_string($con,$data->fName);
    $lname=mysqli_real_escape_string($con,$data->lName);
    $btn_name=$data->btnName;
    $id=$data->id;
    if($btn_name=="Insert"){
      $query="insert into tbuser(fname,lname) values('$fname','$lname')";
      if(mysqli_query($con,$query)){
        echo "Data Inserted";
      }else{
        echo "Eror";
      }
    }
    if($btn_name=="Update"){
        $id=$data->id;
        $query="update tbuser set fname='$fname',lname='$lname' where id = $id";
        echo $query;
        if(mysqli_query($con,$query)){
          echo "Data Update";
        }else{
          echo "Eror";
        }
    }


}
?>
