<?php
header("content-type:applicatin/json");
$data=json_decode(file_get_contents("php://input"),true);
$id=$data['eid'];
$name=$data['name'];
$city=$data['city'];
$age=$data['age'];

include("./db.php");

$sql = "UPDATE `data` SET `name`={$name},`city`={$city},`age`={$age} WHERE id={$id}";
$query=mysqli_query($con,$sql);
if($query){
    echo "success";
}else{
    echo "error";
}