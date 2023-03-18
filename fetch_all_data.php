<?php
header("content-type:applicatin/json");
include("./db.php");
$sql = "SELECT * FROM `data`";
$query=mysqli_query($con,$sql);
if(mysqli_num_rows($query)> 0){
   while($data=mysqli_fetch_assoc($query)){
       $output[]=$data;
    }
    echo json_encode($output);
}