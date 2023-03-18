<?php
header("content-type:applicatin/json");
$data=json_decode(file_get_contents("php://input"),true);

$name=$data['name'];
$city=$data['city'];
$age=$data['age'];

include("./db.php");

$sql = "INSERT INTO `data`(`name`, `city`, `age`) VALUES ({$name},{$city},{$age})";
$query=mysqli_query($con,$sql);
if($query){
    echo "success";
}else{
    echo "error";
}