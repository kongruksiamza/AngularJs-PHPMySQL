<?php
$con=mysqli_connect("localhost","root","","dbstudent");
$outp = "";
$query="select * from tbuser";
$result=mysqli_query($con,$query);
 if(mysqli_num_rows($result) > 0)
 {
      while($rs = $result->fetch_array(MYSQLI_ASSOC)){
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"fname":"'  . $rs["fname"] . '",';
        $outp.='"id":"'   . $rs["id"] . '",';
        $outp .= '"lname":"'   . $rs["lname"] . '"}';
      }
      $outp ='{"records":['.$outp.']}';
      echo($outp);
 }
?>
